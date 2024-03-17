<?php
$id = $_GET['id'];
$sc = $_GET['sc'];
$lesson = $_GET['lesson'];
$exam = $_GET['exam'];
            use PhpParser\Node\Stmt\TryCatch;

							$servername = "localhost";

							$dbusername = "root";

							$dbpassword = "";

							$dbname = "app_database";


							$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

							

							if ($conn->connect_error) {

								die("Connection failed: " . $conn->connect_error);

							} 
                            
                            $sql = "SELECT id,lesson_code,course_name FROM lessons";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {

                                if($row['course_name'] == $_GET['lesson'])
                                {
                                    $sql1 = "SELECT id,student_id,visa_exam,final_exam,make_up_exam,homework_exam,project_exam,practice_exam,quiz_exam FROM lesson_registration WHERE academician_name=".$_GET['id']." and lesson_id=".$row['id']."";
                                    $result1 = $conn->query($sql1);
                                    
                                    if($result1->num_rows > 0)
                                    {
                                        while($row1 = $result1->fetch_assoc()) 
                                        {
                                                    if("Vize" == $_GET['exam'])
                                                    {
                                                        $sql3 = "UPDATE lesson_registration SET visa_exam='".$_GET["visa_".$row1['id'].""]."' WHERE id=".$row1['id']."";
                                                        $result3 = $conn->query($sql3);
                                                    }
                                                    else if("Final" == $_GET['exam'])
                                                    {
                                                        $sql3 = "UPDATE lesson_registration SET final_exam='".$_GET["final_".$row1['id'].""]."' WHERE id=".$row1['id']."";
                                                        $result3 = $conn->query($sql3);                                                    }
                                                    else if("Bütünleme" == $_GET['exam'])
                                                    {
                                                        $sql3 = "UPDATE lesson_registration SET make_up_exam='".$_GET["make_up_".$row1['id'].""]."' WHERE id=".$row1['id']."";
                                                        $result3 = $conn->query($sql3);                                                    }
                                                    else if("Ödev" == $_GET['exam'])
                                                    {
                                                        $sql3 = "UPDATE lesson_registration SET homework_exam='".$_GET["homework_".$row1['id'].""]."' WHERE id=".$row1['id']."";
                                                        $result3 = $conn->query($sql3);                                                    }
                                                    else if("Proje" == $_GET['exam'])
                                                    {
                                                        $sql3 = "UPDATE lesson_registration SET project_exam='".$_GET["project_".$row1['id'].""]."' WHERE id=".$row1['id']."";
                                                        $result3 = $conn->query($sql3);                                                    }
                                                    else if("Uygulama" == $_GET['exam'])
                                                    {
                                                        $sql3 = "UPDATE lesson_registration SET practice_exam='".$_GET["practice_".$row1['id'].""]."' WHERE id=".$row1['id']."";
                                                        $result3 = $conn->query($sql3);                                                    }
                                                    else if("Quiz" == $_GET['exam'])
                                                    {
                                                        $sql3 = "UPDATE lesson_registration SET quiz_exam='".$_GET["quiz_".$row1['id'].""]."' WHERE id=".$row1['id']."";
                                                        $result3 = $conn->query($sql3);                                                    }
                                        }
                                    }
                                }
                                }
                            }

                            echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/academician/obs/studentnotelist?id='.$id.'&sc='.$sc.'&lesson='.$lesson.'&exam='.$exam.'" </script>';

                                ?>