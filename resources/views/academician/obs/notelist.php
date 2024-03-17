<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NOTLARI LİSTELE</title>
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
        .lessoncontainer{
            padding-bottom: 20px;
        }
        .dropdown-divider {
        margin-bottom: 20px; /* veya istediğiniz değeri kullanabilirsiniz */
        }

    </style>
    <script>
      var selectedLesson = "";
      var selectedExam = "";

      function setLesson(lesson) {
        selectedLesson = lesson;
        document.querySelector('#lessonDropdown').innerHTML = lesson;
      }

      function setExam(exam) {
        selectedExam = exam;
        document.querySelector('#examDropdown').innerHTML = exam;
      }
      function redirectToListePage() {
        if (!selectedLesson || !selectedExam) 
        {
          alert("Lütfen Ders Adı veya Sınav Türü Seçin.");
          return; 
        }
      var lesson = encodeURIComponent(selectedLesson);
      var exam = encodeURIComponent(selectedExam);
      var url = "studentnotelist?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>&lesson=" + lesson + "&exam=" + exam;
      window.location.href = url;
    }
    </script>
    
  </head>
  <body>
        <?php require_once 'menubar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


          <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">ÖĞRENCİ NOTLARINI LİSTELE</h4>

                    <div class="dropdown lessoncontainer">
                      <span class="text-dark">Ders Adı:</span>
                      <button class="btn btn-outline-primary dropdown-toggle" type="button" id="lessonDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Ders </button>
                      <div class="dropdown-menu" aria-labelledby="lessonDropdown">

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
                    $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE academician_name='$id'";
                    $result = $conn->query($sql);

                    $lessonidlist = array();
                    $tempid= 0;
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) 
                            {
                                $sql1 = "SELECT course_name FROM lessons WHERE id=".$row['lesson_id']."";
                                $result1 = $conn->query($sql1);
                                if($result1->num_rows > 0)
                                {
                                  while($row1 = $result1->fetch_assoc()) 
                                    {
                                      foreach ($lessonidlist as $datalist) 
                                      {
                                        if($datalist == $row['lesson_id'])
                                        {
                                          $tempid = 1;
                                        }
                                      }

                                      if($tempid != 1)
                                      {   
                                        echo"
                                        <a class='dropdown-item' href='#' onclick=\"setLesson('" . $row1['course_name'] . "')\">" . $row1['course_name'] . "</a>
                                        ";
                                      }

                                      $tempid= 0;
                                      $lessonidlist[] = $row['lesson_id'];
                                    }
                                }
                              }
                         }
                    

                    ?>

                    
                        
                      </div>
                    </div>

                    <div class="dropdown-divider"></div>

                    <div class="dropdown">
                      <span class="text-dark">Sınav Türü:</span>
                      <button class="btn btn-outline-primary dropdown-toggle" type="button" id="examDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sınav Türü </button>
                      <div class="dropdown-menu" aria-labelledby="examDropdown">
                        <a class="dropdown-item" href="#" onclick="setExam('Vize')">Vize</a>
                        <a class="dropdown-item" href="#" onclick="setExam('Final')">Final</a>
                        <a class="dropdown-item" href="#" onclick="setExam('Bütünleme')">Bütünleme</a>
                        <a class="dropdown-item" href="#" onclick="setExam('Ödev')">Ödev</a>
                        <a class="dropdown-item" href="#" onclick="setExam('Proje')">Proje</a>
                        <a class="dropdown-item" href="#" onclick="setExam('Uygulama')">Uygulama</a>
                        <a class="dropdown-item" href="#" onclick="setExam('Quiz')">Quiz</a>
                      </div>
                    </div>

                      <br>
                      <div style="text-align: right;">
                          <button type="button" class="btn btn-primary" onclick="redirectToListePage()" >Listele</button>
                      </div>

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