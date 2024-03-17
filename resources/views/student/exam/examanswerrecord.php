<?php
$id = $_GET['id'];
$sc = $_GET['sc'];
$lesson_code = $_GET['lcode'];
$totalQuestions = $_GET['totalQuestions'];
$answers = array();
$trueAnswers = array();

for ($i = 1; $i <= $totalQuestions; $i++) {
    if (isset($_GET['answer' . $i])) {
        $answers[$i] = $_GET['answer' . $i];
    } else {
        $answers[$i] = ""; // Eğer cevap işaretlenmemişse, boş bir değer atanabilir
    }
    
    if (isset($_GET['trueanswer' . $i])) {
        $trueAnswers[$i] = $_GET['trueanswer' . $i];
    } else {
        $trueAnswers[$i] = "";
    }
}

use PhpParser\Node\Stmt\TryCatch;

$servername = "localhost";

$dbusername = "root";

$dbpassword = "";

$dbname = "app_database";


$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);



if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

} 

$sql = "SELECT lesson_code,exam_name FROM exam_calendar WHERE id=".$lesson_code."";
$result = $conn->query($sql);
            
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) 
    {
        for ($i = 1; $i <= $totalQuestions; $i++) {
            $sql1 = "INSERT into exam_answer_record (student_id,lesson_code,exam_type,student_answer,answer) VALUES ('$id','".$row['lesson_code']."','".$row['exam_name']."','$answers[$i]','$trueAnswers[$i]')";
            $result1 = $conn->query($sql1);
        }
    }
}

echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/student/exam/examout?id='.$_GET['id'].'&sc='.$_GET['sc'].'" </script>';

?>