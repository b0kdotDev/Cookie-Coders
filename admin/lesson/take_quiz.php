<?php
// Include the database connection code
include 'db_connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Take Quiz</title>
    <style>
        /* Your CSS styling here */
    </style>
</head>
<body>
<h1>Take Quiz</h1>

<?php
// Get the lesson ID from the URL parameter
if (isset($_GET['lesson_id'])) {
    $lessonId = $_GET['lesson_id'];

    // Fetch the corresponding quiz from the database based on lesson_id
    $stmt = $pdo->prepare("SELECT * FROM quizzes WHERE lesson_id = :lesson_id");
    $stmt->bindParam(':lesson_id', $lessonId);
    $stmt->execute();
    $quiz = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($quiz) {
        echo '<div class="quiz">';
        echo '<h2>Quiz: ' . $quiz['title'] . '</h2>';
        // Add quiz questions and form inputs here
        echo '</div>';
    } else {
        echo 'Quiz not found for this lesson.';
    }
} else {
    echo 'Lesson ID not provided.';
}
?>
</body>
</html>
