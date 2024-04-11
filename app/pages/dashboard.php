<?php
  session_start();

    include("connect.php");
    include("functions.php");

  $title = $_SESSION['fname'] ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="">
  <title>Welcome <?= $title ; ?></title>
</head>
<body>
<nav><?php include_once "navbar.php";?></nav>

<div class="contain">
  <div class="left-side"></div>
  <div class="main">
    <?php include_once "create-post.php";?>
    <h2></h2>
    <br>
    <?php include_once "display_posts.php";?>
  </div>
  <div class="right-side"></div>

</div>

  <style>
    .contain{
      display: flex;
      justify-content: space-between;
      padding: 13px 5%;

    }
    .left-side{
      position: sticky;
      flex-basis: 25%;
      align-self: flex-start;
      top: 70px;
      background: #626625;
    }
    .right-side{
      position: sticky;
      top: 70px;
      align-self: flex-start;
      flex-basis: 25%;
      background: #626625;
    }
    .main{
      flex-basis: 47%;
    }
    
  </style>
  </body>
  </html>