<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Genel Bilgiler</title>
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
          
          <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php
					if(isset($_GET['temp']))
					{
                        if($_GET['temp'] == 1)
                        {
                            echo"
						<div class='alert alert-success'>
						<strong>Başarılı!</strong> Adres Güncellendi.
					    </div>
						";
                        }
					};
					
					?>
                    <h4 class="card-title">Genel Bilgiler</h4>
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
                    $sql = "SELECT student_number,name,lastname,address,tc_number,birthday,course_name FROM login_student WHERE id=".$_GET['id']."";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) 
                            
                            {

                                echo "<form class='forms-sample' method='GET' action='updateinfo'>
                                <div class='form-group'>
                                    <label for='exampleInputUsername1'>Ad</label>
                                    <input type='text' class='form-control' id='exampleInputUsername1' value='".$row['name']."' disabled>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputEmail1'>Soyad </label>
                                    <input type='text' class='form-control' id='exampleInputEmail1'  value='".$row['lastname']."' disabled>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputPassword1'>Öğrenci Numarası</label>
                                    <input type='text' class='form-control' id='exampleInputEmail1' value='".$row['student_number']."' disabled>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputPassword1'>TC Kimlik No </label>
                                    <input type='text' class='form-control' id='exampleInputEmail1' value='".$row['tc_number']."' disabled>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputPassword1'>Doğum Günü </label>
                                    <input type='text' class='form-control' id='exampleInputEmail1' value='".$row['birthday']."' disabled>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputPassword1'>Adres</label>
                                    <input type='text' class='form-control' id='exampleInputEmail1' name='address' value='".$row['address']."' >
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputConfirmPassword1'>Bölüm İsmi   </label>
                                    <input type='text' class='form-control' id='exampleInputConfirmPassword1' value='".$row['course_name']."' disabled>
                                </div>
                                <input type='hidden' name='id' value='".$_GET["id"]."'>
                                <input type='hidden' name='sc' value='".$_GET["sc"]."'>
                                <button type='submit' class='btn btn-primary me-2'>Kaydet</button>
                                </form>";
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
    <!-- End custom js for this page -->
  </body>
</html>