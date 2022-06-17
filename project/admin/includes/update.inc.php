<?php
    require_once "../authenticate.php";

        if(isset($_GET["type"])){
            $col = $_GET["type"];
            if(isset($_POST[$col])){
                $value = $_POST["$col"];
                $user = $_POST["username"];
                
                require_once 'dbh.inc.php';
                require_once 'functions.inc.php';

                if(updateUser($connection, $col, $value, $user)){
                    header("location: ../update.php?username=".$user."");
                    exit();
                }
            }
        }else{
            exit();
        }
