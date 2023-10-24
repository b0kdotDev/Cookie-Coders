<?php


// Database connection details
$host = "localhost";
$dbname = "codercookies_db";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if (isset($_POST['save'])) {
    $lessonTitle = $_POST['lessonTitle'];
    $contents = $_POST['content'];

    // Insert lesson title into the database
    $stmt = $pdo->prepare("INSERT INTO tbllesson (title) VALUES (?)");
    $stmt->execute([$lessonTitle]);
    $lessonId = $pdo->lastInsertId();

    // Insert contents and page numbers into the database
    foreach ($contents as $pageNumber => $content) {
        $page = $pageNumber + 1;
        $stmt = $pdo->prepare("INSERT INTO tblpages (lesson_id, content, page_number) VALUES (?, ?, ?)");
        $stmt->execute([$lessonId, $content, $page]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<style>
    .lessons{
        margin-left: 18%;
    }

</style>
<body>

    

            <!-- content area -->
            <div class="col py-3 bg-light" id="m-contents">

                <div class="lessons">

                    <h1>Add Lesson to Hadrtech</h1>
                    <form method="post">
                        <label for="lessonTitle">Lesson Title</label> <br>
                        <textarea name="lessonTitle" id="lessonTitle" cols="106" rows="2"></textarea> <br>

                        <div id="pageContainer">
                            <div class="page">
                                <label>Content</label> <br>
                                <textarea class="content" name="content[]" rows="5" cols="80"></textarea>
                                <p class="pageIndicator">Page 1</p>
                            </div>
                        </div>
                        <button type="button" id="addPage" class="btn btn-primary">Add Page</button>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                    </form>

                </div>

            </div>



    <!-- JS setup for CKEditor -->
    <script>
       
    CKEDITOR.replace('content[]', {
        height: 450,
        width: 800,
        filebrowserUploadUrl: "upload.php"
    });

    const addPageButton = document.getElementById('addPage');
    const pageContainer = document.getElementById('pageContainer');
    let pageNumber = 2;

    addPageButton.addEventListener('click', () => {
        const newPage = document.createElement('div');
        newPage.className = 'page';
        newPage.innerHTML = `
            <label>Content</label> <br>
            <textarea class="content" name="content[]" rows="5" cols="80"></textarea>
            <p class="pageIndicator">Page ${pageNumber}</p>
        `;
        pageContainer.appendChild(newPage);
        CKEDITOR.replace(newPage.querySelector('.content'), {
            height: 450,
            width: 800,
            filebrowserUploadUrl: "upload.php"
        });
        pageNumber++;
    });

    </script>
    
</body>
</html>