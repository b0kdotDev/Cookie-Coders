<?php include_once('includes/header.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>HardTech</title>
        <link rel="stylesheet" href=".//node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="stylesheets/login.css">
    </head>
    <body>
            <div class="login-page">
            <i class="bi bi-x form_close"></i>
        <div class="form">
            <form action="login_check.php" method="POST">
                <h2>Login</h2>
                <h4>
                </h4>
                <div class="input_box">
                    <input type="text" placeholder="Username" name="username" required/>
                    <i class="bi bi-envelope email"></i>
                </div>
                <div class="input_box">
                    <input type="password" placeholder="Enter your password"name="password" required class="password" />
                      <i class="bi bi-lock password"></i>
                </div>

                <button class="btn_lgn">LOGIN</button>
            </form>

        </div>
        </div>
</body>
</html>