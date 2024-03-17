<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NOT LİSTESİ</title>
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
    .custom-input {
        border: none; /* Kenarlık olmadan */
        border-bottom: 1px solid #000; /* Sadece alt kısmında bir çizgi */
        background-color: transparent; /* Arkaplanı saydam yap */
        outline: none; /* Odaklandığında kenarlık olmasın */
        width: auto; /* Genişliği içeriğe göre ayarla */
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
                    
                    echo "
                    <h4 class='card-title'>".$_GET['lesson']." ".$_GET['exam']." Notları</h4>
                    <form class='forms-sample' method='GET' action='updatenote'>
                    <button type='submit' class='btn btn-primary me-2'>Güncelle</button>
                    <div class='table-container'>
                    <br>
                    <div class='input-group mb-3'>
                        <span class='input-group-text' id='searchIcon'><i class='mdi mdi-magnify'></i></span>
                        <input type='text' id='searchInput' class='form-control' placeholder='Öğrenci Numarası ile ara' aria-label='Öğrenci Numarası ile ara' aria-describedby='searchIcon'>
                    </div>
                    <br>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          <th> ÖĞRENCİ NUMARASI </th>
                          <th> AD SOYAD </th>
                          <th> NOT </th>
                        </tr>
                      </thead>
                      <tbody>";
                        
                      $sql = "SELECT id,lesson_code,course_name FROM lessons";
                      $result = $conn->query($sql);
                      $temp=0;
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {

                                if($row['course_name'] == $_GET['lesson'])
                                {
                                    $sql1 = "SELECT id,student_id,visa_exam,final_exam,make_up_exam,homework_exam,project_exam,practice_exam,quiz_exam FROM lesson_registration WHERE academician_name=".$_GET['id']." and lesson_id=".$row['id']."";
                                    $result1 = $conn->query($sql1);
                                    
                                    if($result1->num_rows > 0)
                                    {
                                        while($row1 = $result1->fetch_assoc()) 
                                        {
                                            
                                            $sql2 = "SELECT name,lastname,student_number FROM login_student WHERE id=".$row1['student_id']."";
                                            $result2 = $conn->query($sql2);
                                            
                                            if($result2->num_rows > 0)
                                            {
                                                while($row2 = $result2->fetch_assoc()) 
                                                {
                                                    $temp++;
                                                    echo "<tr>
                                                    <td>";
                                                        echo $row2["student_number"];
                                                    echo "</td>
                                                    <td>"; 
                                                        echo $row2["name"]." ".$row2['lastname'];
                                                    echo "</td>
                                                    <td>"; 
                                                    if("Vize" == $_GET['exam'])
                                                    {
                                                        echo "<input type='text' class='form-control custom-input' name='visa_".$row1['id']."' value='".$row1["visa_exam"]."'>";
                                                    }
                                                    else if("Final" == $_GET['exam'])
                                                    {
                                                        echo "<input type='text' class='form-control custom-input' name='final_".$row1['id']."' value='".$row1["final_exam"]."'>";
                                                    }
                                                    else if("Bütünleme" == $_GET['exam'])
                                                    {
                                                        echo "<input type='text' class='form-control custom-input' name='make_up_".$row1['id']."' value='".$row1["make_up_exam"]."'>";
                                                    }
                                                    else if("Ödev" == $_GET['exam'])
                                                    {
                                                        echo "<input type='text' class='form-control custom-input' name='homework_".$row1['id']."' value='".$row1["homework_exam"]."'>";
                                                    }
                                                    else if("Proje" == $_GET['exam'])
                                                    {
                                                        echo "<input type='text' class='form-control custom-input' name='project_".$row1['id']."' value='".$row1["project_exam"]."'>";
                                                    }
                                                    else if("Uygulama" == $_GET['exam'])
                                                    {
                                                        echo "<input type='text' class='form-control custom-input' name='practice_".$row1['id']."' value='".$row1["practice_exam"]."'>";
                                                    }
                                                    else if("Quiz" == $_GET['exam'])
                                                    {
                                                        echo "<input type='text' class='form-control custom-input' name='quiz_".$row1['id']."' value='".$row1["quiz_exam"]."'>";
                                                    }
                                                    echo "</td>
                                                </tr>";
                                                }
                                            }
                                        }
                                    }


                                    
                                }
                            
                            }
                        }
                        
                      echo "</tbody>
                    </table>
                    </div>
                    <input type='hidden' name='temp' value='".$temp."'>
                    <input type='hidden' name='id' value='".$_GET["id"]."'>
                    <input type='hidden' name='sc' value='".$_GET["sc"]."'>
                    <input type='hidden' name='lesson' value='".$_GET["lesson"]."'>
                    <input type='hidden' name='exam' value='".$_GET["exam"]."'>
                    </form>";
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
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        searchInput.addEventListener("input", function () {
            const filter = searchInput.value.toUpperCase();
            const tbody = document.querySelector("table tbody");
            const rows = tbody.getElementsByTagName("tr");
            for (let i = 0; i < rows.length; i++) {
                const studentNumber = rows[i].getElementsByTagName("td")[0].textContent.toUpperCase();
                if (studentNumber.includes(filter)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        });
    });
</script>
  </body>
</html>