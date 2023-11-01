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
$stmt = $pdo->query("SELECT * FROM lessons");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $lessonId = $row['id'];
    $lessonTitle = $row['title'];

    echo '<div class="lesson">';
    echo '<h2>' . $lessonTitle . '</h2>';
    echo '<a class="view-button" href="view_lesson.php?id=' . $lessonId . '">View Lesson</a>';
    echo '</div>';
}
?>
</body>
</html>