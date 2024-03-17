<?php
$student_id = $_GET['student_id'];
$lesson_id = $_GET['lesson_id'];
$week = $_GET['week'];

$type = $_GET['type'];
$name = $_GET['data'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);


if($type == "attendance")
{
    $sql = "UPDATE $name SET attendance_$week='1' WHERE student_id=$student_id AND lesson_id=$lesson_id";
    $result = $conn->query($sql);
}
    


$conn->close();
?>
