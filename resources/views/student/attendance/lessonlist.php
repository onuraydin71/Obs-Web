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
      </style>
      <script>
        function myFunction(lid) {
            window.location.href = "http://localhost:8000/student/attendance/lessonweeks?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>&lid="+lid+"";
        }
      </script>
  </head>
  <body>
        <?php require_once 'menubar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

         
          <div class="page-header">
                <h3 class="page-title"> Derslerim </h3>
            </div>
          <div class="row">
            
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">


                    <h4 class="card-title">Pazartesi </h4>
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

                      $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE student_id='$id' and day_name='monday'";
                      $result = $conn->query($sql);

                      if($result->num_rows > 0)
                      {
                          while($row = $result->fetch_assoc()) 
                          {

                              $sql1 = "SELECT id,course_name,start_time,lesson_code FROM lessons WHERE id=".$row['lesson_id']."";
                              $result1 = $conn->query($sql1);
                              if($result1->num_rows > 0)
                              {
                              while($row1 = $result1->fetch_assoc()) 
                                  {
                                    echo" <div class='details-container'>
                                    <button type='button' class='btn btn-primary btn-lg btn-block' onclick='myFunction(".$row1['id'].")';' > ".$row1['course_name']." </button>
                                    </div>";

                                  }
                              }
                          }
                      }
                      else
                      {
                        echo "<div class='details-container'>
                            Tanımlı Ders Programı Bulunamadı.
                            </div>";
                      }

                     
                    ?>

                    <h4 class="card-title">Salı </h4>

                    <?php

                      $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE student_id='$id' and day_name='tuesday'";
                      $result = $conn->query($sql);

                      if($result->num_rows > 0)
                      {
                          while($row = $result->fetch_assoc()) 
                          {

                              $sql1 = "SELECT id,course_name,start_time,lesson_code FROM lessons WHERE id=".$row['lesson_id']."";
                              $result1 = $conn->query($sql1);
                              if($result1->num_rows > 0)
                              {
                              while($row1 = $result1->fetch_assoc()) 
                                  {
                                    echo" <div class='details-container'>
                                    <button type='button' class='btn btn-primary btn-lg btn-block' onclick='myFunction(".$row1['id'].")';' > ".$row1['course_name']." </button>
                                    </div>";

                                  }
                              }
                          }
                      }
                      else
                      {
                        echo "<div class='details-container'>
                            Tanımlı Ders Programı Bulunamadı.
                            </div>";
                      }

                     
                    ?>

                    <h4 class="card-title">Çarşamba </h4>

                    <?php
                      $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE student_id='$id' and day_name='wednesday'";
                      $result = $conn->query($sql);

                      if($result->num_rows > 0)
                      {
                          while($row = $result->fetch_assoc()) 
                          {

                              $sql1 = "SELECT id,course_name,start_time,lesson_code FROM lessons WHERE id=".$row['lesson_id']."";
                              $result1 = $conn->query($sql1);
                              if($result1->num_rows > 0)
                              {
                              while($row1 = $result1->fetch_assoc()) 
                                  {
                                    echo" <div class='details-container'>
                                    <button type='button' class='btn btn-primary btn-lg btn-block' onclick='myFunction(".$row1['id'].")';' > ".$row1['course_name']." </button>
                                    </div>";

                                  }
                              }
                          }
                      }
                      else
                      {
                        echo "<div class='details-container'>
                            Tanımlı Ders Programı Bulunamadı.
                            </div>";
                      }

                     
                    ?>

                      <h4 class="card-title">Perşembe </h4>

                      <?php
                        $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE student_id='$id' and day_name='thursday'";
                        $result = $conn->query($sql);

                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) 
                            {

                                $sql1 = "SELECT id,course_name,start_time,lesson_code FROM lessons WHERE id=".$row['lesson_id']."";
                                $result1 = $conn->query($sql1);
                                if($result1->num_rows > 0)
                                {
                                while($row1 = $result1->fetch_assoc()) 
                                    {
                                      echo" <div class='details-container'>
                                      <button type='button' class='btn btn-primary btn-lg btn-block' onclick='myFunction(".$row1['id'].")';' > ".$row1['course_name']." </button>
                                      </div>";

                                    }
                                }
                            }
                        }
                        else
                        {
                          echo "<div class='details-container'>
                            Tanımlı Ders Programı Bulunamadı.
                            </div>";
                        }

                      
                      ?>

                        <h4 class="card-title">Cuma </h4>

                        <?php
                          $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE student_id='$id' and day_name='friday'";
                          $result = $conn->query($sql);

                          if($result->num_rows > 0)
                          {
                              while($row = $result->fetch_assoc()) 
                              {

                                  $sql1 = "SELECT id,course_name,start_time,lesson_code FROM lessons WHERE id=".$row['lesson_id']."";
                                  $result1 = $conn->query($sql1);
                                  if($result1->num_rows > 0)
                                  {
                                  while($row1 = $result1->fetch_assoc()) 
                                      {
                                        echo" <div class='details-container'>
                                        <button type='button' class='btn btn-primary btn-lg btn-block' onclick='myFunction(".$row1['id'].")';' > ".$row1['course_name']." </button>
                                        </div>";

                                      }
                                  }
                              }
                          }
                          else
                          {
                            echo "<div class='details-container'>
                            Tanımlı Ders Programı Bulunamadı.
                            </div>";
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
    <!-- End custom js for this page -->
  </body>
</html>