<?php
include 'session.php';
if(!isset($_SESSION["user"])){
    header("location:../view/login.php");
   
    exit();
}