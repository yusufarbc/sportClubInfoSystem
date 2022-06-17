<?php
    require_once "../authenticate.php";

        if(isset($_GET["type"])){
            $col = $_GET["type"];
            if(isset($_POST[$col])){
                $value = $_POST["$col"];
                $post = $_POST["postname"];
                
                require_once 'dbh.inc.php';
                require_once 'functions.inc.php';

                if(updatePost($connection, $col, $value, $post)){
                    header("location: ../updatePost.php?id=".$post."");
                    exit();
                }
            }
        }else{
            exit();
        }
