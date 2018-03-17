<?php
require('model.php');
if (@$_GET['id']) {
    $id = @$_GET['id'];
    $price_id = @$_GET['price_id'];

    $sql = "SELECT * FROM `icons` WHERE id = $id";
    $result = $conn->query($sql);
    $seo_icon = mysqli_fetch_assoc($result);

    if ($price_id) {
        $sql_prices = "SELECT * FROM `prices` WHERE id = $price_id";
        $result_prices = $conn->query($sql_prices);
        $prices = mysqli_fetch_assoc($result_prices);
    }
}

$conn->close();
?> 