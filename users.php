<?php 
	include "connection.php";
	session_start();

	if (($_SESSION['auth'] == TRUE) && ($_SESSION['status'] == 1)) {
		if (isset($_GET['delete'])) {
			$del = $_GET['delete'];
			$query_delete = "DELETE FROM `users` WHERE `id` = $del";
			mysqli_query($link, $query_delete);
		}
	}


	$query = "SELECT `users`.`login`, `users_status`.`status`, `users`.`id` 
				FROM `users`, `users_status` 
				WHERE `users`.`user_status` = `users_status`.`id_status`";
	$result = mysqli_query($link, $query) or die('Error_result');

	for ($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);

	echo "<table>";
	echo "<tr><td>Логин</td><td>&emsp;Статус</td><td>&emsp;Действие</td></tr>";
	if (($_SESSION['auth'] == TRUE) && ($_SESSION['status'] == 1)) {
		foreach ($data as $item) {
			echo "<tr>";
			echo 	"<td>".$item['login']."</td>
					<td>&emsp;".$item['status']."</td>";
			echo 	"<td>&emsp;<a href='?delete=".$item['id']."'>Удалить</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		foreach ($data as $item) {
			echo "<tr>";
			echo 	"<td>".$item['login']."</td>
					<td>&emsp;".$item['status']."</td>";
			echo 	"<td>&emsp;Недоступно</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>