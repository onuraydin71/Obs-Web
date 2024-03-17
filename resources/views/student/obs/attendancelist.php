<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Devamsızlık Bilgisi</title>
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
                    <h4 class="card-title">DEVAMSIZLIK BİLGİSİ</h4>

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

                    $sql = "SELECT id,course_name,lesson_code,hours,compulsory FROM lessons";
                    $result = $conn->query($sql);
                    echo "<table class='table table-striped'>
                      <thead>
                        <tr>
                          <th> Ders Kodu </th>
                          <th> Ders Adı </th>
                          <th> Program </th>
                          <th> Toplam Ders Haftası </th>
                          <th> Yapılan Devamsızlık / Toplam Devamsızlık  </th>
                        </tr>
                      </thead>
                      <tbody>";
                        $attendancehours = 0;
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) 
                            {
                                $sql1 = "SELECT student_id,lesson_id,attendance_1,attendance_2,attendance_3,attendance_4,attendance_5,attendance_6,attendance_7,attendance_8,attendance_9,attendance_10,attendance_11,attendance_12,attendance_13,attendance_14 FROM lesson_registration";
                                $result1 = $conn->query($sql1);
                                
                                if($result1->num_rows > 0)
                                {
                                    while($row1 = $result1->fetch_assoc()) 
                                    {
                                        if($row['id'] == $row1['lesson_id'] && $row1['student_id'] == $_GET['id'])
                                        {
                                            for($i=1; $i<=floatval($row['hours']);$i++)
                                            {
                                                if($row1['attendance_'.$i.''] == "0")
                                                {
                                                    $attendancehours++;
                                                }
                                            } 
                                            echo "<tr>
                                                <td>";
                                                    echo $row["lesson_code"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row["course_name"];
                                                echo "</td>
                                                <td>"; 
                                                    $sql2 = "SELECT course_name FROM login_student WHERE id=".$_GET['id']."";
                                                    $result2 = $conn->query($sql2);
                                                    if($result2->num_rows > 0)
                                                    {
                                                        while($row2 = $result2->fetch_assoc()) 
                                                        {
                                                            echo $row2['course_name'];
                                                        }
                                                    }
                                                echo "</td>
                                                <td>"; 
                                                    echo $row['hours'];
                                                echo "</td>
                                                <td>"; 
                                                    echo $attendancehours."/".$row['compulsory'];
                                                echo "</td>
                                                </tr>";              
                                        }
                                        $attendancehours = 0;
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