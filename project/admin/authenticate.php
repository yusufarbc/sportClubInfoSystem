<?php
session_start(); 
if (!isset($_SESSION['rootname'])) { 
    header("location: signin.php");
    exit();
}else{
    $root = $_SESSION['rootname'];
}