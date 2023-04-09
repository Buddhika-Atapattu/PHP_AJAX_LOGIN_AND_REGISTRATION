<?php
include("../model/registerModel.php");

$registerModel = new Register();

$allowedType = array('jpg','png','jpeg','gif');

$path = "../image/user-images/";

$response = array(
    'status' => 0,
    'message' => 'User data insertion not successful!'
);

if(isset($_GET['status'])){
    
}