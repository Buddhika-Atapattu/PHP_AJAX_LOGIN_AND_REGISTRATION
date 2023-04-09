<?php
include("../common/db.php");

$dbConnection = new Database();

class User{
    public function selectAllUsers($numberPerPages,$startFrom){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM user u ORDER BY u.id DESC LIMIT $startFrom,$numberPerPages";
        $result = $con->query($sql);
        return $result;
    }
    public function selectAllUsersRow(){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM user";
        $result = $con->query($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }
}