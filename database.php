<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "appwebfinaldb";
$user_id_admin = "397810";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$database;", $username, $password);
    //if ($conexion){
    //    echo "siiiiiiiuuuuuuuuu";
    //}
 } 
 catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}
?>