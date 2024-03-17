<?php
$examCode = $_GET['examcode'];
$examType = $_GET['examtype'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);



$sql = "DELETE FROM exam_calendar WHERE lesson_code='$examCode' AND exam_name='$examType'";
$result = $conn->query($sql);
    


$conn->close();
?>
