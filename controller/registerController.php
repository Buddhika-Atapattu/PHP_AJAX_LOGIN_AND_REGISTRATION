<?php
include("../model/registerModel.php");

$registerModel = new Register();



if(isset($_GET['status'])){

    $response = array(
        'status' => 0,
        'message' => 'User data insertion not successful!'
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
    $pw = trim($_POST['pw']);
    $cpw = trim($_POST['cpw']);

    switch($status){
        case "register_user":
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
                if($pw == ""){
                    throw new Exception("Password cannot be empty!");
                }
                if($cpw == ""){
                    throw new Exception("Confirm password cannot be empty!");
                }
                if($pw !== $cpw){
                    throw new Exception("Password and confirm password has to be same!");
                }
                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    throw new Exception("Please enter valid email!");
                }

                $count = $registerModel->checkData($email,$username);

                $emailCount = $registerModel->checkEmail($email);

                $usernameCount = $registerModel->checkUsername($username);

                if($emailCount > 0){
                    throw new Exception("Email alrady taken!");
                }

                if($usernameCount > 0){
                    throw new Exception("Username alrady taken!");
                }

                $pw = md5($pw);

                if(!$count > 0){
                    $uploadStatus = 1; 
                    $fileName = basename($file);
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                    $allowedType = array('jpg','png','jpeg','gif','jfif');

                    if(in_array($fileType , $allowedType)){
                        $tmpFile = $_FILES['image']['tmp_name'];
                        // $imageContent = addslashes(file_get_contents($tmpFile));
                        $path = '../image/user-images/';
                        $imageName = hexdec(uniqid()).".".$fileType;
                        move_uploaded_file($tmpFile,$path.$imageName);
                        $imagePath = $path.$imageName;
                    }
                    else{
                        throw new Exception("Image type is not match with allowed type (jpg,png,jpeg,gif,jfif)!");
                    }

                    $insert = $registerModel->insertData($imagePath,$fname,$lname,$email,$cno,$address,$profession,$username,$pw);

                    if($insert == 1){
                        $response['status'] = 1;
                        $response['message'] = "User data is inserted successfully!";

                        $msg = "User data is inserted successfully!";
                        $msg = base64_encode($msg);
                        // header('location:../view/register.php?success_message='.$msg);
                    }
                    else{
                        throw new Exception("User data is not inserted successfully!");
                    }
                }
                else{
                    throw new Exception("Email and username already taken!");
                }


            }
            catch(Exception $ex){
                $msg = $ex->getMessage();
                // $msg = base64_encode($msg);
                $response['status'] = 0;
                $response['message'] = $msg;
                // header('location:../view/register.php?error_message='.$msg);
            }
            break;
    }
    echo json_encode($response);
}



