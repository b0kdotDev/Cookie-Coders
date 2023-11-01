<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Lesson</title>
    <style>
        .lesson-content {
            border: 2px solid blue;
            height: 60vh;
            width: 60vw;
            padding: 10px;
            overflow: auto;
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        .next-button, .complete-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        a{
            text-decoration: none;
        }

        .next-button:hover, .complete-button:hover {
            background-color: #0056b3;
        }
        
        .contents{
            display: flex;
        }
        .compiler{
            width: 100%;
        }
    </style>
</head>
<body>
<?php
// Replace these with your actual database connection details
$host = "localhost";
$dbname = "ckeditor";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get the lesson ID from the parameter
$lessonId = $_GET['id'];

// Fetch lesson title
$stmt = $pdo->prepare("SELECT title FROM lessons WHERE id = ?");
$stmt->execute([$lessonId]);
$lessonTitle = $stmt->fetchColumn();

// Fetch lesson pages
$pagesStmt = $pdo->prepare("SELECT * FROM pages WHERE lesson_id = ? ORDER BY page_number");
$pagesStmt->execute([$lessonId]);
$pages = $pagesStmt->fetchAll(PDO::FETCH_ASSOC);

// Get the current page number from the query parameter
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$total_pages = count($pages);


echo '<div class="lesson">';
echo '<h1>' . $lessonTitle . '</h1>';
echo '<p>Page ' . $current_page . '</p>';
echo '<div class="lesson-content">' . $pages[$current_page - 1]['content'] . '</div>';

echo '<div class="button-container">';
if ($current_page < $total_pages) {
    echo '<a class="next-button" href="view_lesson.php?id=' . $lessonId . '&page=' . ($current_page + 1) . '">Next</a>';
} else {
    echo '<a class="complete-button" href="viewlesson.php">Complete</a>';
}
echo '</div>';

echo '</div>';
?>
</body>
</html>
