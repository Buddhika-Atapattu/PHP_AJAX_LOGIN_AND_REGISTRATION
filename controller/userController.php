<?php
// include("../common/db.php");
require("../model/editUserModel.php");

// $dbConnection = new Database();

$userModel = new User();

if(isset($_GET['user_id'])){
    $id = $_GET['user_id'];

    $userModel = $userModel->editUser($id);

    $userRow = $userModel->fetch_assoc();

    $userArray = array(
        "status"=>"1",
        "id"=>$userRow["id"],
        "fname"=>$userRow["fname"],
        "lname"=>$userRow["lname"],
        "email"=>$userRow["email"],
        "image"=>$userRow["image"],
        "cno"=>$userRow["cno"],
        "address"=>$userRow["address"],
        "profession"=>$userRow["profession"],
        "username"=>$userRow["username"],
    );

    // return $text;
    echo json_encode($userArray);
}
