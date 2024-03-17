<div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../mainmenu?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>"><img src="" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../mainmenu?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-xl-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <i class="mdi mdi-account-circle ms-1"></i>
                </div>
                <div class="nav-profile-text">

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
                                      
                                      $sql = "SELECT name,lastname FROM login_student where id=$id";
                                      $result = $conn->query($sql);
                                                  
                                                    if($result->num_rows > 0)
                                                    {
                                                        while($row = $result->fetch_assoc()) {
                                                          echo "<p class='mb-1 text-black'>".$row['name']." ".$row['lastname']."</p>";
                                                        }
                                                    }

                            ?>
                  
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                <div class="p-3 text-center bg-primary">
                </div>
                <div class="p-2">
                  <h5 class="dropdown-header text-uppercase ps-2 text-dark">Kullanıcı Ayarları</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="http://localhost:8000/student/obs/info?id=<?php echo $_GET['id'] ?>&sc=<?php echo $_GET['sc']?>">
                    <span>Profil</span>
                      <i class="mdi mdi-account-circle ms-1"></i>
                    </span>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="http://localhost:8000/student/login">
                    <span>Çıkış Yap</span>
                    <i class="mdi mdi-logout ms-1"></i>
                  </a>
              </div>
            </li>
            <?php 
            echo "
            <li class='nav-item dropdown'>
              <a class='nav-link count-indicator dropdown-toggle' id='messageDropdown' href='#' data-bs-toggle='dropdown' aria-expanded='false'>
                <i class='mdi mdi-email-outline'></i>";
                
                $count = 0;
                $sql = "SELECT checked FROM message WHERE recipient_id=".$_GET['id']." ORDER BY id DESC";
                $result = $conn->query($sql);
                             
                              if($result->num_rows > 0)
                                  {
                                      while($row = $result->fetch_assoc()) 
                                      {
                                          if($row['checked'] != "true")
                                          {
                                            $count++;
                                          }
                                      }
                                  }
                if($count != 0)
                {
                  echo "<span class='count-symbol bg-success'></span>";
                }
                
              echo "</a>
              <div class='dropdown-menu dropdown-menu-end navbar-dropdown preview-list' aria-labelledby='messageDropdown'>
                <h6 class='p-3 mb-0 bg-primary text-white py-4'>Yeni Gelen Mesajlar</h6>";
                $temp= 0;
                $sql = "SELECT sender_id,checked,subject FROM message WHERE recipient_id=".$_GET['id']." ORDER BY id DESC";
                $result = $conn->query($sql);
                             
                              if($result->num_rows > 0)
                                  {
                                      while($row = $result->fetch_assoc()) 
                                      {
                                          if($row['checked'] != "true")
                                          {
                                            $sql1 = "SELECT student_number,name,lastname FROM login_student WHERE id=".$row['sender_id']."";
                                            $result1 = $conn->query($sql1);
                                            if($result1->num_rows > 0)
                                            {
                                                while($row1 = $result1->fetch_assoc()) 
                                                {
                                                  echo "
                                                  <a class='dropdown-item py-1 d-flex align-items-center justify-content-between' href='http://localhost:8000/student/obs/incomingmessage?id=".$_GET['id']."&sc=".$_GET['sc']."'>
                                                    <span>Konu: ".$row['subject']."<br>Gönderen: ".$row1['name']." ".$row1['lastname']."</span>
                                                      <i class='mdi mdi-message-processing ms-1'></i>
                                                    </span>
                                                  </a>";
                                                }
                                            }
                                            $temp=1;
                                          }
                                      }
                                  }
                         if($temp == 0)
                         {
                          echo "
                               <a class='dropdown-item py-1 d-flex align-items-center justify-content-between'>
                                <span>Mesaj Yok.</span>
                                </span>
                                </a>";
                         }         
              echo "</div>
            </li>";
            ?>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">OBS</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Genel İşlemler</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../obs/academiccalendar?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">Akademik Takvim</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../obs/syllabus?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">Ders Programı</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../obs/examcalendar?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">Sınav Takvimi</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#lesson" aria-expanded="false" aria-controls="lesson">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Ders İşlemleri</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="lesson">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../obs/notelist?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">Not Listesi</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../obs/attendancelist?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">Devamsızlık Bilgisi</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Kullanıcı İşlemleri</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="user">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../obs/sentmessage?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">Gönderilen Mesajlar</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../obs/incomingmessage?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">Gelen Mesajlar</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../obs/addmessage?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">Mesaj Gönder</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../obs/changepassword?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">Şifre Değiştir</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../obs/info?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">Bilgilerim</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category">YOKLAMA SİSTEMİ</li>
            <li class="nav-item">
              <a class="nav-link" href="../attendance/lessonlist?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">
                <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                <span class="menu-title">Yoklama Listesi</span>
              </a>
            </li>
            <li class="nav-item nav-category">SINAV SİSTEMİ</li>
            <li class="nav-item">
              <a class="nav-link" href="../exam/examlist?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>">
                <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                <span class="menu-title">Sınavlarım</span>
              </a>
            </li>
          </ul>
        </nav>