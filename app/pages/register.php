<style>
   
</style>
<?php
function authenticate($data)
{
    $_SESSION['USER'] = $data;
}

session_start();

    include("assets/php/connect.php");
    include("assets/php/functions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $mob = $_POST['mob'];
      $uname= $_POST['uname'];
      $pass = $_POST['pass'];
      $clg = $_POST['clg'];
      $role = "student";


      if(!empty($fname) && !empty($lname) && !empty($mob) && !empty($uname) && !empty($pass) && !is_numeric($uname))
      {
        $user_id = random_num(20);
        $query = "insert into users (user_id,fname,lname,mob,uname,pass,clg,role) values ('$user_id','$fname','$lname','$mob','$uname','$pass','$clg','$role')";
        $query_2 = "insert into images (id) values ('$user_id')";


        mysqli_query($con, $query);
        mysqli_query($con, $query_2);

        header("location: login");
        die;
      }else{
      
      }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <link rel="stylesheet" href="assets/css/register.css">
    <title>Register</title>
</head>
<body>
    
    <div class="regbox" style="padding: 10px 30px; background-color: rgb(255 255 255 / 60%);">
      <h1>Register</h1>
      <div class="mycss"></div>
        <form method="post">
        <p>Name</p>
        <input type="text" name="fname" placeholder="First Name">
        <p>Surname</p>
        <input type="text" name="lname" placeholder="Last Name">
        <p>Mobile No.</p>
        <input type="number" name="mob" placeholder="Enter Number">
        <p>Username</p>
        <input type="text" name="uname" placeholder="Enter Username">
        <p>Password</p>
        <input type="password" name="pass" placeholder="Set A Password">
        <p>College</p>
        <input type="text" name="clg" placeholder="Name of College">
        <input type="submit" name="register" value="Register" >
        </form>
        <a href="login" style="text-decoration: none; color: black;">Already Have An Account?</a>
     </div>

    
</body>
</html>