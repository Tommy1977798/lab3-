<?php
$data = json_decode(file_get_contents("data.json"), true);
$total_sales = array_sum(array_column($data["sales"], "total_price"));
?>
<!DOCTYPE html>
<html>
<head><title>Sales Report</title>
       <link rel="stylesheet" href="lab3.css">
</head>
<body>
    <h2>📊 Total Sales: $<?= number_format($total_sales, 2) ?></h2>
</body>
</html>
