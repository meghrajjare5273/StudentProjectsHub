<?php
    session_start();

    include('connect.php');
    include('functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>User List</title>
</head>
<body>
    <nav>
        <?php include('navbar.php'); ?>
    </nav>
<div class="container mt-3">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Username</th>
        <th>Mobile No.</th>
        <th>College</th>
      </tr>
    </thead>
    <tbody>

    <?php 
        $sql="select * from users";
        $result=mysqli_query($con,$sql);

    $i=1;
    while($data=mysqli_fetch_array($result))
    {?>
      <tr>
        <td><?php echo $data['user_id'];?></td>
        <td><?php echo $data['fname'];?></td>
        <td><?php echo $data['lname'];?></td>
        <td><?php echo $data['uname'];?></td>
        <td><?php echo $data['mob'];?></td>
        <td><?php echo $data['clg'];?></td>

      </tr>
    
    <?php $i++; } ?>

    </tbody>
</div>
</body>
</html>