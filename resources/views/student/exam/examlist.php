<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sınavlarım</title>
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
    <script>
        function myFunction(id) {
            window.location.href = "http://localhost:8000/student/exam/examloading?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>&lcode="+id+"";
        }
      </script>
  </head>
  
  <body>
        <?php require_once 'menubar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

        

          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sınavlarım</h4>
                    </p>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>DERS ADI</th>
                          <th>SINAV ADI</th>
                          <th>SINAV TARİHİ</th>
                          <th>SINAV SAATİ</th>
                          <th>SINAV DURUMU </th>
                        </tr>
                      </thead>
                      <tbody>
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

                            $sql = "SELECT id,lesson_code,course_name,exam_name,exam_place,date FROM exam_calendar";
                            $result = $conn->query($sql);
                                        
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc()) 
                                {
                                    if($row['exam_place'] == "true")
                                    {
                                        $sql1 = "SELECT id,lesson_code FROM lessons";
                                        $result1 = $conn->query($sql1);
                                        if($result1->num_rows > 0)
                                        {
                                            while($row1 = $result1->fetch_assoc()) 
                                            {
                                                if($row1['lesson_code'] == $row['lesson_code'])
                                                {
                                                    $sql2 = "SELECT student_id FROM lesson_registration WHERE student_id=".$id." and lesson_id=".$row1['id']."";
                                                    $result2 = $conn->query($sql2);
                                                                
                                                    if($result2->num_rows > 0)
                                                    {
                                                        while($row2 = $result2->fetch_assoc()) 
                                                        {
                                                            $now = new DateTime();
                                                            
                                                            $tarih_verisi = $row['date'];
                                                            $datetime = DateTime::createFromFormat('Y-m-d H:i:s.u', $tarih_verisi);
                                                            $datetimeafter = DateTime::createFromFormat('Y-m-d H:i:s.u', $tarih_verisi);
                                                            $datetimeafter->modify('+15 minutes');
                                                            $tarih = $datetime->format('d.m.Y');
                                                            $saat = $datetime->format('H:i:s');
                                                            $saatafter = $datetimeafter->format('H:i:s');
                                                            echo"
                                                            <tr>
                                                            <td>".$row['course_name']."</td>
                                                            <td>".$row['exam_name']."</td>
                                                            <td>".$tarih."</td>
                                                            <td>".$saat." - ".$saatafter."</td>";
                                                            
                                                            if($now > $datetimeafter)
                                                            {
                                                                echo "<td><label class='badge badge-danger'>Sınav Giriş Süresi Doldu</label></td>";

                                                            }
                                                            else if($now > $datetime && $now < $datetimeafter)
                                                            {
                                                                echo "<td><button type='button' onclick='myFunction(".$row['id'].");' class='btn btn-outline-primary btn-fw'>Sınava Başla</button></td>";

                                                            }
                                                            else if($now < $datetime)
                                                            {
                                                                echo "<td><label class='badge badge-warning'>Sınav Henüz Başlamadı</label></td>";

                                                            }
                                                           
                                                            echo"</tr>
                                                            ";
                                                        }
                                                    }
                                                }
                                                
                                            }
                                        }
                                    }
                                }
                            }

                        ?>
                      </tbody>
                    </table>
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