<?php
    include_once "connect.php";
    include_once "functions.php";


    $sql = "SELECT * FROM posts";
    $result = $con->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

        <div class="post-container">
        <?php if ($result->num_rows > 0) {?>
           <?php while($row = $result->fetch_assoc()) {  ?>
            <div class="user-profile">
                <p style=""><img src="<?= get_image($row['user_profile']); ?>"><?php echo $row['username'];?>
                <br>
                <span><?php echo $row['created_at']; ?></span>
            </div>
            <img src="<?= get_image($row['postimg']); ?>">
            <p><?php echo $row['post_content']; ?></p>
            <br>
            <br>
            <?php }
          }?>
          
        </div>











<style>
    .post-container{
        width: 100%;
        background: #fff;
        border-radius: 6px;
        padding: 20px;
        color: #626262;
        margin: 20px 0;
    }
    .user-profile{
        display: flow-root;
        align-items: center;
    }
    .user-profile p{
        justify-content: flex-start;
        align-self: flex-start;
    }
    .user-profile span{
        display: contents;
        font-size: 12px;
        font-weight: 400;
        font-style: oblique;
    }
    .post-container img{
        max-width: 60px;
        max-height: 60px;
    }

</style>
</body>
</html>