<?php
include './includes/dbconnection.php';
error_reporting(0);
session_start();
if($data===false)
{
    die("connection error");
}
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $name = $_POST['UserEmail'];

            $pass = $_POST['password'];

            $sql="Select * from users where username='".$name."' AND password='".$pass."' ";

            $result=mysqli_query($data,$sql);

            $row=mysqli_fetch_array($result);
            
            if ($row["usertype"] == "student"){
            
                $_SESSION['username']=$name;
                $_SESSION['usertype']="student";
                header("location: student/index.php");

            } elseif ($row["usertype"] == "admin") {

                $_SESSION['username']=$name;
                $_SESSION['usertype']="admin";
                header("location: admin/index.php");
            } else{
                    $message= "username or password do not match";
                    $_SESSION['loginMessage']=$message;

                    header("location:index.php");
            }            

        }
        
?>
