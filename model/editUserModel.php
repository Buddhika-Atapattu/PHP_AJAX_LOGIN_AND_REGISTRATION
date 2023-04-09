<?php
include("../common/db.php");

$dbConnection = new Database();

class User{
    public function editUser($id){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = $con->query($sql);
        return $result;
    }
    public function editUserDataWithoutFile($id,$fname,$lname,$email,$cno,$address,$profession,$username){
        $con = $GLOBALS["con"];
        $sql = "UPDATE user SET fname = '$fname', lname = '$lname', email = '$email', cno = '$cno', address = '$address', profession = '$profession', username = '$username' WHERE id = '$id'";
        $result = $con->query($sql);
        return $result;
    }
    public function editUserDataWithFile($id,$fname,$lname,$imagePath,$email,$cno,$address,$profession,$username){
        $con = $GLOBALS["con"];
        $sql = "UPDATE user SET fname = '$fname', lname = '$lname', image = '$imagePath', email = '$email', cno = '$cno', address = '$address', profession = '$profession', username = '$username' WHERE id = '$id'";
        $result = $con->query($sql);
        return $result;
    }

}
