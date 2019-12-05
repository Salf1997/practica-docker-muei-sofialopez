<?php 
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS pdocker";
if ($conn->query($sql) === FALSE) {
    echo "<br>Error creating database: " . $conn->error;
}

// Create TABLE
$sql = "CREATE TABLE IF NOT EXISTS pdocker.usuario (idUsuario VARCHAR(255), password VARCHAR(255))";
if ($conn->query($sql) === FALSE) {
    echo "<br>Error creating table: " . $conn->error;
}

$conn->close();
?>
