<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
		$_SESSION['auth'] = 'off';
	} 
	function render($template, $data = array())
	{	
		$path = $_SERVER['DOCUMENT_ROOT']."/orthodox-icons-shop/html/".$template.".php";
		if (file_exists($path)){
			extract($data);
			require($path);
		}
	}

	$index = ($_SERVER["PHP_SELF"]);

	function destroy($var){
		unset($var);
	}
	function go_home(){
		header("Location:http//localhost/orthodox-icons-shop/");
	}


?>