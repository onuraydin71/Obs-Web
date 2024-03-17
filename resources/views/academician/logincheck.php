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
							
							$user = $_GET['username'];
							$password = $_GET['password'];
							
							$sql = "SELECT id,employee_number,password FROM login_academician";
							$result = $conn->query($sql);
                           
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc()) {
                                    if($row["employee_number"] == $user && password_verify($password,$row["password"]))
									{
										$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
											$charactersLength = strlen($characters);
											$randomCode = '';
			
											for ($i = 0; $i < 70; $i++) {
												$randomCode .= $characters[rand(0, $charactersLength - 1)];
											}

										$sql1 = "UPDATE login_academician SET security_code='$randomCode' WHERE id=".$row['id']."";
										$result1 = $conn->query($sql1);
									   echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/academician/mainmenu?id='.$row['id'].'&sc='.$randomCode.'" </script>';
                                    }

                                }
                            }

							echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/academician/login?temp=1"</script>';
							$conn->close();


							?>