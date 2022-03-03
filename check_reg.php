<?php 	
	include "connection.php";

	session_start();

	function generate_salt()
	{
		$salt = "";
		$length = 8;
		for ($i=0; $i < $length; $i++) { 
			$salt .= chr(mt_rand(33,126));
		}
		return $salt;
	}


	if (($_POST['login'] != '') && ($_POST['pass'] != '')) {
		$user = $_POST['login'];
		$query = "SELECT * FROM users WHERE `login` = '$user'";
		$result = mysqli_query($link, $query) or die('Error_result');
		$test = mysqli_fetch_assoc($result);

		if (empty($test)) {
			$salt_gen = generate_salt();
			$salt = $salt_gen;
			$password = md5($salt.$_POST['pass']);
			$user = $_POST['login'];
			$query_insert = "INSERT INTO users SET `login` = '$user', `password` = '$password', salt = '$salt'";
			$result_insert = mysqli_query($link, $query_insert) or die('Error_result_insert');
			echo "Регистрация прошла успешно<br>";
			echo "Ваш статус - ";
			$query_check_status = "SELECT `users_status`.`status` 
					FROM `users`, `users_status`
					WHERE `users`.`login` = '$user'
					AND `users`.`user_status` = `users_status`.`id_status`";
			$result_status = mysqli_query($link, $query_check_status) or die('Error_result_status');
			$text = mysqli_fetch_array($result_status);
			echo $text[0];
		} else {
			echo "Такой логин уже есть";
			header("refresh: 1; url=index.php");
		}
	} else {
		header('Location: index.php');
	}
?>