<?php
$id = $_GET['id'];
$address = $_GET['address'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$sql = "UPDATE login_academician SET address='$address' WHERE id=$id";
$result = $conn->query($sql);


$conn->close();
?>
