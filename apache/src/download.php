<?php
    $storagePath = "/upload";
    header('Content-type: application/pdf');
    ob_clean();
    flush();
    readfile($storagePath . "/" . $_GET['file']);
?>