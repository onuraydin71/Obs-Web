<?php
$id = $_GET['id'];
$sent_id = $_GET['sent_id'];
$subject = $_GET['subject'];
$message = $_GET['message'];
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
    $sql = "DELETE FROM $name WHERE id=$id";
    $result = $conn->query($sql);
}
else if($type == "add")
{
    $date = date('d.m.Y H:i:s');
    $sql = "INSERT INTO $name (recipient_id,sender_id,subject,date,message) VALUES ('$sent_id', '$id', '$subject', '$date', '$message')";
    $result = $conn->query($sql);
}
else if($type == "password")
{
    $sql = "UPDATE $name SET password=$sent_id WHERE id=$id";
    $result = $conn->query($sql);
}
else if($type == "ad")
{
    $sql = "UPDATE $name SET address='$sent_id' WHERE id=$id";
    $result = $conn->query($sql);
}
else if($type == "attendance")
{
    $sql = "UPDATE $name SET attendance_$subject='1' WHERE student_id=$id AND lesson_id=$sent_id";
    $result = $conn->query($sql);
}
else if($type == "addExamAnswer")
{
    $sql = "INSERT INTO $name (student_id,lesson_code,student_answer,answer) VALUES ('$id', '$sent_id', '$subject', '$message')";
    $result = $conn->query($sql);
}
else
{
    $sql = "SELECT * FROM $name";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo "Veri bulunamadı.";
    }
}
    


$conn->close();
?>
