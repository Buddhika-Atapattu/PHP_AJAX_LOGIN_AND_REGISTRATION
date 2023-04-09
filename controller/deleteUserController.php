<?php
include('../model/userDeleteModel.php');

if(isset($_GET["user"]) ){

    $userDelete = new UserDelete();

    $respond = array(
        'status'=>0,
        'msg'=>'',
        'url'=>''
    );
    
    $id = $_GET["user"];

    $selectUser = $userDelete->selectUser($id);

    $userArray = $selectUser -> fetch_assoc();

    // print_r($userArray);

    $image = $userArray['image'];

    $deleteImage = unlink($image);

    if($deleteImage == 1){
        $deletian = $userDelete->deleteUser($id);
        if($deletian == 1){
            $msg = "User deleted successfully";
            $msg = base64_encode($msg);
            $respond['status'] = 1;
            $respond['msg'] = $msg;
            $respond['url'] = '/view/home.php?success_message='.$msg.'&status=user_loged_in&page=1';
            // header('location:../view/home.php?success_message='.$msg.'&status=user_loged_in&page=1');
        }
        else{
            $msg = "User deleted not successful";
            $msg = base64_encode($msg);
            $respond['status'] = 0;
            $respond['msg'] = $msg;
            $respond['url'] = '/view/home.php?error_message='.$msg.'&status=user_loged_in&page=1';
            // header('location:../view/home.php?error_message='.$msg.'&status=user_loged_in&page=1');
        }
    }
    else{
        $msg = "Image is not deeted";
        $msg = base64_encode($msg);
        $respond['status'] = 1;
        $respond['msg'] = $msg;
        $respond['url'] = '/view/home.php?error_message='.$msg.'&status=user_loged_in&page=1';
        // header('location:../view/home.php?error_message='.$msg.'&status=user_loged_in&page=1');
    }

    echo json_encode($respond);
}