<?php
// Include the database connection code
include 'db_connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Lessons</title>
    <style>
        /* Your CSS styling here */
    </style>
</head>
<body>
<h1>View Lessons</h1>

<?php
// Fetch lessons from the database
$stmt = $pdo->query("SELECT * FROM lessons");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $lessonId = $row['id'];
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
