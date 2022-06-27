<?php

echo "<table id='table'>";
echo "<tr id='title'>
        <td>&emsp;Логин&emsp;</td>
        <td>&emsp;Статус&emsp;</td>
      </tr>";
foreach ($data as $item) {
    echo "<tr>";
        echo "<td>&nbsp;" . $item['login'] . "&nbsp;</td>";
        echo "<td>&nbsp;" . $item['status'] . "&nbsp;</td>";
    echo "</tr>";
}
echo "</table>";

?>
