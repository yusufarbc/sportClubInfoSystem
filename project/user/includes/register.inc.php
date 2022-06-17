<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $tc = $_POST["id"];
    $birthday = $_POST["birthday"];
    $username = $_POST["username"];
    $branch = $_POST["branch"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdrepeat = $_POST["passwordrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputRegister($name, $surname, $tc, $branch, $birthday, $username, $email, $pwd, $pwdrepeat) != false){
        header("location: ../register.php?error=emptyInput");
        exit();
    }
    if(invalidUsername($username) != false){
        header("location: ../register.php?error=invalidUsername");
        exit();
    }
    if(invalidEmail($email) != false){
        header("location: ../register.php?error=invalidEmail");
        exit();
    }
    if(pwdMatch($pwd, $pwdrepeat) != false){
        header("location: ../register.php?error=passwordsMatch");
        exit();
    }
    if(usernameExists($connection, $username, $email) != false){
        header("location: ../register.php?error=usernameExists");
        exit();
    }
    createUser($connection, $name, $surname, $username, $tc, $branch, $email, $birthday, $pwd);
}else{
    header("location: ../register.php");
}