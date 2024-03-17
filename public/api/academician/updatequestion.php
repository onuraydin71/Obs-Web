<?php
$id = $_GET['id'];
$question = $_GET['question'];
$a = $_GET['a'];
$b = $_GET['b'];
$c = $_GET['c'];
$d = $_GET['d'];
$e = $_GET['e'];
$answer = $_GET['answer'];


$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);



$sql = "UPDATE exam_question SET question='$question', a='$a', b='$b', c='$c', d='$d', e='$e', answer='$answer' WHERE id=$id";
$result = $conn->query($sql);
    


$conn->close();
?>
