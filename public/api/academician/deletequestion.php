<?php
$id = $_GET['id'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);



$sql = "DELETE FROM exam_question WHERE id=$id";
$result = $conn->query($sql);
    


$conn->close();
?>
