<?php

include('../common/db.php');

$database = new Database();

class Register{
    public function checkData($email,$username){
        $con = $GLOBALS['con'];
        $sql = "SELECT email username FROM user WHERE email = '$email' AND username = '$username'";
        $result = $con->query($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }
    public function checkEmail($email){
        $con = $GLOBALS['con'];
        $sql = "SELECT email FROM user WHERE email = '$email'";
        $result = $con->query($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }
    public function checkUsername($username){
        $con = $GLOBALS['con'];
        $sql = "SELECT username FROM user WHERE username = '$username'";
        $result = $con->query($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }
    public function insertData($imagePath,$fname,$lname,$email,$cno,$address,$profession,$username,$pw){
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO user(fname,lname,image,email,cno,address,profession,username,password) VALUES('$fname','$lname','$imagePath','$email','$cno','$address','$profession','$username','$pw')";
        $result = $con->query($sql);
        return $result;
    }
}