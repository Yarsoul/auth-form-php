<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

echo "<table id='table'>";
echo "<tr id='title'><td>&emsp;Логин&emsp;</td><td>&emsp;Статус&emsp;</td><td>&emsp;Изменить статус&emsp;</td><td>&emsp;Удалить пользователя&emsp;</td></tr>";
foreach ($data as $item) {
    echo "<tr>";
    echo "<td>&nbsp;" . $item['login'] . "&nbsp;</td>";
    echo "<td>&nbsp;" . $item['status'] . "&nbsp;</td>";
    if ($item['status'] == 'admin') {
        echo "<td class='column'>&nbsp;
                    <select id='select_status_" . $item['user_id'] . "' onchange='myFunc(this.value, " . $item['user_id'] . ");'>
                        <option value=1>admin</option>
                        <option value=2>moderator</option>
                        <option value=3>user</option>
                        </select>
					<a id='my_link_" . $item['user_id'] . "' href='#'>Изменить</a>
              &nbsp;</td>";
    } elseif ($item['status'] == 'moderator') {
        echo "<td class='column'>&nbsp;
                    <select id='select_status_" . $item['user_id'] . "' onchange='myFunc(this.value, " . $item['user_id'] . ");'>
                        <option disabled selected>moderator</option>
                        <option value=1>admin</option>
                        <option value=2>moderator</option>
                        <option value=3>user</option>
                    </select>
                    <a id='my_link_" . $item['user_id'] . "' href='#'>Изменить</a>
              &nbsp;</td>";
    } elseif ($item['status'] == 'user') {
        echo "<td class='column'>&nbsp;
                    <select id='select_status_" . $item['user_id'] . "' onchange='myFunc(this.value, " . $item['user_id'] . ");'>
                        <option disabled selected>user</option>
                        <option value=1>admin</option>
                        <option value=2>moderator</option>
                        <option value=3>user</option>
                    </select>
                    <a id='my_link_" . $item['user_id'] . "' href='#'>Изменить</a>
              &nbsp;</td>";
    }

    if ($item['status'] == 'admin') {
        echo "<td></td>";
    } else {
        echo "<td class='column'>&nbsp;<a href='?delete=" . $item['user_id'] . "'>Удалить</a>&nbsp;</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
