<?php
require('../common/session.php');
require("../model/loginModel.php");

$loginModel = new Login();

if(isset($_GET['status'])){

    $response = array(
        'status' => 0,
        'message' => 'User data insertion not successful!'
    );

    $status = $_GET['status'];
    $username = trim($_POST['username']);
    $pw = trim($_POST['pw']);

    switch($status){
        case "login_user":
            try{
                if($username == ""){
                    throw new Exception("Username cannot be empty!");
                    $response['status'] = 0;
                    $response['message'] = "Username cannot be empty!";
                }
                if($pw == ""){
                    throw new Exception("Password cannot be empty!");
                    $response['status'] = 0;
                    $response['message'] = "Password cannot be empty!";
                }

                $password = md5($pw);

                $result = $loginModel->checkData($username,$password);

                
                

                if($result == false){
                    $msg = "Invalid Credentials!";
                    $msg = base64_encode($msg);
                    // header('location:../view/login.php?error_message='.$msg);
                    $response['status'] = 0;
                    $response['message'] = "Invalid Credentials!";
                }
                else{
                    $userRow = $result->fetch_assoc();

                    $userArray = array(
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

                    



                    $_SESSION["user"] = $userArray;

                    // header('location:../view/home.php?status=user_loged_in');
                    $response['status'] = 1;
                    $response['message'] = "/view/home.php?status=user_loged_in&page=1";
                }


            }
            catch(Exception $ex){
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                // header('location:../view/register.php?error_message='.$msg);
            }
            break;
    }
    echo json_encode($response);
}