<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "project";


    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
        {
            die("Failed To Connect");
        }
