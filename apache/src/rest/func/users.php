<?php

class User {

    public $name;
    public $surname;

    function __construct($name, $surname) {
        $this->name = $name;
        $this->surname = $surname;
    }

}

function add($name, $surname, $password) {
    $mysqli = new mysqli("db", "root", "password", "appDB");
    $encodedPassword = base64_encode(sha1($password, TRUE));
    return $mysqli->query("INSERT INTO users (name, surname, password) VALUES ('$name', '$surname', '$encodedPassword')");
}

function getAll() {
    $response = [];
    $mysqli = new mysqli("db", "root", "password", "appDB");
    $result = $mysqli->query("SELECT * FROM users ORDER BY name");
    foreach ($result as $row){
        $response[count($response)] = new User(mb_convert_encoding($row['name'], 'UTF-8'), mb_convert_encoding($row['surname'], 'UTF-8'));
    }
    return $response;
}

function update($name, $surname, $password) {
    $mysqli = new mysqli("db", "root", "password", "appDB");
    $encodedPassword = base64_encode(sha1($password, TRUE));
    return $mysqli->query("UPDATE users SET surname = '$surname', password = '$encodedPassword' WHERE name = '$name'");
}

function delete($name) {
    $mysqli = new mysqli("db", "root", "password", "appDB");
    return $mysqli->query("DELETE FROM users where name = '$name'");
}

?>