<?php 
	$host = "127.0.0.1";
	$data_base = "my_data_form";
	$user = "root";
	$pass = "12345678";

	$link = mysqli_connect($host, $user, $pass, $data_base) or die("Error_link".mysqli_error($link));
?>