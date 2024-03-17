<?php
$lesson_code = $_GET['lesson_code'];
$course_name = $_GET['course_name'];
$exam_name = $_GET['exam_name'];
$exam_place = $_GET['exam_place'];
$date = $_GET['date'];
$effectiveness_rate = $_GET['effectiveness_rate'];
$included = $_GET['included'];
$hour = $_GET['hour'];
$share = $_GET['share'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);



$sql = "INSERT INTO exam_calendar (lesson_code,course_name,exam_name,exam_place,date,effectiveness_rate,included,hour,share) VALUES ('$lesson_code', '$course_name', '$exam_name', '$exam_place', '$date', '$effectiveness_rate', '$included', '$hour','$share')";
$result = $conn->query($sql);

$conn->close();
?>