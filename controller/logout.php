<?php
include("../common/session.php");

if(isset($_GET["status"])){
    session_destroy();
    header("location:../view/home.php");
}
