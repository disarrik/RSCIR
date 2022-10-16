<?php

    header('Content-Type: application/json; charset=utf-8');
    include_once('func/users.php');

    $method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            echo json_encode(getAll());
            break;
        case 'POST':
            $newUser = json_decode(file_get_contents('php://input'));
            add($newUser->name, $newUser->surname, $newUser->password);
            break;
        case 'PATCH':
            $newUser = json_decode(file_get_contents('php://input'));
            echo update($newUser->name, $newUser->surname, $newUser->password);
            break;
        case 'DELETE':
            $oldUser = json_decode(file_get_contents('php://input'));
            echo delete($oldUser->name);
            break;
    }
?>