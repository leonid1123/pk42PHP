<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'test');
define('DB_PASSWORD', 'test');
define('DB_NAME', 'test');

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
$connState = "";
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
    $connState = "все плохо";
} else {
    $connState = "всё хорошо";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h3>Статус подключения:<?php echo $connState ?></h3>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Логин</label>
        <input name="loginInput" type="text">
        <label>Пароль</label>
        <input name="passInput" type="text">
        <input name="go" type="submit" value="Войти">
    </form>
    <p>
        <?php
        if (isset($_POST["go"])) {           
            echo $_POST["loginInput"] . " " . $_POST["passInput"];
            $sqlReq = "SELECT * FROM users WHERE login='" . $_POST["loginInput"] . "'";
            $result = $mysqli->query($sqlReq);
            echo " " . $result->num_rows;
        }
        ?>
    </p>
</body>

</html>