<?php
    session_start();
	if(isset($_GET['price'])){
		$temp_item_array = array('id' => $_GET['icon_id'], 'name' => $_GET['icon_name'],'img' => $_GET['icon_img'],'price' => $_GET['price'], 'price_id' => $_GET['price_id']);
		if(@$_SESSION['shopping_list']){
			array_push($_SESSION['shopping_list'], $temp_item_array);
		}else{
			$_SESSION['shopping_list'] = array();
			array_push($_SESSION['shopping_list'], $temp_item_array);
		}

		if (count($_SESSION["shopping_list"]) >= 1){
			header('Location:http://localhost/orthodox-icons-shop/index.php?shop=online-orthodox-store&add=success');
			exit();
		}
		else{
			unset($_SESSION["shopping_list"]);
			header('http://localhost/orthodox-icons-shop/index.php?id='.$_GET['icon_id'].'&price_id='.$_GET['price_id'].'&open=Show+Icon&add=fail');
			exit();
		}

	}else{
		unset($_SESSION["shopping_list"]);
		header('http://localhost/orthodox-icons-shop/index.php?id='.$_GET['icon_id'].'&price_id='.$_GET['price_id'].'&open=Show+Icon&add=fieldfail');
		exit();
	}
?>