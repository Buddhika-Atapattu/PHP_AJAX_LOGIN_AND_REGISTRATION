<?php
require("../common/checking_session.php");
require("../model/viewUsersModel.php");

$userModel = new User();

if(isset($_GET['status']) && isset($_GET['page'])){

    $userArray = $_SESSION['user'];

    $page = $_GET["page"];

    $numberPerPages = 3;
    
    $startFrom = ($page-1) * $numberPerPages;

    $users = $userModel->selectAllUsers($numberPerPages,$startFrom);

    $row = $userModel->selectAllUsersRow();

    $allUserDetails  = array(
        'status'=>0,
        'html'=>'<h4>No user </h4>'
    );

    while($userRow = $users -> fetch_assoc()){

        if($userRow['image'] !== ""){
            $image = $userRow['image'];
        }
        else{
            $image = '../image/user-images/dummy-user.png';
        }
        
        echo $html =   '<tr>'.
        '<th scope="row" id="'.$userRow['id'].'">'.$userRow['id'].'</th>'.
        '<td>'.$userRow['fname'] .'</td>'.
        '<td>'.$userRow['lname'] .'</td>'.
        '<td><img alt="user-image" src="'.$image.'" class="mx-auto rounded-circle user-image-table"></td>'.
        '<td>'.$userRow['email'] .'</td>'.
        '<td>'.$userRow['cno'] .'</td>'.
        '<td>'.$userRow['address'] .'</td>'.
        '<td>'.$userRow['profession'] .'</td>'.
        '<td>'.$userRow['username'] .'</td>'.
        '<td><button class="btn btn-outline-warning" id="edit" onclick="window.location.href=\'./editUser.php?user='.$userRow['id'].' \'">EDIT</button></td>'.
        '<td><button class="btn btn-outline-danger" id="delete_'.$userRow['id'].'" onclick="window.location.href=\'../controller/deleteUserController.php?user='. $userRow['id'].'\';">DELETE</button></td>'.
        '</tr>';

        // echo $tableRow;
        $allUserDetails  = array(
            'row'=>$row,
            'html'=>$html
        );

        // echo json_encode($allUserDetails);
        // onclick="window.location.href=\'../controller/deleteUserController.php?user='. $userRow['id'].'\';"
    }
    
}