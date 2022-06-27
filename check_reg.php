<?php

include "connection.php";

session_start();
$_SESSION['status'] = 3;

function generate_salt()
{
    $salt = "";
    $length = 8;
    for ($i = 0; $i < $length; $i++) {
        $salt .= chr(mt_rand(33, 126));
    }
    return $salt;
}


if (($_POST['login'] != '') && ($_POST['pass'] != '')) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE `login` = ?");
    $stmt->bind_param("s", $_POST['login']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 0) {
        $salt = generate_salt();
        $password = md5($salt . $_POST['pass']);
        $user = $_POST['login'];
        $query_insert = $conn->prepare("INSERT INTO user SET `login` = ?, `password` = ?, salt = ?");
        $query_insert->bind_param("sss", $user, $password, $salt);
        $query_insert->execute();
        $query_insert->close();

        echo "Регистрация прошла успешно.<br>";

        $query_check_status = $conn->prepare(
            "SELECT `user_status`.`status` 
                        FROM `user`, `user_status`
                        WHERE `user`.`login` = ?
                        AND `user`.`status_id` = `user_status`.`status_id`");
        $query_check_status->bind_param("s", $user);
        $query_check_status->execute();
        $result_status = $query_check_status->get_result();
        $row = $result_status->fetch_assoc();
        $status = $row['status'];
        $query_check_status->close();

        echo "Ваш статус - '{$status}'<br>";
        echo "<a href='cabinet.php'>Перейти в кабинет</a><br>";
        echo "<a href='index.php'>Выйти</a>";

    } else {
        echo "<script type='text/javascript'>
                    window.alert('Пользователь с таким логином уже существует')
                  </script>";
        header("refresh: 0; url=index.php");
    }
} else {
    header('Location: index.php');
}

?>