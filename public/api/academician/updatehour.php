<?php
$id = $_GET['id'];
$hour = $_GET['hour'];
$examtype = $_GET['examtype'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);



$sql = "UPDATE exam_calendar SET hour='$hour' WHERE lesson_code='$id' AND exam_name='$examtype'";
$result = $conn->query($sql);
    


$conn->close();
?>
