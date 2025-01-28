<?php
function load_data() {
    return json_decode(file_get_contents("data.json"), true);
}

function save_data($data) {
    file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));
}

// 处理订单
function place_order($product_id, $quantity) {
    $data = load_data();
    foreach ($data["inventory"] as &$item) {
        if ($item["id"] === $product_id && $item["quantity"] >= $quantity) {
            $item["quantity"] -= $quantity;
            $order = [
                "product" => $item["name"],
                "quantity" => $quantity,
                "total_price" => $quantity * $item["price"]
            ];
            $data["sales"][] = $order;
            save_data($data);
            return "Order placed successfully!";
        }
    }
    return "Not enough stock!";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $message = place_order($_POST["product_id"], $_POST["quantity"]);
    echo "<script>alert('$message'); window.location.href='index.php';</script>";
}
?>
