<?php 
    $serverName = "localhost";
    $dBUserName = "root";
    $dBPassword = "";
    $dBName = "phpProject";

    $connection = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
    if(!$connection){
        die("connection falied: ".mysqli_connect_error());
    } 