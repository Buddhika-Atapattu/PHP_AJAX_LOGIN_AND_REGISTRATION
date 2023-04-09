<?php
include("../common/db.php");

$dbConnection = new Database();

class User{
    public function selectUser($id){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = $con->query($sql);
        return $result;
    }
}