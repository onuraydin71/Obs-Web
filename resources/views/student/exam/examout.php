<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sınav Bitti</title>
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
  .center-content {
    text-align: center;
    margin-top: 200px; 
  }
  .bold-text {
    font-weight: bold;
    font-size: 30px; 
  }
</style>
    <script>
        function geriSay() {
        var sayac = 10;
        var gerisayim = document.getElementById("countdown");

        var gerisayimAraci = setInterval(function() {
            gerisayim.innerHTML = sayac;
            sayac--;

            if (sayac < 0) {
            clearInterval(gerisayimAraci);
            gerisayim.innerHTML = "Yönlendirme Başarılı";

            setTimeout(function() {
            window.location.href = "http://localhost:8000/student/exam/examlist?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>";
            }, 1000);
            }
        }, 1000);
        }

        window.onload = function() {
        geriSay();
        };
    </script>
  </head>
  <body>
        <?php require_once 'menubar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="center-content">
                  <h4 class="card-title bold-text">Sınavınız Bitti. Ana Sayfaya Yönlendiriliyorsunuz. Lütfen Bekleyiniz...</h4>
               <div class="card-title bold-text" id="countdown"></div>
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