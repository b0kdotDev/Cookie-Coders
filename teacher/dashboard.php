<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
include('../admin/lesson/db_connection.php')

// if (empty($_SESSION['teachid'])) {
//     header('location: logout.php');
// } else {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HardTech|||Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   
  </head>

  <style>
        body {
            font-family: Arial, sans-serif;
        }

        .lesson {
            display: inline-block;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            width: 40%;
        }

        .lesson h2 {
            margin: 0;
        }

        a{
            text-decoration: none;
        }

        .view-button {
            display: block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .view-button:hover {
            background-color: #0056b3;
        }
    </style>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">

          <!-- <div class="content-wrapper">
            <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">
                <div class="card card-secondary">
                  <span class="card-body d-lg-flex align-items-center">
                    <p class="mb-lg-0">Check Lessons! </p>
                    <a href="view-lessons.php" target="_blank" class="btn btn-warning purchase-button btn-sm my-1 my-sm-0 ml-auto">View Lessons</a>
                  
                  </span>
                </div>
              </div>
            </div> -->

            <!-- CONTENTS SECTION -->

            <?php
            // Fetch lessons from the database
            $stmt = $pdo->query("SELECT * FROM tbllesson");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lessonId = $row['LessonID'];
                $lessonTitle = $row['title'];

                echo '<div class="lesson">';
                echo '<h2>' . $lessonTitle . '</h2>';
                echo '<a class="view-button" href="../admin/lesson/view_lesson.php?id=' . $lessonId . '">View Lesson</a>';
                echo '<a class="take-quiz-button" href="take_quiz.php?lesson_id=' . $lessonId . '">Take Quiz</a>';
                echo '</div>';
            }
            ?>





          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>