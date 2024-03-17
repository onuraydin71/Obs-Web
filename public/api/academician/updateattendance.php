<?php
$student_id = $_GET['student_id'];
$lesson_id = $_GET['lesson_id'];
$academician_id = $_GET['academician_id'];
$week = $_GET['week'];
$check = $_GET['check'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);



$sql = "UPDATE lesson_registration SET attendance_$week=$check WHERE student_id=$student_id AND lesson_id=$lesson_id AND academician_name=$academician_id";
$result = $conn->query($sql);
    


$conn->close();
?>
