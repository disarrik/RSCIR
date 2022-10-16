<?php

    header('Content-Type: application/json; charset=utf-8');
    include_once('func/days.php');

    $method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            echo json_encode(getAll());
            break;
        case 'POST':
            $newDay = json_decode(file_get_contents('php://input'));
            add($newDay->day, $newDay->temperature);
            break;
        case 'PATCH':
            $newDay = json_decode(file_get_contents('php://input'));
            echo update($newDay->day, $newDay->temperature);
            break;
        case 'DELETE':
            $oldDay = json_decode(file_get_contents('php://input'));
            echo delete($oldDay->day);
            break;
    }
?>