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
                
                            $sql = "SELECT id,sender_id,subject,date,message FROM message WHERE recipient_id=".$_GET['id']." ORDER BY id DESC";
							$result = $conn->query($sql);
                           
                            if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc()) 
                                    {
                                        $sql1 = "UPDATE message SET checked='true' WHERE id=".$row['id']."";
                                        $result1 = $conn->query($sql1);
                                    }
                                }
           
           


                                ?>