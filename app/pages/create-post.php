<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include_once "connect.php";
    include_once "functions.php";
    include_once "dashboard.php";

    // Escape user inputs for security
    $post_content = mysqli_real_escape_string($con, $_POST['postContent']);
    $post_id = random_num(20);
    $uid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $user_profile = $_SESSION['profile'];


    // Insert post into database
    $sql = "INSERT INTO posts (user_id,post_id,username,user_profile,post_content) VALUES ('$uid','$post_id','$username','$user_profile','$post_content')";
    if (mysqli_query($con, $sql)) {
        header('Location: dashboard');
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

    if(isset($_POST['submitimg'])){
        $target_dir = "./assets/posts/";
        $target_file = $target_dir.basename($_FILES["userimg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["postimg"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
          }
          
          if ($_FILES["postimg"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          
          if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
              }
            
          if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          
          } else {
            if (move_uploaded_file($_FILES["postimg"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["userimg"]["name"])). " has been uploaded.";
          
                
                $user_id = $_SESSION['id']; 
                
                
                $image_path = $target_file;
                $sql = "UPDATE posts SET post_image = '$image_path' WHERE user_id = $user_id";
                if ($con->query($sql) === TRUE) {
                      echo " inserted into the database successfully.";
                  } else {
                      echo "Error: " . $sql . "<br>" . $con->error;
                  }
          
              } else {
                  echo "Sorry, there was an error uploading your file.";
              }
          }
              }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="write-post-container">
        <div class="user-profile">
           <a <?php echo $_SESSION['fname'];?>><img src="<?= get_image($_SESSION['profile']); ?>"></a>
        
            <p><?php echo $_SESSION['username'];?></p>
        </div>

            <div class="post-input-container">
                <form id="postContent" method="post" enctype="multipart/form-data">
                    <textarea name="postContent" id="postContent" rows="3" placeholder="What's On Your Mind <?php echo $_SESSION['fname']?>"></textarea>
                        <div class="add-post-links">
                          <input type="file" accept="image/jpeg, image/jpg, image/png" name="postimg" id="postimg" style="display: none;">
                          <label for="postimg" class="btn btn-primary" style="cursor: pointer;">Upload An Image</label><br>
                          <input type="submit" style="display: none;" name="submitpost" id="submitpost">
                          <label for="submitpost" class="btn btn-primary" style="cursor: pointer;">Submit</label>
                        </div>
                </form>
            </div>
    </div>








<style>
    .write-post-container{
        display: flow-root;
        flex-basis: 47%;
        width: 100%;
        background: #fff;
        border-radius: 6px;
        padding: 20px;
        color: #626262;
    }
    .user-profile{
        display: flow-root;
        align-items: center;
    }
    .user-profile img{
        width: 45px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .user-profile p{
        display: inline-flex;
        margin-bottom: -5px;
        font-weight: 500;
        color: #626262;
    }
    .post-input-container{
        display: flow-root;
        padding-left: 55px;
        padding-top: 20px;
        
        border-radius: 6px;
        margin-bottom: 5px;
    }
    .post-input-container textarea{
        display: flow-root;
        width: 90%;
        border: 0;
        outline: 0;
        border-bottom: 1px solid #ccc;
        background: transparent;
        resize: none;
    }
    .add-post-links{
        display: flex;
        margin-top: 10px;
    }
    .add-post-links a{
        text-decoration: none;
        display: flex;
        align-items: center;
        color: #626262;
        margin-right: 30px;
        font-size: 13px;
    }
    .add-post-links a img{
        width: 20px;
        margin-right: 10px;
    }
    label{
        padding: 0 10px;
    }

</style>
</body>
</html>