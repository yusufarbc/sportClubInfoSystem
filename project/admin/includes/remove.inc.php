<?php
    require_once "../authenticate.php";

    if(isset($_GET["id"])){
        $post = $_GET["id"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(deletePost($connection, $post)){
            header("location: ../posts.php");
            exit();
        }else{
            echo "something went wrong";
        }
    }

?>
