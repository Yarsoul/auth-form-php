<?php

include "connection.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['auth'] && ($_SESSION['status'] == 1)) {
    if (isset($_GET['delete'])) {
        $query_delete = $conn->prepare("DELETE FROM `user` WHERE `user_id` = ?");
        $query_delete->bind_param("s", $_GET['delete']);
        $query_delete->execute();
        $query_delete->close();
    }
}

if ($_SESSION['auth'] && (($_SESSION['status'] == 1) || ($_SESSION['status'] == 2))) {
    if (isset($_GET['update'])) {
        $data_update = explode(',', $_GET['update']);
        $update_status = $data_update[0];
        if (($_SESSION['status'] == 2) && ($update_status == 1)) {
            $update_status = 2;
            echo "<script>
                    window.alert('У Вас недостаточно прав');
                  </script>";
        }
        $update_user = $data_update[1];
        $query_delete = $conn->prepare("UPDATE user SET status_id = ? WHERE user_id = ?");
        $query_delete->bind_param("ii", $update_status, $update_user);
        $query_delete->execute();
        $query_delete->close();
    }
}

$query = "SELECT `user`.`login`, `user_status`.`status`, `user`.`user_id` 
				FROM `user`, `user_status` 
				WHERE `user`.`status_id` = `user_status`.`status_id`";
$result = mysqli_query($conn, $query) or die('Error_result');

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row) ;


if ($_SESSION['auth'] && ($_SESSION['status'] == 1)) {
    include "table_users_for_admin.php";
} elseif ($_SESSION['auth'] && ($_SESSION['status'] == 2)) {
    include "table_users_for_moderator.php";
} elseif ($_SESSION['auth'] && ($_SESSION['status'] == 3)) {
    include "table_users_for_user.php";
} else {
    echo "Как Вы сюда попали?";
}

echo "<br><button onclick='exit()'>Выйти</button>";

echo "<script src='scripts/tableCssRedaction.js'></script>";
echo "<script src='scripts/updateStatus.js'></script>";
echo "<script src='scripts/exit.js'></script>";

?>
