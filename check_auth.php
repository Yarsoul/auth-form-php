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
        $query_salt = $conn->prepare("SELECT * FROM user WHERE login = ?");
        $query_salt->bind_param("s", $_POST['login']);
        $query_salt->execute();
        $data = $query_salt->get_result();
        $user_data = $data->fetch_assoc();
        $user_salt_true = $user_data['salt'];
        $user_password_true = $user_data['password'];
        $query_salt->close();

		if (!empty($user_data)) { 			
			$password_input = md5($user_salt_true.$_POST['pass']);
			if ($password_input == $user_password_true) {
				$_SESSION['auth'] = TRUE;
				$_SESSION['id'] = $user_data['user_id'];
				$_SESSION['status'] = $user_data['status_id'];
				header('Location: cabinet.php');
			} else {
                echo "<script type='text/javascript'>
                    window.alert('Логин или пароль не верный')
                  </script>";
                header("refresh: 0; url=index.php");
			}		
		}
	} else {
		header('Location: index.php');
	}
?>