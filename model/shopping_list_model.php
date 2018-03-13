<?php 
    if (isset($_GET['remove']) && isset($_GET['remove_id'])){
        session_start();
        unset($_SESSION['shopping_list'][$_GET['remove_id']]);
        header("Location:http://localhost/orthodox-icons-shop/index.php?shopping_list=Shopping+List");
        exit();
    }
    if (isset($_GET['clear'])) {
        session_start();
        unset($_SESSION['shopping_list']);
        header("Location:http://localhost/orthodox-icons-shop/index.php?shopping_list=Shopping+List");
        exit();
    }
?>
