<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HardTech|| View Lessons</title>
    
  </head>
  <body>
   
 <!-- CONTENTS SECTION -->

 <?php
            // Fetch lessons from the database
            $stmt = $pdo->query("SELECT * FROM tbllesson");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lessonId = $row['LessonID'];
                $lessonTitle = $row['title'];

                echo '<div class="lesson">';
                echo '<h2>' . $lessonTitle . '</h2>';
                echo '<a class="view-button" href="view_lesson.php?id=' . $lessonId . '">View Lesson</a>';
                echo '<a class="take-quiz-button" href="take_quiz.php?lesson_id=' . $lessonId . '">Take Quiz</a>';
                echo '</div>';
            }
            ?>


  </body>
</html>