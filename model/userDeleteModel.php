<?php

include('../common/db.php');

$database = new Database();

class UserDelete{
    public function deleteUser($id){
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM user WHERE id = '$id'";
        $result = $con->query($sql);
        return $result;
    }
    public function selectUser($id){
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = $con->query($sql);
        return $result;
    }
}