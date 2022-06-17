<?php 
    session_start(); 
    if ( !isset($_SESSION['username']) ) { 
        header("Location: login.php"); 
        exit(); 
    }else{
        $username = $_SESSION["username"];

        if(isset($_GET["type"])){

            $col = $_GET["type"];
            if(isset($_POST[$col])){
                $value = $_POST["$col"];

                require_once 'dbh.inc.php';
                require_once 'functions.inc.php';

                if(updateUser($connection, $col, $value, $username)){
                    header("location: ../profile.php");
                    exit();
                }
            }
        }else{
            exit();
        }
    }
