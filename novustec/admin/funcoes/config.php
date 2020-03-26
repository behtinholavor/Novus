<?php

$servername = "localhost";
$username = "root";
$password = "1q2w3e4r5t";
$dbname = "novustec";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->set_charset("latin1");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}  

?>
