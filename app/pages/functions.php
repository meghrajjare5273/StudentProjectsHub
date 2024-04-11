<?php
function authenticate($data)
{
    $_SESSION['USER'] = $data;
}
function query(string $query, array $data = [])
{
    $string = "mysql:hostname = localhost; dbname = project";
    $con = new PDO($string, 'root', '' );

    $stm = $con->prepare($query);
    $stm->execute($data);

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    if(is_array($result) && !empty($result))
    {
        return $result;
    }

    return false;
    
}


function check_login($con)
{

    if(isset($_SESSION['user_id']))
    {

        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }

    }
    
    header("location: login.php");
    die;
}

function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length =5;
    }
    $len = rand(4, $length);

    for($i = 0; $i < $len; $i++){
        $text .= rand(0,9);
    }
    return $text;
}

function get_image($profile)
{
    if(file_exists($profile))
    {
        return $profile;
    }
    return 'assets/css/images/no-image.png';
}

function get_dash($dash)
{
    if(file_exists($dash))
    {
        return $dash;
    }
    
}