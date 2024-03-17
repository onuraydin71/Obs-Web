<?php

use PhpParser\Node\Stmt\TryCatch;

							$servername = "localhost";

							$dbusername = "root";

							$dbpassword = "";

							$dbname = "app_database";


							$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

							

							if ($conn->connect_error) {

								die("Connection failed: " . $conn->connect_error);

							} 

							
							
							$id = $_GET['id'];
							$sc = $_GET['sc'];
                            $lid = $_GET['lid'];
                            $wid = $_GET['wid'];
                            $code = $_GET['code'];
							
							
                            $sql1 = "SELECT id,attendance_".$wid." FROM lesson_registration WHERE student_id=".$_GET['id']." and lesson_id=".$_GET['lid']."";
                            $result1 = $conn->query($sql1);
                                    
                            if($result1->num_rows > 0)
                            {
                                while($row1 = $result1->fetch_assoc()) 
                                {
                                    $sql = "SELECT id,code,end_time FROM lessons WHERE id=".$_GET['lid']."";
                                    $result = $conn->query($sql);
                                            
                                    if($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                            $start_time = new DateTime();;
                                            $end_time = new DateTime($row['end_time']);
                                            $check = $end_time->getTimestamp() - $start_time->getTimestamp();
                                            if($check>0)
                                            {
                                                if($row['code'] == $code)
                                                {
                                                    $sql2 = "UPDATE lesson_registration SET attendance_".$wid."='1' WHERE id=".$row1['id']."";
                                                    $result2 = $conn->query($sql2);
                                                    echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/student/attendance/lessonweeks?id='.$id.'&sc='.$sc.'&lid='.$lid.'&wid='.$wid.'" </script>';            
                                                }
                                                else
                                                {
                                                    echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/student/attendance/joinlesson?id='.$id.'&sc='.$sc.'&lid='.$lid.'&wid='.$wid.'&temp=0" </script>';            
                                                }
                                            }
                                            else
                                            {
                                                echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/student/attendance/joinlesson?id='.$id.'&sc='.$sc.'&lid='.$lid.'&wid='.$wid.'&temp=1" </script>';            
                                            }
                                            
                                        }
                                    }
                                    
                                }
                            }    

							$conn->close();


							?>