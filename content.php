<?php 
	session_start();

	if (($_SESSION['auth'] == TRUE) && ($_SESSION['status'] == 1)) {
		echo "Вы админ<br>";
		echo "<a href='users.php'>Показать пользователей</a>";
	} elseif (($_SESSION['auth'] == TRUE) && ($_SESSION['status'] == 2)) {
		echo "Вы помощник<br>";
		echo "<a href='users.php'>Показать пользователей</a>";
	} elseif ($_SESSION['auth'] == TRUE) {
		echo "Вы пользователь";
	} else {
		header('Location: 403.php');
	}
?>