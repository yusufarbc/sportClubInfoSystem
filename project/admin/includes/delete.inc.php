<?php
    require_once "../authenticate.php";

    if(isset($_GET["username"])){
        $user = $_GET["username"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(deleteUser($connection, $user)){
            header("location: ../panel.php");
            exit();
        }else{
            echo "something went wrong";
        }
    }

?>
