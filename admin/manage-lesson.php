<?php
session_start();
error_reporting(0);
// Include the database connection code
include './admin/lesson/db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HardTech|||Manage Lessons</title>

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
</head>
<body>
<h1>View Lessons</h1>
<?php
// Fetch lessons from the database
$stmt = $pdo->query("SELECT * FROM tbllesson");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $lessonId = $row['LessonID'];
    $lessonTitle = $row['title'];

    echo '<div class="lesson">';
    echo '<h2>' . $lessonTitle . '</h2>';
    echo '<a class="view-button" href="view_lesson.php?id=' . $lessonId . '">View Lesson</a>';
    echo '</div>';
}
?>
  </body>
</html>