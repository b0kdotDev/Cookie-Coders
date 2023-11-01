<?php
include('./includes/dbconnection.php');
session_start();

$uid = isset($_SESSION['sturecmsuid']) ? $_SESSION['sturecmsuid'] : null;

if ($uid) {
    $sql = "SELECT * from tblstudent where StudentID=:uid";

    $query = $dbh->prepare($sql);
    $query->bindParam(':uid', $uid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $Image = 

    $cnt = 1;
    if ($query->rowCount() > 0) {
        $row = $results[0];
    }
}
?>
    <div class="hero">
        <nav>
        <a href="#" class="logo">
                <img src="./images/log" alt="logo">
                <h2>HardTech</h2>
            </a>
            <img src="" alt="">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <img alt="<?php echo $image;?>" class="user-pic" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="" alt="<?php echo $image;?>" >
                      <h3 alt="<?php echo $firstname;?>"></h3>
                    </div>
                    <hr>

                    <a href="" class="sub-menu-link">
                        <img src="" alt="">
                        <p>Edit profile</p>
                        <span>></span>
                    </a>
                    <a href="" class="sub-menu-link">
                        <img src="" alt="">
                        <p>Settings</p>
                        <span>></span>
                    </a>
                    <a href="index.php" class="sub-menu-link">
                        <img src="" alt="">
                        <p>Log out</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    


    <script>
        let subMenu =document.getElementById("subMenu");

        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>