<?php
$end_time = $_GET['end_time'];
$openLesson = $_GET['openLesson'];
$code = $_GET['code'];
$lesson_id = $_GET['lesson_id'];
$academician_id = $_GET['academician_id'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);


$sql = "UPDATE lessons SET end_time='$end_time' , openLesson='$openLesson',code='$code', academician_id='$academician_id' WHERE id=$lesson_id";
$result = $conn->query($sql);
    


$conn->close();
?>
