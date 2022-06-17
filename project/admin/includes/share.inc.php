<?php
    require_once "../authenticate.php";

    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $content = $_POST["content"];
        $branch = $_POST["branch"];
        $image = $_POST["image"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(createPost($connection, $title, $image, $branch, $content)){
            header("location: ../posts.php");
        }
    }else{
        exit();
    }