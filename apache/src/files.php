<?php
    session_start();
    $theme = null;
    $name = null; 
    $lang = null;
    if (array_key_exists('theme', $_GET)) {
        $_SESSION['theme'] = $_GET['theme'];
    }
    if (array_key_exists('theme', $_SESSION)) {
        $theme = $_SESSION['theme'];
    }
    if (array_key_exists('name', $_GET)) {
        $_SESSION['name'] = $_GET['name'];
        $name = $_SESSION['name'];
    }
    if (array_key_exists('name', $_SESSION)) {
        $name = $_SESSION['name'];
    }
    if (array_key_exists('lang', $_GET)) {
        $_SESSION['lang'] = $_GET['lang'];
        $lang = $_SESSION['lang'];
    }
    if (array_key_exists('lang', $_SESSION)) {
        $lang = $_SESSION['lang'];
    }
    if ($theme == null){
        $theme = 'white';
    }
    if ($name == null) {
        $name = 'nobody';
    } 
    if ($lang == null) {
        $lang = "ru";
    }
    $phrases = [
        'ru' => [
            0 => 'Привет, ' . $name,
            1 => 'Насройки',
            2 => 'Файлы'
        ],
        'en' => [
            0 => 'Hi, ' . $name,
            1 => 'Settings',
            2 => 'Files'
        ]
    ];
?>

<!DOCTYPE html>
<html lang="$lang">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        switch($theme) {
            case "white":
                echo "<link rel=\"stylesheet\" href=\"style-white.css\">";
                break;
            case "black":
                echo "<link rel=\"stylesheet\" href=\"style-black.css\">";
                break;
        }
    ?>
    <link rel="stylesheet" href="mystyle.css">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $phrases[$lang][0] ?></h1>

    <h2><?php echo $phrases[$lang][1] ?></h2>
    <form method='GET' action='/files.php'>
        <select name='theme'>
            <option value='white'>White</option>
            <option value='black'>Black</option>
        </select>
        <select name='lang'>
            <option value='ru'>Русский</option>
            <option value='en'>English</option>
        </select>
        <input type='text' name='name'/>
        <input type='submit'/>
    </form>

    <h2><?php echo $phrases[$lang][2] ?></h2>

    <form method='POST' action='/files.php' enctype="multipart/form-data">
        <input type='file' name='file' id='file'>
        <input type='submit'>
    </form>

    <?php
    $storagePath = "/upload";
    if (array_key_exists('file', $_FILES)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $storagePath . "/" . $_FILES['file']['name']);
    }
    $files = scandir($storagePath);
    foreach($files as $file) {
        echo "<a href=\"download.php?file=" . $file . "\">" . $file . "</a>";
        echo "<br>";
    }
    ?>

</body>
</html>