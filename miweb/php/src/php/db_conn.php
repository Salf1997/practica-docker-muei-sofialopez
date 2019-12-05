<?php 
require('db_create.php');
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$db = 'pdocker';
$conn = new mysqli($host, $user, $pass,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
