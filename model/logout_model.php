<?php 
	if (@$_POST['logout'] == 'Log Out From Web Master Zone') {
		$_SESSION['admin_auth'] = "off";
		header("Location:http://localhost/orthodox-icons-shop/");
		exit;
	}
	$_SESSION['auth'] = "off";
	header("Location:http://localhost/orthodox-icons-shop/");
	exit;
?>