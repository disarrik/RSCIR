<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This week</title>
</head>
<body>
<ol>
<?php
$mysqli = new mysqli("db", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM weather  WHERE  WEEK(day) = WEEK(CURDATE()) ORDER BY day;");
foreach ($result as $row){
    echo "<li>" . $row['day'] . ":" . $row['temperature'] . "</li>";
}
?>
</ol>
</body>
</html>