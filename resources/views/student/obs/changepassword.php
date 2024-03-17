<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Şifre Değiştir</title>
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
          
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                    <?php
					if(isset($_GET['temp']))
					{
                        if($_GET['temp'] == 0)
                        {
                            echo"
						<div class='alert alert-danger'>
						<strong>Yanlış!</strong> Mevcut Şifre Hatalı.
					    </div>
						";
                        }
                        else if($_GET['temp'] == 1)
                        {
                            echo"
						<div class='alert alert-danger'>
						<strong>Yanlış!</strong> Yeni Şifre Eşleşme Hatası.
					    </div>
						";
                        }
                        else if($_GET['temp'] == 2)
                        {
                            echo"
						<div class='alert alert-success'>
						<strong>Başarılı!</strong> Şifreniz Değişti.
					    </div>
						";
                        }
						
					};
					
					?>
                        <h4 class="card-title"> Şifre Değiştir </h4>
                        <form class="forms-sample"  method='GET' action='updatechangepassword'>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Mevcut Şifre</label>
                            <div class="col-sm-9">
                            <input type="password" class="form-control" name="cpass" id="exampleInputPassword2" placeholder="Mevcut Şifre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Yeni Şifre</label>
                            <div class="col-sm-9">
                            <input type="password" class="form-control" name="npass" id="exampleInputPassword2" placeholder="Yeni Şifre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label"> Yeni Şifre (Tekrar) </label>
                            <div class="col-sm-9">
                            <input type="password" class="form-control" name="rpass" id="exampleInputConfirmPassword2" placeholder="Yeni Şifre (Tekrar)">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                        <input type="hidden" name="sc" value="<?php echo $_GET["sc"]?>">
                        <button type="submit" class="btn btn-primary me-2">Kaydet</button>
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
    <!-- End custom js for this page -->
  </body>
</html>