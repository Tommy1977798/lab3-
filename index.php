<?php
$data = json_decode(file_get_contents("data.json"), true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grocery Store</title>
    <link rel="stylesheet" href="lab3.css">
</head>
<body>
    <h2>🛒 Inventory</h2>

    <!-- 🔎 搜索表单 -->
    <form action="search.php" method="get">
        <input type="text" name="query" placeholder="Enter product name..." required>
        <button type="submit">Search</button>
    </form>

    <table border="1">
        <tr><th>Name</th><th>Type</th><th>Price</th><th>Quantity</th></tr>
        <?php foreach ($data["inventory"] as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item["name"]) ?></td>
            <td><?= htmlspecialchars($item["type"]) ?></td>
            <td>$<?= number_format($item["price"], 2) ?></td>
            <td><?= $item["quantity"] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>➕ Add Product</h2>
    <form action="inventory.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="type" placeholder="Type" required>
        <input type="number" name="price" placeholder="Price" step="0.01" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <button type="submit">Add</button>
    </form>

    <h2>🛍 Place Order</h2>
    <form action="order.php" method="post">
        <select name="product_id">
            <?php foreach ($data["inventory"] as $item): ?>
                <option value="<?= $item["id"] ?>"><?= htmlspecialchars($item["name"]) ?> - $<?= number_format($item["price"], 2) ?> (<?= $item["quantity"] ?> left)</option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <button type="submit">Order</button>
    </form>

    <h2>📊 View Sales</h2>
    <a href="sales.php">View Sales Report</a>
</body>
</html>
