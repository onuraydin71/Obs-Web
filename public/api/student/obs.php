<?php
$type_1 = $_GET['type_1'];
$type_2 = $_GET['type_2'];
$type_3 = $_GET['type_3'];
$type_4 = $_GET['type_4'];

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


if($type == "delete")
{
    $sql = "DELETE FROM $name WHERE id=$type_1";
    $result = $conn->query($sql);
}
else if($type == "addmessage")
{
    $date = date('d.m.Y H:i:s');
    $sql = "INSERT INTO $name (recipient_id,sender_id,subject,date,message) VALUES ('$type_1', '$type_2', '$type_3', '$date', '$type_4')";
    $result = $conn->query($sql);
}
else if($type == "password")
{
    $pass = password_hash($type_2, PASSWORD_DEFAULT);
    $sql = "UPDATE $name SET password='$pass' WHERE id=$type_1";
    $result = $conn->query($sql);
}
else if($type == "address")
{
    $sql = "UPDATE $name SET address='$type_2' WHERE id=$type_1";
    $result = $conn->query($sql);
}
    

$conn->close();
?>
