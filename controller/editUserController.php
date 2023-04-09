<?php
include("../model/editUserModel.php");
require('../common/session.php');

$editUserModel = new User();

if((isset($_GET['status'])) && (isset($_GET["user"]))){

    if(isset($_SESSION['user'])){
        $userArray = $_SESSION['user'];

        $id = $userArray['id'];

    }
    else{
        $id = $_GET["user"];

        $userModel = $editUserModel->editUser($id);

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
    }
    
    $response = array(
        'status' => 0,
        'message' => 'User data insertion not successful!',
        'url'=> ''
    );

    $status = $_GET['status'];
    
    $file = $_FILES['image']['name'];
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $cno = trim($_POST['cno']);
    $address = trim($_POST['address']);
    $profession = trim($_POST['profession']);
    $username = trim($_POST['username']);

    
    

    
    

    switch($status){
        case "edit_user":
            try{
                // if(empty($file)){
                //     throw new Exception("User image cannot be empty!");
                // }
                if($fname == ""){
                    throw new Exception("First name cannot be empty!");
                }
                if($lname == ""){
                    throw new Exception("Last name cannot be empty!");
                }
                if($email == ""){
                    throw new Exception("Email cannot be empty!");
                }
                if($cno == ""){
                    throw new Exception("Contact number cannot be empty!");
                }
                if($address == ""){
                    throw new Exception("Address cannot be empty!");
                }
                if($profession == ""){
                    throw new Exception("Profession cannot be empty!");
                }
                if($username == ""){
                    throw new Exception("Username cannot be empty!");
                }

                if($file !== ""){
                    // echo "not";
                    $fileName = basename($file);
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                    $allowedType = array('jpg','png','jpeg','gif','jfif');

                    if(in_array($fileType , $allowedType)){
                        $tmpFile = $_FILES['image']['tmp_name'];
                        // $imageContent = addslashes(file_get_contents($tmpFile));
                        $path = '../image/user-images/';
                        $imageName = hexdec(uniqid()).".png";
                        $deleteOldImg = unlink($userArray["image"]);
                        if($deleteOldImg == 1){
                            move_uploaded_file($tmpFile,$path.$imageName);
                            $imagePath = $path.$imageName;
                        }
                        else{
                            throw new Exception("Old image is not deleted!");
                        }
                        
                    }
                    else{
                        throw new Exception("user image is not match to the exepted type. Exepted types are jpg, png, jpeg, gif, jfif!");
                    }

                    $update = $editUserModel->editUserDataWithFile($id,$fname,$lname,$imagePath,$email,$cno,$address,$profession,$username);

                    if($update == 1){
                        $msg = "User data updated successfully with the image";
                        $msg = base64_encode($msg);
                        // header('location:../view/home.php?success_message='.$msg);
                        $response['message'] = $msg;
                        $response['status'] = 0;
                        $response['url'] = '/view/home.php?success_message='.$msg.'&status=user_loged_in&page=1';
                    }
                    else{
                        $msg = "User data is not updated successfully with the image";
                        $msg = base64_encode($msg);
                        // header('location:../view/home.php?error_message='.$msg);
                        $response['message'] = $msg;
                        $response['status'] = 0;
                        $response['url'] = '/view/home.php?error_message='.$msg.'&status=user_loged_in&page=1';
                    }
                }
                else{
                    $update = $editUserModel->editUserDataWithoutFile($id,$fname,$lname,$email,$cno,$address,$profession,$username);
                    if($update == 1){
                        $msg = "User data updated successfully without the image";
                        $msg = base64_encode($msg);
                        // header('location:../view/home.php?success_message='.$msg);
                        $response['message'] = $msg;
                        $response['status'] = 1;
                        $response['url'] = '/view/home.php?success_message='.$msg.'&status=user_loged_in&page=1';
                    }
                    else{
                        $msg = "User data is not updated successfully without the image";
                        $msg = base64_encode($msg);
                        // header('location:../view/home.php?error_message='.$msg);
                        $response['message'] = $msg;
                        $response['status'] = 0;
                        $response['url'] = '/view/home.php?error_message='.$msg.'&status=user_loged_in&page=1';
                    }
                }



                


            }
            catch(Exception $ex){
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                // header('location:../view/editUser.php?error_message='.$msg.'&user='.$id);
                $response['message'] = $msg;
                $response['status'] = 0;
                $response['url'] = '/view/editUser.php?error_message='.$msg.'&user='.$id;
            }
            break;
    }
    echo json_encode($response);
}