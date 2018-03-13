 <?php    
    require('model.php'); 

    $id = @$_GET['id'];
    $price_id = @$_GET['price_id'];

    $sql = "SELECT * FROM `icons` WHERE id = $id";

    $sql_prices = "SELECT * FROM `prices` WHERE id = $price_id";

    $sql_large = "SELECT 'large_img' FROM `icons` WHERE id = $id";
    
    $result = $conn->query($sql);

    $result_prices = $conn->query($sql_prices);

    $result_large = $conn->query($sql_large);

    $open_icon = mysqli_fetch_assoc($result);

    $see_large = mysqli_fetch_assoc($result_large);

    $conn->close();
?> 