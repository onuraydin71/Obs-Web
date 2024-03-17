<?php
$id = $_GET['id'];
$passw = $_GET['password'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$pass = password_hash($passw, PASSWORD_DEFAULT);
$sql = "UPDATE login_academician SET password='$pass' WHERE id='$id'";
$result = $conn->query($sql);


$conn->close();
?>
