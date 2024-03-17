<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akademik Takvim</title>
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
        .table-container {
            overflow-x: auto; /* Eğer tablo dışarı taşarsa yatay kaydırma çubuğunu göster */
            width: 100%; /* Container'ın ekran genişliği kadar olmasını sağla */
        }
    </style>
  </head>
  <body>
        <?php require_once 'menubar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">AKADEMİK TAKVİM</h4>

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

                    $sql = "SELECT academic_transaction,fall_semester,spring_semester FROM academic_calendar";
                    $result = $conn->query($sql);
                    echo "<div class='table-container'>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          <th> AKADEMİK İŞLEM </th>
                          <th> GÜZ YARIYILI </th>
                          <th> BAHAR YARIYILI </th>
                        </tr>
                      </thead>
                      <tbody>";
                        
                       
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>";
                                    echo $row["academic_transaction"];
                                echo "</td>
                                <td>"; 
                                    echo $row["fall_semester"];
                                echo "</td>
                                <td>"; 
                                    echo $row["spring_semester"];
                                echo "</td>
                              </tr>";
                            }
                        }
                        
                      echo "</tbody>
                    </table>
                    </div>";
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