<?php

    include("connect.php");
    //include("assets/php/functions.php");
    //print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="">
</head>
<body>
<nav class="navbar" style="display: flexbox; padding-bottom: 0px; top: 0px;">
    <div class="navbar-left">
        <a href="index.html" class="logo"><img src="images/logo.png"></a>

        <div class="search-box">
            <img src="assets/css/images/search.png">
            <input type="text" placeholder="Search">
        </div>
    </div>
    <div class="navbar-center">
        <ul>
        <?php $role=$_SESSION['user_role'];
                //echo $role;
            ?>  

                <li><a href="dashboard.php"><img src="images/house-door-fill.png"><span>Home</span></a></li>   
            <?php
                if($role == 'admin')
                {?>
                <li><a href="userlist.php"><img src="list.png"><span>Users List</span></a></li>
            <?php } ?>

               <li><a href="#"><img src="assets/css/images/globe.png"><span>My Network</span></a></li>
               <li><a href="#"><img src="assets/css/images/stack.png"><span>Projects</span></a></li>
               <li><a href="#"><img src="assets/css/images/envelope.png"><span>Messaging</span></a></li>
               <li><a href="#"><img src="assets/images/images/bell-fill.png"><span>Notifications</span></a></li>
        </ul>
    </div>
    <?php
        if(!empty($role))
        {?>
            <div class="navbar-right">
                <div class="online">
                        
                    <img src="<?= get_image($_SESSION['profile']); ?>" class="nav-profile-img" onclick="toggleMenu()"></a>
                </div>
            </div>

            <div class="profile-menu-wrap" id="profileMenu">
                <div class="profile-menu">
                    <div class="user-info">
                        <img src="<?= get_image($_SESSION['profile']); ?>" alt="">
                        <div>
                            <?php $naam = $_SESSION['fname']; ?>   
                            <h3><?php echo $naam ;?> </h3>
                            <a href="assets/php/profed.php">Edit Your Profile</a>
                            
                        </div>
                    </div>
                    <hr>
                    <a href="#" class="profile-menu-link">
                        <img src="images/feedback.png" alt="">
                        <p>Give Feedback</p>
                        <span>></span>
                    </a>
                    <a href="#" class="profile-menu-link">
                        <img src="images/setting.png" alt="">
                        <p>Settings & Privacy</p>
                        <span>></span>
                    </a>
                    <a href="#" class="profile-menu-link">
                        <img src="images/help.png" alt="">
                        <p>Help & Support</p>
                        <span>></span>
                    </a>
                    <a href="#" class="profile-menu-link">
                        <img src="images/display.png" alt="">
                        <p>Display & Accessibility</p>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="profile-menu-link">
                        <img src="images/logout.png" alt="">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
            <?php
                };?>
        </nav>

        <script>

            let profileMenu = document.getElementById("profileMenu");

                function toggleMenu(){
                    profileMenu.classList.toggle("open-menu");
                }
        </script>

        </body>
        </html>
<?php
//    function get_image($profile)
  //  {
    ///    if(file_exists($profile))
       // {
         //   return $profile;
       // }
        //return 'images/no-image.png';
   // }
?>