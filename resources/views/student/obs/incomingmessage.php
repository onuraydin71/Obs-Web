
<?php require_once 'checkedmessage.php'; ?>
<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gelen Mesajlar</title>
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

.summary {
  background-color: #3498db;
  color: #fff;
  font-size: 20px;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.summary:hover {
  background-color: #2980b9;
}

.details {
  background-color: #ffffff;
  color: #2c3e50;
  font-size: 16px;
  border-radius: 5px;
  padding: 10px;
  margin-top: 10px;
}

/* Ok simgesini sağa almak için */
summary::-webkit-details-marker {
  display: none;
}

.summary::before {
  content: "\25B6"; /* Başlangıçta sağa bakacak ok */
  float: right; /* Oku sağa yasla */
  margin-left: 5px; /* Ok ile metin arasında boşluk bırak */
  transition: transform 0.3s ease; /* Dönüşümü yumuşak yapmak için */
}

/* Açık olduğunda oku tersine çevir */
details[open] summary::before {
  transform: rotate(90deg);
}

/* Liste simgesini kaldır */
summary {
  list-style-type: none;
  padding-left: 0;
}


</style>
<script>
    function myFunction(sid) {
        window.location.href = "http://localhost:8000/student/obs/addmessage?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>&sid="+sid+"";
    }
</script>
  </head>
  <body>
        <?php require_once 'menubar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <h3 class="page-title"> GELEN MESAJLAR </h3>

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
                
                            $sql = "SELECT sender_id,subject,date,message FROM message WHERE recipient_id=".$_GET['id']." ORDER BY id DESC";
							$result = $conn->query($sql);
                           
                            if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc()) 
                                    {
                                        $sql1 = "SELECT student_number,name,lastname FROM login_student WHERE id=".$row['sender_id']."";
                                        $result1 = $conn->query($sql1);
                                        if($result1->num_rows > 0)
                                        {
                                            while($row1 = $result1->fetch_assoc()) 
                                            {
                                                echo "<div class='details-container'>
                                                    <details> ";
                                                    echo "<summary class='summary'><b>".$row['subject']." </b><p class='mb-0'>Gönderen: ".$row1['name']." ".$row1['lastname']." / ".$row['date']."</p></summary> 
                                                    <div class='details'>";
                                                        echo "<p>".$row['message']."</p> 
                                                        <div style='text-align: right;'>
                                                        <button type='button' class='btn btn-primary' onclick='myFunction(".$row1['student_number'].")';' >Yanıtla</button>
                                                    </div>

                                                    </div>
                                                    </details>
                                                </div>";
                                            }
                                        }

                                    }
                                }
           
           


                                ?>

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