<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Yoklama Listesi</title>
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
    <style>
      .details-container {
         margin: 20px;
      }
      .kirmizi-nokta {
        width: 10px;
        height: 10px;
        background-color: red;
        border-radius: 50%;
    }
      </style>
      <script>
        function showMessageGreen() {
            alert("Yoklamaya Katıldın!");
        }
        function showMessageRed() {
            alert("Yoklamaya Katılamadın!");
        }
        function showMessageBlue() {
            alert("Yoklama Açılmadı!");
        }
        function joinLesson(lid,wid) {
            window.location.href = "http://localhost:8000/student/attendance/joinlesson?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>&lid="+lid+"&wid="+wid+"";
        }
        </script>   
  </head>
  <body>
        <?php require_once 'menubar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="row">
            
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                
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

                    $sql = "SELECT id,course_name,lesson_code,hours,compulsory,openLesson FROM lessons WHERE id=".$_GET['lid']."";
                    $result = $conn->query($sql);


                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc()) 
                        {
                            echo"<div class='page-header'>
                             <h3 class='page-title'>".$row['course_name']."<br> <br>Ders Haftaları </h3>
                            </div>";
                
                            $sql1 = "SELECT attendance_1,attendance_2,attendance_3,attendance_4,attendance_5,attendance_6,attendance_7,attendance_8,attendance_9,attendance_10,attendance_11,attendance_12,attendance_13,attendance_14 FROM lesson_registration WHERE student_id=".$_GET['id']." and lesson_id=".$_GET['lid']."";
                            $result1 = $conn->query($sql1);
                            
                            if($result1->num_rows > 0)
                            {
                                while($row1 = $result1->fetch_assoc()) 
                                {
                                    
                                    for($i=1; $i<=floatval($row['hours']);$i++)
                                        {
                                            if($row1['attendance_'.$i.''] == "1")
                                            {
                                              if($row['openLesson'] == "$i")
                                                {
                                                    echo "<div class='details-container'>
                                                    <button type='button' onclick='showMessageGreen()' class='btn btn-success btn-fw'>".$i.".Hafta</button><span style='color:red; font-size: 1.5em;'> •</span>
                                                    </div>";
                                                }
                                                else
                                                {
                                                  echo "<div class='details-container'>
                                                  <button type='button' onclick='showMessageGreen()' class='btn btn-success btn-fw'>".$i.".Hafta</button>
                                                  </div>";
                                                }
                                            }
                                            else if($row1['attendance_'.$i.''] == "0")
                                            {
                                              if($row['openLesson'] == "$i")
                                              {
                                                  echo "<div class='details-container'>
                                                  <button type='button' onclick='joinLesson(".$row['id'].",".$i.")' class='btn btn-danger btn-fw'>".$i.".Hafta</button><span style='color:red; font-size: 1.5em;'> •</span>
                                                  </div>";
                                              }
                                              else
                                              {
                                                echo "<div class='details-container'>
                                                <button type='button' onclick='showMessageRed()' class='btn btn-danger btn-fw'>".$i.".Hafta</button>
                                                </div>";
                                              }
                                                
                                            }
                                            else
                                            {
                                                if($row['openLesson'] == "$i")
                                                {
                                                    echo "<div class='details-container'>
                                                    <button type='button' onclick='joinLesson(".$row['id'].",".$i.")' class='btn btn-outline-primary btn-fw'>".$i.".Hafta</button><span style='color:red; font-size: 1.5em;'> •</span>
                                                    </div>";
                                                }
                                                else
                                                {
                                                    echo "<div class='details-container'>
                                                    <button type='button' onclick='showMessageBlue()' class='btn btn-outline-primary btn-fw'>".$i.".Hafta</button>
                                                    </div>";
                                                }
                                               
                                            }
                                            
                                        } 
                                }
                            }
                        }
                    }

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
    <script src="../../assets/js/chart.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>