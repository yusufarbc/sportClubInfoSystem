<?php
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $pwd) != false){
        header("location: ../regiter.php?error=emptyInput");
        exit();
    }

    loginUser($connection, $username, $pwd);

}else{
    header("location: ../login.php");
}