<?php
    require('model.php'); 
    if (@$_GET['shop'] == "Proceed to Shop" || @$_GET['shop'] == "Go to Shop"){
        
        if (@$_GET['order_by']=='name') {
        	$sql = "SELECT * FROM icons ORDER BY name";
        }
        elseif (@$_GET['order_by']=='name_desc') {
        	$sql = "SELECT * FROM icons ORDER BY name DESC";
        }
        elseif (@$_GET['order_by']=='id') {
        	$sql = "SELECT * FROM icons ORDER BY id";
        }
        elseif (@$_GET['order_by']=='id_desc') {
        	$sql = "SELECT * FROM icons ORDER BY id DESC";
        }
        else
        {
        	$sql = "SELECT * FROM `icons` WHERE 1";
    	}
        $result = $conn->query($sql);
    }
    else{
         header("Location:http://localhost/orthodox-icons-shop/index.php?shop=Proceed+to+Shop");
    }



    $conn->close();
?> 