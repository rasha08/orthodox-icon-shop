 <?php    
    require('model.php');  

	if (isset($_GET['q'])) {
		$query = mysqli_real_escape_string($conn,$_GET["q"]);
        $sql_search = "SELECT * FROM `icons` WHERE `name` LIKE '%$query%' OR `description` LIKE '%$query%'";
        $result = $conn->query($sql_search);

    }
    else{
         header("Location:http://localhost/orthodox-icons-shop/index.php?shop=Proceed+to+Shop");
    }
?>