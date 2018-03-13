<?php 
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "orthodox-icons-shop";

    @($conn = new mysqli($servername, $username, $password, $dbname));

    if ($conn->connect_error) {
        die('<h4 class="text-center alert alert-danger">Something has gone wrong with database conection! Please come back in couple of minutes.</h4>');
    } 
?>