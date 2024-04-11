<?php

    include("assets/php/connect.php");
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
<nav class="navbar">
    <div class="navbar-left">
        <a href="home" class="logo"><img src="images/logo.png"></a>

        <div class="search-box">
            <img src="assets/css/images/search.png">
            <input type="text" placeholder="Search">
        </div>
    </div>
    <div class="navbar-center">
        <ul style="margin-bottom: 0;">
        <?php $role=$_SESSION['user_role'];
                //echo $role;
            ?>  

                <li><a href="dashboard"><img src="assets/css/images/House-final.png" style="padding: 3px;"><span>Home</span></a></li>   
            <?php
                if($role == 'admin')
                {?>
                <li><a href="userlist"><img src="assets/css/images/paper.png"><span>Users List</span></a></li>
            <?php } ?>

               <li><a href="#"><img src="assets/css/images/network2.png" style="padding: 3px"><span>My Network</span></a></li>
               <li><a href="#"><img src="assets/css/images/folder-final.png" style="padding: 1px;"><span>Projects</span></a></li>
               <li><a href="#"><img src="assets/css/images/chat-final.png" style="padding: 1px;"><span>Messaging</span></a></li>
               <li><a href="#"><img src="assets/css/images/bell-final.png"><span>Notifications</span></a></li>
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
                            <a href="profed">Edit Your Profile</a>
                            
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
                    <a href="logout" class="profile-menu-link">
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