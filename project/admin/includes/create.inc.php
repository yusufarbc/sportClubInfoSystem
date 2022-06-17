<?php
    require_once "../authenticate.php";

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
            header("location: ../create.php?error=emptyInput");
            exit();
        }
        if(invalidUsername($username) != false){
            header("location: ../create.php?error=invalidUsername");
            exit();
        }
        if(invalidEmail($email) != false){
            header("location: ../create.php?error=invalidEmail");
            exit();
        }
        if(pwdMatch($pwd, $pwdrepeat) != false){
            header("location: ../create.php?error=passwordsMatch");
            exit();
        }
        if(usernameExists($connection, $username, $email) != false){
            header("location: ../create.php?error=usernameExists");
            exit();
        }
        createUser($connection, $name, $surname, $username, $tc, $branch, $email, $birthday, $pwd);
    }else{
        header("location: ../panel.php");
    }