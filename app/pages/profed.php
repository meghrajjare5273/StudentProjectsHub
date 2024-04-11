<?php
session_start();
    include("functions.php");
    include("connect.php");
    
    if(isset($_POST['submitimg'])){
    $target_dir = "./assets/users/";
    $target_file = $target_dir.basename($_FILES["userimg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["userimg"]["tmp_name"]);
  if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }
}

if ($_FILES["userimg"]["size"] > 500000) {
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
  if (move_uploaded_file($_FILES["userimg"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["userimg"]["name"])). " has been uploaded.";

      
      $user_id = $_SESSION['id']; 
      
      
      $image_path = $target_file;
      $sql = "UPDATE users SET profile = '$image_path' WHERE user_id = $user_id";
      if ($con->query($sql) === TRUE) {
            echo "Profile picture path inserted into the database successfully.";
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
    <title>Edit Your Profile</title>
    <link rel="stylesheet" href="assets/css/profed.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<nav>
    <?php include ("navbar.php"); ?>
</nav>
<body>
    

    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                  
            </div>
            <div class="col">
                 <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                 <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                     <img src="<?= get_image($_SESSION['profile']); ?>" style="height: 140px; width: 140px;"></img>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap" style="color:black;"><?php echo $_SESSION['fname'];echo'';echo $_SESSION['lname']; ?></h4>
                                                <p class="mb-0" style="color: black;">@<?php echo $_SESSION['username']; ?></p>
                                                    <div class="text-muted"><small>Last seen 2 hours ago</small></div>
                                                        <div class="mt-2">
                                                        <form action="profed" method="post" enctype="multipart/form-data">
                                                        <input type="file" accept="image/jpeg, image/png, image/jpg" name="userimg" id="userimg" style="display: none;">
                                                        <label for="userimg" class="btn btn-primary">Change Photo</label>
                                                        <input type="submit" value="Submit" style="vertical-align: top;" class="btn btn-primary" name="submitimg">
                                                        </form>


                                                      </div>

                                                    </div>
                                                        <div class="text-center text-sm-right">
                                                            <span class="badge badge-secondary"><?php echo $_SESSION['user_role']; ?></span>
                                                                <div class="text-muted"><small></small></div>
                                                        </div>
                                            </div>
                                        </div>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                    </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active">
                                                <form class="form" novalidate="">
                                                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <form method="post" action="profed">
                            <div class="form-group">
                              <label style="color:black;">Full Name</label>
                              <input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php echo $_SESSION['fname']; echo''; echo $_SESSION['lname']; ?> ">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label style="color:black;">Username</label>
                              <input class="form-control" type="text" name="username" placeholder="Enter Username" value="<?php echo $_SESSION['username']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label style="color:black;">Email</label>
                              <input class="form-control" type="text" placeholder="user@example.com">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label style="color:black;">About</label>
                              <textarea class="form-control" rows="5" placeholder="My Bio"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b style="color:black;">Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label style="color:black;">Current Password</label>
                              <input class="form-control" type="password" placeholder="Enter Current Password">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label style="color:black;">New Password</label>
                              <input class="form-control" type="password" placeholder="Enter New Password">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label style="color:black;">Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" placeholder="Retype Password"></div>
                          </div>
                        </div>
                      </div>
                    </form>
                      <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                        <div class="mb-2"><b style="color:black;">Keeping in Touch</b></div>
                        <div class="row">
                          <div class="col">
                            <label style="color:black;">Email Notifications</label>
                            <div class="custom-controls-stacked px-2">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                <label style="color:black;" class="custom-control-label" for="notifications-blog">Blog posts</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                <label style="color:black;" class="custom-control-label" for="notifications-news">Newsletter</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                <label style="color:black;" class="custom-control-label" for="notifications-offers">Personal Offers</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <input type="submit" class="btn btn-primary" value="Save Changes" name="submitinfo"></input>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <a href="logout">
              <button class="btn btn-block btn-secondary" >
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
              </button>
              </a>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 style="color:black;" class="card-title font-weight-bold">Support</h6>
            <p style="color:black;" class="card-text">Get fast, free help from our friendly assistants.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

    




  
    
</body>
</html>