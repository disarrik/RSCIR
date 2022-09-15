<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort</title>
</head>
<body>
    <?php
        include "sort_helper.php";
        $array = explode(',', $_GET['array']);
        echo json_encode(recursive($array));
    ?>
</body>
</html>