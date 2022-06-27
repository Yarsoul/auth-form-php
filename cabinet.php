<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (($_SESSION['auth'] == TRUE) && ($_SESSION['status'] == 1)) {
    echo "Вы - админ.<br>";
    echo "Вы можете:";
    echo "<ul style='list-style-type: disc; margin: auto'>
                <li>видеть всех пользователей</li>
                <li>изменять права всех пользователей</li>
                <li>удалять пользователей (кроме админов)</li>
              </ul><br>";
    echo "Список пользователей:";
    include "users.php";

} elseif (($_SESSION['auth'] == TRUE) && ($_SESSION['status'] == 2)) {
    echo "Вы - модератор.<br>";
    echo "Вы можете:";
    echo "<ul style='list-style-type: disc; margin: auto'>
                <li>видеть всех пользователей</li>
                <li>изменять права пользователей, кроме админов</li>
              </ul><br>";
    echo "Список пользователей:";
    include "users.php";
} elseif (($_SESSION['auth'] == TRUE) && ($_SESSION['status'] == 3)) {
    echo "Вы - пользователь.<br>";
    echo "Вы можете:";
    echo "<ul style='list-style-type: disc; margin: auto'>
                <li>видеть всех пользователей</li>
              </ul><br>";
    echo "Список пользователей:";
    include "users.php";
} else {
    header('Location: 403.php');
}

?>