<?php require_once 'checkpage.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sınav Başladı</title>
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
        .colors {
            color: black;
            font-size: 20px;
        }
        #questions-container {
            float: left; 
            width: 60%;
            margin-right: 20%;
        }
        #navigation {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <script>
    function geriSay() {
        var sayac = document.getElementById("countdown").textContent;
        var gerisayim = document.getElementById("countdown");

        var gerisayimAraci = setInterval(function() {
            var saat = Math.floor(sayac / 3600);
        var dakika = Math.floor((sayac % 3600) / 60); 
        var saniye = sayac % 60;

        gerisayim.innerHTML = saat.toString().padStart(2, '0') + ":" + dakika.toString().padStart(2, '0') + ":" + saniye.toString().padStart(2, '0');
       
            sayac--;

            if (sayac < 0) {
            clearInterval(gerisayimAraci);
            gerisayim.innerHTML = "Süreniz Doldu.";

            setTimeout(function() {
                        var href = "http://localhost:8000/student/exam/examanswerrecord?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>&lcode=<?php echo $_GET['lcode']; ?>&totalQuestions=" + totalQuestions;
                        var answers = [];
                        var trueAnswers = [];
                        for (var i = 1; i <= totalQuestions; i++) {
                            var answerElement = document.querySelector('input[name="answer'+i+'"]:checked');
                            var trueAnswerElement = document.querySelector('input[name="ranswer'+i+'"]');
                            
                            if (answerElement !== null) {
                                var answer = answerElement.value;
                                answers.push(answer);
                            } else {
                                answers.push("");
                            }
                            
                            if (trueAnswerElement !== null) {
                                var trueAnswer = trueAnswerElement.value;
                                trueAnswers.push(trueAnswer);
                            } else {
                                trueAnswers.push("");
                            }
                        }

                        for (var i = 0; i < answers.length; i++) {
                            href += "&answer" + (i + 1) + "=" + answers[i];
                        }

                        for (var i = 0; i < trueAnswers.length; i++) {
                            href += "&trueanswer" + (i + 1) + "=" + trueAnswers[i];
                        }

                        window.location.href = href;
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
                            $lesson_code = $_GET['lcode'];
                            $temp = 1;
                            

                            echo "<div class='page-header'>"
                            ;
                            $sql = "SELECT course_name,exam_name,hour FROM exam_calendar WHERE id=".$lesson_code."";
                            $result = $conn->query($sql);
                                        
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc()) 
                                {
                                    echo "<h3 class='page-title'> ".$row['course_name']." - ".$row['exam_name']." Sınavı</h3>";
                                    echo "<h3 class='page-title' id='countdown'>".$row['hour']."</h3>";
                                    
                                }
                            }
                            echo "
                            </div>
                            <div class='col-lg-12 grid-margin stretch-card'>
                                <div class='card'>
                                <div class='card-body'>
                                
                            <div id='questions-container' >";


                            $sql = "SELECT lesson_code,exam_name FROM exam_calendar WHERE id=".$lesson_code."";
                            $result = $conn->query($sql);
                                        
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc()) 
                                {
                                    $sql1 = "SELECT course_id,exam_type,question,a,b,c,d,e,answer FROM exam_question";
                                    $result1 = $conn->query($sql1);
                                                
                                    if($result1->num_rows > 0)
                                    {
                                        while($row1 = $result1->fetch_assoc()) 
                                        {
                                            if($row1['course_id'] == $row['lesson_code'] && $row1['exam_type'] == $row['exam_name'])
                                            {
                                                echo"
                                                <div class='question colors' id='question".$temp."'>
                                                ".$temp."- ".$row1['question']."
                                                <form action='examout' method='GET'><br>
                                                    <input type='radio' name='answer".$temp."' value='a'> A) ".$row1['a']."<br>
                                                    <input type='radio' name='answer".$temp."' value='b'> B) ".$row1['b']."<br>
                                                    <input type='radio' name='answer".$temp."' value='c'> C) ".$row1['c']."<br>
                                                    <input type='radio' name='answer".$temp."' value='d'> D) ".$row1['d']."<br>
                                                    <input type='radio' name='answer".$temp."' value='e'> E) ".$row1['e']."<br>
                                                    <input type='hidden' name='ranswer".$temp."' value='".$row1['answer']."'>
                                                </form>
                                                </div>";

                                                $temp++;
                                            }
                                        }
                                    }
                                }
                            }

                            ?>

            
                            </div>

                           
</div>
<div id="navigation">
    <button class="btn btn-primary btn-fw" onclick="previousQuestion()">Önceki Soru</button>
    <button id="nextquestion" class="btn btn-primary btn-fw" onclick="nextQuestion()">Sonraki Soru</button>
<script>
    var currentQuestion = 1;
    var totalQuestions = document.querySelectorAll('.question').length;

    function showQuestion(questionNumber) {
        for (var i = 1; i <= totalQuestions; i++) {
            if (i === questionNumber) {
                document.getElementById('question' + i).style.display = 'block';
            } else {
                document.getElementById('question' + i).style.display = 'none';
            }
        }
    }
    function previousQuestion() {
    if (currentQuestion > 1) {
        currentQuestion--;
        showQuestion(currentQuestion);
        window.scrollTo(0,0); 
        var button = document.getElementById('nextquestion');
        button.innerHTML = 'Sonraki Soru';
        var newcolor = '#0062ff';
        button.style.backgroundColor = newcolor;
    }

    }
        function nextQuestion() {
            if (currentQuestion < totalQuestions) {
                currentQuestion++;
                showQuestion(currentQuestion);
                window.scrollTo(0,0); 
                if(currentQuestion == totalQuestions)
                {
                    var button = document.getElementById('nextquestion');
                    button.innerHTML = 'Sınavı Bitir';
                    button.style.backgroundColor = 'red';
                }
            }
            else
            {
                showAlert();
                function showAlert() {
                var result = confirm("Sınavı bitirmek mi istiyorsunuz?");
        
                    if (result) 
                    {
                        var href = "http://localhost:8000/student/exam/examanswerrecord?id=<?php echo $_GET['id']; ?>&sc=<?php echo $_GET['sc']; ?>&lcode=<?php echo $_GET['lcode']; ?>&totalQuestions=" + totalQuestions;
                        var answers = [];
                        var trueAnswers = [];
                        for (var i = 1; i <= totalQuestions; i++) {
                            var answerElement = document.querySelector('input[name="answer'+i+'"]:checked');
                            var trueAnswerElement = document.querySelector('input[name="ranswer'+i+'"]');
                            
                            if (answerElement !== null) {
                                var answer = answerElement.value;
                                answers.push(answer);
                            } else {
                                answers.push("");
                            }
                            
                            if (trueAnswerElement !== null) {
                                var trueAnswer = trueAnswerElement.value;
                                trueAnswers.push(trueAnswer);
                            } else {
                                trueAnswers.push("");
                            }
                        }

                        for (var i = 0; i < answers.length; i++) {
                            href += "&answer" + (i + 1) + "=" + answers[i];
                        }

                        for (var i = 0; i < trueAnswers.length; i++) {
                            href += "&trueanswer" + (i + 1) + "=" + trueAnswers[i];
                        }

                        window.location.href = href;
                    } 
                }
            }
        }

        showQuestion(currentQuestion);
    </script>
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