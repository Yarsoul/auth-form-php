<?php
	$host = "127.0.0.1";
	$data_base = "my_php_service";
	$user = "root";
	$pass = "1234";

	$conn = mysqli_connect($host, $user, $pass, $data_base); //or die("Error_link".mysqli_error($link));
?>