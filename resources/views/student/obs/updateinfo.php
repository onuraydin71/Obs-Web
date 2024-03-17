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
                            $address = $_GET['address'];
							
							$sql = "SELECT id FROM login_student";
							$result = $conn->query($sql);
                           
                                if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc()) {
                                        if($row["id"] == $id)
                                        {
                                            $sql1 = "UPDATE login_student SET address='$address' WHERE id=".$row['id']."";
                                            $result1 = $conn->query($sql1);
                                            echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/student/obs/info?id='.$id.'&sc='.$sc.'&temp=1" </script>';
                                        }
                                    }
                                }
							$conn->close();


							?>