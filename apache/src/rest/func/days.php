<?php

class Day {

    public $day;
    public $temperature;

    function __construct($passedDay, $passedTemperature) {
        $this->day = $passedDay;
        $this->temperature = $passedTemperature;
    }

}

function add($day, $weather) {
    $mysqli = new mysqli("db", "root", "password", "appDB");
    return $mysqli->query("INSERT INTO weather (day, temperature) VALUES ('$day', '$weather')");
}

function getAll() {
    $response = [];
    $mysqli = new mysqli("db", "root", "password", "appDB");
    $result = $mysqli->query("SELECT * FROM weather ORDER BY day");
    foreach ($result as $row){
        $response[count($response)] = new Day(mb_convert_encoding($row['day'], 'UTF-8'), mb_convert_encoding($row['temperature'], 'UTF-8'));
    }
    return $response;
}

function update($day, $weather) {
    $mysqli = new mysqli("db", "root", "password", "appDB");
    return $mysqli->query("UPDATE weather SET temperature = '$weather' WHERE day = '$day'");
}

function delete($day) {
    $mysqli = new mysqli("db", "root", "password", "appDB");
    return $mysqli->query("DELETE FROM weather where day = '$day'");
}

?>