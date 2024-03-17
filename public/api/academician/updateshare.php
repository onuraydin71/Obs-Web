<?php
$id = $_GET['id'];
$share = $_GET['share'];
$examtype = $_GET['examtype'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);



$sql = "UPDATE exam_calendar SET share='$share' WHERE lesson_code='$id' AND exam_name='$examtype'";
$result = $conn->query($sql);
    


$conn->close();
?>
