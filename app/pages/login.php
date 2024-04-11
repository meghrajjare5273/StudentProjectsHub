<?php
function authenticate($data)
{
    $_SESSION['USER'] = $data;
}

    session_start();

    
    include("assets/php/connect.php");
    include("assets/php/functions.php");

if(isset($_POST['login']))
{
    $sql="select * from users where uname='".$_POST['uname']."' AND pass='".$_POST['pass']."'";

    $result=mysqli_query($con,$sql);
    $data=mysqli_fetch_array($result);

    //print_r($data);

    authenticate($data);


    if(!empty($data))
    {
        $_SESSION['user_role']=$data['role'];
        $_SESSION['username']=$data['uname'];
        $_SESSION['fname']=$data['fname'];
        $_SESSION['lname']=$data['lname'];
        $_SESSION['profile']=$data['profile'];
        $_SESSION['id']=$data['user_id'];
        $_SESSION['mob']=$data['mob'];
        $_SESSION['clg']=$data['clg'];
        


        header('location: dashboard');
    }

    echo "Wrong Username Or Password";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login And Register </title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="loginbox">
    <form method="post">
        <img src="assets/css/images/login.png" class="avatar" alt="">
            <p>Username</p>
            <input type="text" name="uname" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="pass" placeholder="Enter Password">
            <input type="submit" name="login" value="Login">

            <a href="#">Lost your Password</a><br>
            <a href="register">Don't Have An Account?</a>
    </form>
        

        
        


    </div>

    
</body>
</html>