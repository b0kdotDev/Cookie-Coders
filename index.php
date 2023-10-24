<?php
session_start();
error_reporting(E_ALL);
include('./includes/dbconnection.php');

if(isset($_POST['login'])) 
{
    $stuid = $_POST['teachid'];
    $password = md5($_POST['password']);

    $sql = "SELECT StuID, StudentID, StudentClass FROM tblstudent WHERE (UserName=:stuid || StuID=:stuid) and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':stuid', $stuid, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['sturecmsstuid'] = $result->StuID;
            $_SESSION['sturecmsuid'] = $result->StudentID;
            $_SESSION['stuclass'] = $result->StudentClass;
        }

        $_SESSION['login'] = $stuid;

        // Redirect to the appropriate page
        echo "<script>alert('Login Successful');</script>";
        echo "<script type='text/javascript'> document.location ='./student_home.php'; </script>";
    } else {
        // Debug: Print an "Invalid Details" message
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HardTech</title>
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <script src="./script.js" defer></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded ">menu</span>
            <a href="#" class="logo">
                <img src="./images/log" alt="logo">
                <h2>HardTech</h2>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about.php">About Us</a></li>
                <li><a href="./contact.php">Contact Us</a></li>
            </ul>
            <button class="login-btn">LOG IN</button>
        </nav>
    </header>
    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-details">
                <p>Please log in using your personal information to stay connected with us.</p>
            </div>
            <div class="form-content">
            <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h2>LOGIN</h2>
            <form class="pt-3" id="login" method="post" name="login">
                  <div class="input-field ">
                    <input type="text" class="form-control form-control-lg" placeholder="enter your student id or username" required="true" name="teachid" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" >
                  </div>
                  <div class="input-field ">
                    
                    <input type="password" class="form-control form-control-lg" placeholder="enter your password" name="password" required="true" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-success btn-block loginbtn" name="login" type="submit">Login</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
             
                  </div>
                  
                </form>
  </body>
</html>
</body>
</html>
