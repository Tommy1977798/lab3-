<?php
// 读取 JSON 数据
$data = json_decode(file_get_contents("data.json"), true);
$search_query = strtolower(trim($_GET["query"] ?? "")); // 获取用户输入并转小写
$results = [];

// 搜索匹配的商品
if ($search_query !== "") {
    foreach ($data["inventory"] as $item) {
        if (strpos(strtolower($item["name"]), $search_query) !== false) {
            $results[] = $item;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="lab3.css">
</head>
<body>
    <h2>🔎 Search Results</h2>

    <?php if (empty($results)): ?>
        <p>No products found for "<strong><?= htmlspecialchars($_GET["query"] ?? "") ?></strong>"</p>
    <?php else: ?>
        <table border="1">
            <tr><th>Name</th><th>Type</th><th>Price</th><th>Quantity</th></tr>
            <?php foreach ($results as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item["name"]) ?></td>
                <td><?= htmlspecialchars($item["type"]) ?></td>
                <td>$<?= number_format($item["price"], 2) ?></td>
                <td><?= $item["quantity"] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br>
    <a href="index.php">⬅ Back to Inventory</a>
</body>
</html>
