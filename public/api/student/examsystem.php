<?php
$student_id = $_GET['student_id'];
$lesson_code = $_GET['lesson_code'];
$student_answer = $_GET['student_answer'];
$answer = $_GET['answer'];
$exam_type = $_GET['exam_type'];

$type = $_GET['type'];
$name = $_GET['data'];

$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if($type == "addExamAnswer")
{
    $sql = "INSERT INTO $name (student_id,lesson_code,student_answer,answer,exam_type) VALUES ('$student_id', '$lesson_code', '$student_answer', '$answer','$exam_type')";
    $result = $conn->query($sql);
}

$conn->close();
?>
