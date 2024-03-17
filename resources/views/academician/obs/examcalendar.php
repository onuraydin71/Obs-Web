<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sınav Takvimi</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
        <?php require_once 'menubar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">SINAV TAKVİMİ</h4>

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

                    $sql = "SELECT lesson_code,course_name,exam_name,exam_place,date,effectiveness_rate,included FROM exam_calendar";
                    $result = $conn->query($sql);
                    echo "<table class='table table-striped'>
                      <thead>
                        <tr>
                          <th> Ders Kodu </th>
                          <th> Ders Adı </th>
                          <th> Sınav Adı </th>
                          <th> Sınav Tarihi </th>
                          <th> Etki Oranı  </th>
                          <th> Sınava Dahil </th>
                        </tr>
                      </thead>
                      <tbody>";
                        
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {
                                $sql1 = "SELECT id,course_name FROM lessons";
                                $result1 = $conn->query($sql1);
                                
                                if($result1->num_rows > 0)
                                {
                                    while($row1 = $result1->fetch_assoc()) 
                                    {
                                        if(Trim($row['course_name']) == Trim($row1['course_name']))
                                        {
                                            $sql2 = "SELECT student_id,lesson_id FROM lesson_registration WHERE academician_name=".$_GET['id']." and lesson_id=".$row1['id']."";
                                            $result2 = $conn->query($sql2);
    
                                            if($result2->num_rows > 0)
                                            {
                                                while($row2 = $result2->fetch_assoc()) 
                                                {
                                                    echo "<tr>
                                                    <td>";
                                                        echo $row["lesson_code"];
                                                    echo "</td>
                                                    <td>"; 
                                                        echo $row["course_name"];
                                                    echo "</td>
                                                    <td>";
                                                        if($row['exam_place'] == "true")
                                                          echo $row["exam_name"]." (UNİKA)";
                                                        else
                                                          echo $row["exam_name"];
                                                    echo "</td>
                                                    <td>";
                                                        $date = $row["date"];
                                                        $dateTime = new DateTime($date);
                                                        $newDate = $dateTime->format("Y-m-d H:i:s");
                                                        echo $newDate;
                                                    echo "</td>
                                                    <td>"; 
                                                        echo $row["effectiveness_rate"];
                                                    echo "</td>
                                                    <td>"; 
                                                        echo $row["included"];
                                                    echo "</td>
                                                    </tr>";
                                                    break;
                                                }
                                            }
                                        }
                                        
                                    }
                                }
                            }
                        }
                        
                      echo "</tbody>
                    </table>";
                    ?>
                  </div>
                </div>
              </div>



          
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>