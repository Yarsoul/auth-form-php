<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <form action="check_auth.php" method="POST">
        <p>Авторизация</p>
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="pass" placeholder="Пароль">
        <input type="submit" name="" value="Авторизоваться">
    </form>
    <form action="check_reg.php" method="POST">
        <p>Регистрация</p>
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="pass" placeholder="Пароль">
        <input type="submit" name="" value="Зарегистрироваться">
    </form>

    <?php
    if (isset($_SESSION['auth'])) session_destroy();
    ?>
</body>
</html>
