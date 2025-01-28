<?php
// 读取 JSON 文件
function load_data() {
    return json_decode(file_get_contents("data.json"), true);
}

// 保存数据到 JSON 文件
function save_data($data) {
    file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));
}

// 添加新商品
function add_product($name, $type, $price, $quantity) {
    $data = load_data();
    $new_product = [
        "id" => uniqid(),
        "name" => $name,
        "type" => $type,
        "price" => (float)$price,
        "quantity" => (int)$quantity
    ];
    $data["inventory"][] = $new_product;
    save_data($data);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    add_product($_POST["name"], $_POST["type"], $_POST["price"], $_POST["quantity"]);
    header("Location: index.php");
    exit;
}
?>
