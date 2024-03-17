<?php
$id = $_GET['id'];
$date = $_GET['date'];
$examtype = $_GET['examtype'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);



$sql = "UPDATE exam_calendar SET date='$date' WHERE lesson_code='$id' AND exam_name='$examtype'";
$result = $conn->query($sql);
    


$conn->close();
?>
