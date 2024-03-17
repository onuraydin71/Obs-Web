<?php
$student_id = $_GET['student_id'];
$day = $_GET['day'];
$month = $_GET['month'];
$year = $_GET['year'];
$note = $_GET['note'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$sql = "INSERT INTO reminder (student_id,day,month,year,note) VALUES ('$student_id', '$day', '$month', '$year', '$note')";
$result = $conn->query($sql);

$conn->close();
?>
