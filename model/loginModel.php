<?php

include('../common/db.php');

$database = new Database();

class Login{
    public function checkData($username,$password){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $con->query($sql);
        $row = mysqli_num_rows($result);
        if($row > 0){
            return $result;
        }
        else{
            return false;
        }
    }
}