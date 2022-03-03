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
		$query_salt = "SELECT * FROM users WHERE login = '$user'";
		$result_salt = mysqli_query($link, $query_salt) or die('Error_result_salt');
		$user_data = mysqli_fetch_assoc($result_salt);
		$user_salt_true = $user_data['salt'];
		$user_password_true = $user_data['password'];

		if (!empty($user_data)) { 			
			$password_input = md5($user_salt_true.$_POST['pass']);
			if ($password_input == $user_password_true) {
				$_SESSION['auth'] = TRUE;
				$_SESSION['id'] = $user_data['id'];
				$_SESSION['status'] = $user_data['user_status'];
				header('Location: content.php');
			} else {
				echo "Пароль не верный";
				header("refresh: 1; url=index.php");
			}		
		}
	} else {
		header('Location: index.php');
	}
?>