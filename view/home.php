<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    if(isset($_GET['status'])){
        // echo "user";
        include("../common/checking_session.php");
    }
    
    include("../common/header.php"); 
    
    include("../model/viewUsersModel.php");

    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }
    else{
        $page = 1;
    }
    
    $numberPerPages = 2;
    
    $startFrom = ($page-1) * $numberPerPages;

    $userModel = new User();

    $users = $userModel->selectAllUsers($numberPerPages,$startFrom);

    $row = $userModel->selectAllUsersRow();
    ?>
    <title>Project</title>
    <style><?php include("../css/user.css") ?></style>
</head>
<body>
    <input type="text" class="d-none" id="row" value="<?php echo $row; ?>">
    <section id="section_01">
        <?php include('../common/navbar.php'); ?>
    </section>
    <?php
    if(isset($_SESSION["user"])){
        
        $userArray = $_SESSION["user"];
        ?>
    <section>
        <div class="container">
            <div class="row">
                <div id="msg"></div>
            <?php
            if(isset($_GET['error_message'])){
                $msg = base64_decode($_GET['error_message']);
                ?>
                <div class="col-lg-6 mx-auto bg-danger text-center text-light border-danger my-4">
                    <strong><?php echo $msg; ?></strong>
                </div>
                <?php
            }
            if(isset($_GET['success_message'])){
                $msg = base64_decode($_GET['success_message']);
                ?>
                <div class="col-lg-6 mx-auto bg-success text-center text-light border-danger my-4">
                    <strong><?php echo $msg; ?></strong>
                </div>
                <?php
            }
            ?>
            </div>
            <div class="row">
                <table class="table table-striped mt-4">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">id</td>
                            <th scope="col">First name</td>
                            <th scope="col">Last name</td>
                            <th scope="col">Image</td>
                            <th scope="col">Email</td>
                            <th scope="col">Contact Number</td>
                            <th scope="col">Address</td>
                            <th scope="col">Profession</td>
                            <th scope="col">Username</td>
                            <th scope="col">Edit</td>
                            <th scope="col">Delete</td>
                        </tr>
                    </thead>
                    <!-- <tbody id="tbody"></tbody> -->
                    <tbody>
                            <?php
                            while($userRow = $users -> fetch_assoc()){
                                $userID = $userRow["id"]
                            ?>
                            <tr>
                                <th scope="row"><?php echo $userRow["id"] ?></th>
                                <td><?php echo $userRow["fname"] ?></td>
                                <td><?php echo $userRow["lname"] ?></td>
                                <?php 
                                if($userRow["image"] == ""){
                                    ?>
                                    <td><img src="../image/user-images/dummy-user.png" alt="user image" class="mx-auto rounded-circle user-image-table"></td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td><img src="<?php echo $userRow["image"] ?>" alt="user image" class="mx-auto rounded-circle user-image-table"></td>
                                    <?php
                                }
                                ?>
                                <td><?php echo $userRow["email"] ?></td>
                                <td><?php echo $userRow["cno"] ?></td>
                                <td><?php echo $userRow["address"] ?></td>
                                <td><?php echo $userRow["profession"] ?></td>
                                <td><?php echo $userRow["username"] ?></td>
                                <td>
                                    <input type="button" id="edit_<?php echo $userID ?>" class="text-decoration-none btn btn-outline-warning" value="EDIT" >
                                </td>
                                <td>
                                    <input type="button" id="delete_<?php echo $userID ?>" class="text-decoration-none btn btn-outline-danger" value="DELETE" >
                                </td>
                            </tr>
                            <script>
                                $(document).ready(()=>{
                                    $('#edit_<?php echo $userID ?>').on('click',(e)=>{
                                        e.preventDefault();
                                        
                                        window.location.href = './editUser.php?user=<?php echo $userID ?>';
                                    })
                                    $('#delete_<?php echo $userID ?>').on('click',(e)=>{
                                        e.preventDefault();
                                        $.ajax({
                                            type:'DELETE',
                                            url:'../controller/deleteUserController.php?user=<?php echo $userID ?>',
                                            dataType:'json',
                                            cache:false,
                                            processData:false,
                                            contentType:false,
                                            beforeSend:(data)=>{
                                                console.log(data);
                                            },
                                            success:(data)=>{
                                                // let item = JSON.parse(data);
                                                // console.log(data);
                                                if(data.status == 1){
                                                    console.log(data.status);
                                                    $('#msg').addClass('col-lg-6 mx-auto bg-success text-center text-light border-danger my-4 fw-bold py-3');
                                                    $('#msg').text(atob(data.msg));
                                                    window.location.reload();
                                                    $(window).scrollTop(0);
                                                }
                                                else{
                                                    console.log(data.status);
                                                    $('#msg').addClass('col-lg-6 mx-auto bg-success text-center text-light border-danger my-4 fw-bold py-3');
                                                    $('#msg').text(atob(data.msg));
                                                    window.location.reload();
                                                    $(window).scrollTop(0);
                                                }
                                            },
                                            error:(data)=>{
                                                console.log(data);
                                            },
                                        });
                                    });
                                });
                            </script>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section>
        <!--pagination-->
        <div class="container">
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <ul class="d-inline-flex">
                        <?php
                        if($page > 1){
                        ?>
                        <li class="list-group-item border-0 p-0">
                            <a class="text-decoration-none d-block text-light btn btn-dark mx-2" href="home.php?status=user_loged_in&page=<?php echo $page - 1; ?>">Priviuce<a>
                        </li>
                        <?php
                        }
                        ?>
                        
                        <?php
                        // echo $allVCURows;
                        $totalPage = ceil($row/$numberPerPages);
                        // echo $totalPage;
                        
                        for($i=1; $i <= $totalPage; $i++){
                            if($i == 1){
                                continue;
                            }
                        ?>
                        <li class="list-group-item border-0 p-0">
                            <a class="text-decoration-none d-block text-light btn btn-dark mx-2" href="home.php?status=user_loged_in&page=<?php echo $i; ?>"><?php echo $i; ?><a>
                        </li>
                        <?php
                            if($i == $totalPage - 1){
                                break;
                            }
                        }
                        ?>
                        <?php
                        if($page < $totalPage){
                        ?>
                        <li class="list-group-item border-0 p-0">
                            <a class="text-decoration-none d-block text-light btn btn-dark mx-2" href="home.php?status=user_loged_in&page=<?php echo $page + 1; ?>">Next<a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
        <?php
    }else{
        ?>
        <h1 class="display-1 fw-blod">Home</h1>
        <?php
    }
    ?>
</body>
<?php include("../common/bottom.php") ?>
<script type="text/javascript" src="../js/homeAjax.js"></script>
<!-- <script type="text/javascript" src="../js/home.js"></script> -->
</html>