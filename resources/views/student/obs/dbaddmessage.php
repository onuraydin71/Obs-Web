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
                            $sid = $_GET['sid'];
							$subject = $_GET['subject'];
                            $message = $_GET['message'];
							
							$sql = "SELECT id FROM login_student WHERE student_number=".$sid."";
							$result = $conn->query($sql);
                           
                           
                                if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc()) {
                                        $date = date("Y-m-d H:i:s");
                                        $stid= $row['id'];
                                        $sql1 = "INSERT into message (recipient_id,sender_id,subject,date,message) VALUES ('$stid','$id','$subject','$date','$message')";
                                        $result1 = $conn->query($sql1);
                                        echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/student/obs/addmessage?id='.$id.'&sc='.$sc.'&temp=1" </script>';

                                    }
                                }
                                else{
                                    echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/student/obs/addmessage?id='.$id.'&sc='.$sc.'&temp=0" </script>';
                                }

							$conn->close();


							?>