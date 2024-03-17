<?php
$student_id = $_GET['student_id'];
$lesson_id = $_GET['lesson_id'];
$academician_id = $_GET['academician_id'];
$note = $_GET['note'];
$noteType = $_GET['notetype'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);



$sql = "UPDATE lesson_registration SET $noteType='$note' WHERE student_id='$student_id' AND lesson_id='$lesson_id' AND academician_name='$academician_id'";
$result = $conn->query($sql);
    


$conn->close();
?>