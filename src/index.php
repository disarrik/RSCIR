<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function forbidden() {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
}

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    forbidden();
} else {
    $mysqli = new mysqli("db", "user", "password", "appDB");
    $password = $mysqli->query("SELECT password FROM users");
    if ($password == $_SERVER['PHP_AUTH_USER']) {
        echo "18 градусов";
    }
    else {
        forbidden();
    }
}
?>
</body>
</html>