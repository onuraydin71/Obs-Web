<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Not Listesi</title>
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
                    <h4 class="card-title">NOT LİSTESİ</h4>

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

                    $sql = "SELECT id,course_name,lesson_code FROM lessons";
                    $result = $conn->query($sql);
                    echo "<table class='table table-striped'>
                      <thead>
                        <tr>
                          <th> Ders Kodu </th>
                          <th> Ders Adı </th>
                          <th> Sınav Sonuçları </th>
                          <th> Ortalama </th>
                          <th> Harf Notu  </th>
                          <th> Durum </th>
                        </tr>
                      </thead>
                      <tbody>";
                        
                    $notes = "";
                    $ortalama = 0;
                    $HarfNotu = "";
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) 
                            {
                                $sql1 = "SELECT student_id,lesson_id,visa_exam,visa_exam_percent,final_exam,final_exam_percent,make_up_exam,make_up_exam_percent,homework_exam,homework_exam_percent,project_exam,project_exam_percent,practice_exam,practice_exam_percent,quiz_exam,quiz_exam_percent FROM lesson_registration";
                                $result1 = $conn->query($sql1);
                                
                                if($result1->num_rows > 0)
                                {
                                    while($row1 = $result1->fetch_assoc()) 
                                    {
                                        if($row['id'] == $row1['lesson_id'] && $row1['student_id'] == $_GET['id'])
                                        {
                                            echo "<tr>
                                            <td>";
                                                echo $row["lesson_code"];
                                            echo "</td>
                                            <td>"; 
                                                echo $row["course_name"];
                                            echo "</td>
                                            <td>"; 
                                                if($row1['visa_exam'] != "")
                                                {
                                                    echo "vize: ".$row1["visa_exam"]." - ";
                                                }
                                                if($row1['final_exam'] != "")
                                                {
                                                    echo "final: ".$row1["final_exam"]." - ";
                                                }
                                                if($row1['make_up_exam'] != "")
                                                {
                                                    echo "bütünleme: ".$row1["make_up_exam"]." - ";
                                                }
                                                if($row1['homework_exam'] != "")
                                                {
                                                    echo "ödev: ".$row1["homework_exam"]." - ";
                                                }
                                                if($row1['project_exam'] != "")
                                                {
                                                    echo "proje: ".$row1["project_exam"]." - ";
                                                }
                                                if($row1['practice_exam'] != "")
                                                {
                                                    echo "uygulama: ".$row1["practice_exam"]." - ";
                                                }
                                                if($row1['quiz_exam'] != "")
                                                {
                                                    echo "quiz: ".$row1["quiz_exam"]." - ";
                                                }
                                            echo "</td>
                                            <td>"; 
                                                if($row1['final_exam'] != "")
                                                {
                                                    if($row1['visa_exam'] != "")
                                                    {
                                                        $ortalama += floatval($row1['visa_exam']) * floatval($row1['visa_exam_percent'])/100;
                                                    }
                                                    if($row1['final_exam'] != "")
                                                    {
                                                        $ortalama += floatval($row1['final_exam']) * floatval($row1['final_exam_percent'])/100;
                                                    }
                                                    if($row1['make_up_exam'] != "")
                                                    {
                                                        $ortalama += floatval($row1['make_up_exam']) * floatval($row1['make_up_exam_percent'])/100;
                                                    }
                                                    if($row1['homework_exam'] != "")
                                                    {
                                                        $ortalama += floatval($row1['homework_exam']) * floatval($row1['homework_exam_percent'])/100;
                                                    }
                                                    if($row1['project_exam'] != "")
                                                    {
                                                        $ortalama += floatval($row1['project_exam']) * floatval($row1['project_exam_percent'])/100;
                                                    }
                                                    if($row1['practice_exam'] != "")
                                                    {
                                                        $ortalama += floatval($row1['practice_exam']) * floatval($row1['practice_exam_percent'])/100;
                                                    }
                                                    if($row1['quiz_exam'] != "")
                                                    {
                                                        $ortalama += floatval($row1['quiz_exam']) * floatval($row1['quiz_exam_percent'])/100;
                                                    }
                                                    echo $ortalama;
                                                }
                                                
                                            echo "</td>
                                            <td>"; 
                                                    if($ortalama == 0)
                                                    {
                                                        echo "";
                                                        $HarfNotu = "";
                                                    }
                                                    else if($ortalama >= 90)
                                                    {
                                                        echo "AA";
                                                        $HarfNotu = "AA";
                                                    }
                                                    else if($ortalama >=86 && $ortalama <89)
                                                    {
                                                        echo "AB";
                                                        $HarfNotu = "AB";
                                                    }
                                                    else if($ortalama >=81 && $ortalama <85)
                                                    {
                                                        echo "BA";
                                                        $HarfNotu = "BA";
                                                    }
                                                    else if($ortalama >=76 && $ortalama <80)
                                                    {
                                                        echo "BB";
                                                        $HarfNotu = "BB";
                                                    }
                                                    else if($ortalama >=70 && $ortalama <75)
                                                    {
                                                        echo "BC";
                                                        $HarfNotu = "BC";
                                                    }
                                                    else if($ortalama >=65 && $ortalama <69)
                                                    {
                                                        echo "CB";
                                                        $HarfNotu = "CB";
                                                    }
                                                    else if($ortalama >=56 && $ortalama <64)
                                                    {
                                                        echo "CC";
                                                        $HarfNotu = "CC";
                                                    }
                                                    else if($ortalama >=48 && $ortalama <56)
                                                    {
                                                        echo "CD";
                                                        $HarfNotu = "CD";
                                                    }
                                                    else if($ortalama >=40 && $ortalama <48)
                                                    {
                                                        echo "DC";
                                                        $HarfNotu = "DC";
                                                    }
                                                    else if($ortalama >=35 && $ortalama <40)
                                                    {
                                                        echo "DD";
                                                        $HarfNotu = "DD";
                                                    }
                                                    else if($ortalama < 35)
                                                    {
                                                        echo "FF";
                                                        $HarfNotu = "FF";
                                                    }
                                                    
                                            echo "</td>
                                            <td>"; 
                                                if($HarfNotu == "FF" || $HarfNotu == "DD")
                                                    echo "Kaldı";
                                                else if($HarfNotu == "DC")
                                                    echo "Sorumlu Geçti";
                                                else if($HarfNotu == "")
                                                    echo "";
                                                else
                                                    echo "Geçti";
                                            echo "</td>
                                            </tr>";                
                                        }
                                        $ortalama = 0;
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