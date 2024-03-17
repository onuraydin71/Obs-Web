<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ders Programı</title>
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

            <div class="page-header">
                <h3 class="page-title"> Ders Programı </h3>
            </div>
          <div class="row">
            
          <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pazartesi </h4>

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
                    $tempmonday = 0;
                    $id = $_GET['id'];

                    $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE academician_name='$id' and day_name='monday'";
                    $result = $conn->query($sql);
                    echo "<table class='table table-striped'>
                      <thead>
                        <tr>
                          <th> Saat </th>
                          <th> Ders Adı </th>
                          <th> Derslik </th>
                          <th> Öğretim Elemanı </th>
                        </tr>
                      </thead>
                      <tbody>";
                        
                      $lessonidlist = array();
                      $tempid= 0;
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {

                                $sql1 = "SELECT course_name,start_time,lesson_code FROM lessons WHERE id=".$row['lesson_id']."";
                                $result1 = $conn->query($sql1);
                                if($result1->num_rows > 0)
                                {
                                while($row1 = $result1->fetch_assoc()) 
                                    {
                                        $sql2 = "SELECT name,lastname FROM login_academician WHERE id=".$row['academician_name']."";
                                        $result2 = $conn->query($sql2);
                                        if($result2->num_rows > 0)
                                        {
                                        while($row2 = $result2->fetch_assoc()) 
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
                                                echo "<tr>
                                                <td>";
                                                    echo $row1["start_time"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row1["course_name"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row1["lesson_code"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row2["name"].$row2["lastname"];
                                                echo "</td>
                                                </tr>";
                                              }

                                              $tempid= 0;
                                              $lessonidlist[] = $row['lesson_id'];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        else
                        {
                            $tempmonday=1;
                        }
                        
                      echo "</tbody>
                    </table>";
                    if($tempmonday == 1)
                    {
                        echo "Tanımlı Ders Programı Bulunamadı.";
                    }
                    ?>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Salı </h4>

                    <?php
                    $temptuesday = 0;
                    $id = $_GET['id'];


                    $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE academician_name='$id' and day_name='tuesday'";
                    $result = $conn->query($sql);
                    echo "<table class='table table-striped'>
                      <thead>
                        <tr>
                          <th> Saat </th>
                          <th> Ders Adı </th>
                          <th> Derslik </th>
                          <th> Öğretim Elemanı </th>
                        </tr>
                      </thead>
                      <tbody>";
                        
                      $lessonidlist = array();
                      $tempid= 0;
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {

                                $sql1 = "SELECT course_name,start_time,lesson_code FROM lessons WHERE id=".$row['lesson_id']."";
                                $result1 = $conn->query($sql1);
                                if($result1->num_rows > 0)
                                {
                                while($row1 = $result1->fetch_assoc()) 
                                    {
                                        $sql2 = "SELECT name,lastname FROM login_academician WHERE id=".$row['academician_name']."";
                                        $result2 = $conn->query($sql2);
                                        if($result2->num_rows > 0)
                                        {
                                        while($row2 = $result2->fetch_assoc()) 
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
                                                echo "<tr>
                                                <td>";
                                                    echo $row1["start_time"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row1["course_name"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row1["lesson_code"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row2["name"].$row2["lastname"];
                                                echo "</td>
                                                </tr>";
                                              }

                                              $tempid= 0;
                                              $lessonidlist[] = $row['lesson_id'];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        else
                        {
                            $temptuesday=1;
                        }
                        
                      echo "</tbody>
                    </table>";
                    if($temptuesday == 1)
                    {
                        echo "Tanımlı Ders Programı Bulunamadı.";
                    }
                    ?>
                  </div>
                </div>
              </div>
          </div>
        
          <div class="row">
          <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Çarşamba </h4>

                    <?php
                    $tempwednesday = 0;
                    $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE academician_name='$id' and day_name='wednesday'";
                    $result = $conn->query($sql);
                    echo "<table class='table table-striped'>
                      <thead>
                        <tr>
                          <th> Saat </th>
                          <th> Ders Adı </th>
                          <th> Derslik </th>
                          <th> Öğretim Elemanı </th>
                        </tr>
                      </thead>
                      <tbody>";
                        
                      $lessonidlist = array();
                      $tempid= 0;
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {

                                $sql1 = "SELECT course_name,start_time,lesson_code FROM lessons WHERE id=".$row['lesson_id']."";
                                $result1 = $conn->query($sql1);
                                if($result1->num_rows > 0)
                                {
                                while($row1 = $result1->fetch_assoc()) 
                                    {
                                        $sql2 = "SELECT name,lastname FROM login_academician WHERE id=".$row['academician_name']."";
                                        $result2 = $conn->query($sql2);
                                        if($result2->num_rows > 0)
                                        {
                                        while($row2 = $result2->fetch_assoc()) 
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
                                                echo "<tr>
                                                <td>";
                                                    echo $row1["start_time"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row1["course_name"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row1["lesson_code"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row2["name"].$row2["lastname"];
                                                echo "</td>
                                                </tr>";
                                              }

                                              $tempid= 0;
                                              $lessonidlist[] = $row['lesson_id'];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        else
                        {
                            $tempwednesday=1;
                        }
                        
                      echo "</tbody>
                    </table>";
                    if($tempwednesday == 1)
                    {
                        echo "Tanımlı Ders Programı Bulunamadı.";
                    }
                    ?>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Perşembe </h4>

                    <?php
                    $tempthursday = 0;
                    $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE academician_name='$id' and day_name='thursday'";
                    $result = $conn->query($sql);
                    echo "<table class='table table-striped'>
                      <thead>
                        <tr>
                          <th> Saat </th>
                          <th> Ders Adı </th>
                          <th> Derslik </th>
                          <th> Öğretim Elemanı </th>
                        </tr>
                      </thead>
                      <tbody>";
                        
                      $lessonidlist = array();
                      $tempid= 0;
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {

                                $sql1 = "SELECT course_name,start_time,lesson_code FROM lessons WHERE id=".$row['lesson_id']."";
                                $result1 = $conn->query($sql1);
                                if($result1->num_rows > 0)
                                {
                                while($row1 = $result1->fetch_assoc()) 
                                    {
                                        $sql2 = "SELECT name,lastname FROM login_academician WHERE id=".$row['academician_name']."";
                                        $result2 = $conn->query($sql2);
                                        if($result2->num_rows > 0)
                                        {
                                        while($row2 = $result2->fetch_assoc()) 
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
                                                echo "<tr>
                                                <td>";
                                                    echo $row1["start_time"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row1["course_name"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row1["lesson_code"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row2["name"].$row2["lastname"];
                                                echo "</td>
                                                </tr>";
                                              }

                                              $tempid= 0;
                                              $lessonidlist[] = $row['lesson_id'];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        else
                        {
                            $tempthursday=1;
                        }
                        
                      echo "</tbody>
                    </table>";
                    if($tempthursday == 1)
                    {
                        echo "Tanımlı Ders Programı Bulunamadı.";
                    }
                    ?>
                  </div>
                </div>
              </div>
          </div>

          <div class="row">
          <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Cuma </h4>

                    <?php
                    $tempfriday = 0;
                    $sql = "SELECT lesson_id,academician_name FROM lesson_registration WHERE academician_name='$id' and day_name='friday'";
                    $result = $conn->query($sql);
                    echo "<table class='table table-striped'>
                      <thead>
                        <tr>
                          <th> Saat </th>
                          <th> Ders Adı </th>
                          <th> Derslik </th>
                          <th> Öğretim Elemanı </th>
                        </tr>
                      </thead>
                      <tbody>";
                        
                      $lessonidlist = array();
                      $tempid= 0;
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc()) {

                                $sql1 = "SELECT course_name,start_time,lesson_code FROM lessons WHERE id=".$row['lesson_id']."";
                                $result1 = $conn->query($sql1);
                                if($result1->num_rows > 0)
                                {
                                while($row1 = $result1->fetch_assoc()) 
                                    {
                                        $sql2 = "SELECT name,lastname FROM login_academician WHERE id=".$row['academician_name']."";
                                        $result2 = $conn->query($sql2);
                                        if($result2->num_rows > 0)
                                        {
                                        while($row2 = $result2->fetch_assoc()) 
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
                                                echo "<tr>
                                                <td>";
                                                    echo $row1["start_time"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row1["course_name"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row1["lesson_code"];
                                                echo "</td>
                                                <td>"; 
                                                    echo $row2["name"].$row2["lastname"];
                                                echo "</td>
                                                </tr>";
                                              }

                                              $tempid= 0;
                                              $lessonidlist[] = $row['lesson_id'];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        else
                        {
                            $tempfriday=1;
                        }
                        
                      echo "</tbody>
                    </table>";
                    if($tempfriday == 1)
                    {
                        echo "Tanımlı Ders Programı Bulunamadı.";
                    }
                    ?>
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