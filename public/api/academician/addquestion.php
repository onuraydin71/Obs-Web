<?php
$question = $_GET['question'];
$a = $_GET['a'];
$b = $_GET['b'];
$c = $_GET['c'];
$d = $_GET['d'];
$e = $_GET['e'];
$answer = $_GET['answer'];
$course_id = $_GET['course_id'];
$exam_type = $_GET['exam_type'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);



    
$sql = "INSERT INTO exam_question (question,a,b,c,d,e,answer,course_id,exam_type) VALUES ('$question', '$a', '$b', '$c', '$d', '$e', '$answer', '$course_id', '$exam_type')";
$result = $conn->query($sql);

$conn->close();
?>