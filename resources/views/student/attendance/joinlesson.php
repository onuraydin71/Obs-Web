<?php require_once 'checkpage.php'; ?>
<?php
$start_time = date('Y-m-d H:i:s');
?>
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
        function showMessageGreen() {
            alert("Yoklamaya Katıldın!");
        }
        function showMessageRed() {
            alert("Yoklamaya Katılamadın!");
        }
        </script>   
   <script>
window.onload = function() {
    var end_time = " <?php
                    $servername = "localhost";

                    $dbusername = "root";

                    $dbpassword = "";

                    $dbname = "app_database";


                    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

                    

                    if ($conn->connect_error) {

                        die("Connection failed: " . $conn->connect_error);

                    } 

                    $sql = "SELECT course_name,end_time FROM lessons WHERE id=".$_GET['lid']."";
                    $result = $conn->query($sql);


                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc()) 
                        {
                            echo $row['end_time'];
                        }
                    } ?>";

                    
                    

    geriSay(end_time);
};

function geriSay(bitisZamani) {
  
    var bitisZamaniDate = new Date(bitisZamani);
    
   
    var geriSayim = setInterval(function() {
    
        var start_time = new Date();
start_time.setHours(start_time.getHours() - 3);
        var bitisZamani1 = new Date(start_time);
    
        var fark = bitisZamaniDate -bitisZamani1;

        if (fark > 0) {
           
            var dakika = Math.floor(fark / (1000 * 60));
            var saniye = Math.floor((fark % (1000 * 60)) / 1000);
            document.getElementById("geriSayim").innerHTML = "Kalan Zaman: " + dakika + " dakika " + saniye + " saniye ";
        } else {
            
            clearInterval(geriSayim); 
            document.getElementById("geriSayim").innerHTML = "Geri sayım tamamlandı!";
        }
      
    }, 1000); 
}
</script>
  </head>
  <body>
        <?php require_once 'menubar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="row">
            
          <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php
					if(isset($_GET['temp']))
					{
                        if($_GET['temp'] == "0")
                        {
                            echo"
                            <div class='alert alert-danger'>
                            <strong>Yanlış!</strong> Hatalı Kod .
                          </div>
                            ";
                        }
                        if($_GET['temp'] == "1")
                        {
                            echo"
                            <div class='alert alert-danger'>
                            <strong>Hata!</strong> Süre Doldu .
                          </div>
                            ";
                        }
						
					};
					
					?>
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

                    $sql = "SELECT course_name,end_time FROM lessons WHERE id=".$_GET['lid']."";
                    $result = $conn->query($sql);


                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc()) 
                        {
                            echo "<h4 class='card-title'>".$row['course_name']." / ".$_GET['wid'].".Hafta</h4>";
                        }
                    }
                    ?>

                    
<h6><p id='geriSayim'></p></h6>
                        
                        <form class="forms-sample"  method='GET' action='dbattendance'>
                        <div class="form-group">
                        <label for='exampleInputUsername1'>Kod</label>
                            <input type="text" class="form-control" name="code" id="exampleInputPassword2" placeholder="Yoklama Kodu Gir">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                        <input type="hidden" name="sc" value="<?php echo $_GET["sc"]?>">
                        <input type="hidden" name="lid" value="<?php echo $_GET["lid"]?>">
                        <input type="hidden" name="wid" value="<?php echo $_GET["wid"]?>">
                        <button type="submit" class="btn btn-primary me-2">Yoklamaya Katıl</button>
                        </form>


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