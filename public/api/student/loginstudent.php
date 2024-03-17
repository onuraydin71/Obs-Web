<?php
$name = $_GET['data'];
$pass = $_GET['password'];

$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "app_database"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$sql = "SELECT * FROM $name";
$result = $conn->query($sql);
    
if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        
        $row['password'] = password_verify($pass, $row['password']) ? '1' : '0';
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "Veri bulunamadı.";
}


$conn->close();
?>
