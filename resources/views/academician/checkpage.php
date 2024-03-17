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
							$temp = 0;
							$sql = "SELECT id,security_code FROM login_academician";
							$result = $conn->query($sql);
                           
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc()) {
                                    if($row["id"] == $id && $row["security_code"] == $sc)
                                    {
                                      $temp=1;
                                    }
                                }
                            }
              
                            if($temp == 0)
                            {
                              echo '<script type="text/javascript"> window.location.href = "http://localhost:8000/academician/login"</script>';
                            }
							$conn->close();

?>