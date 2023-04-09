<?php
include("../common/checking_session.php");
if(isset($_GET["user"]) && isset($_SESSION['user'])){
    $id = $_GET["user"];

    include("../common/header.php"); 
    
    include("../model/editUserModel.php");

    $userModel = new User();
    
    $user = $userModel->editUser($id);
    $userRow = $user->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../common/header.php"); ?>
    <style><?php include("../css/user.css") ?></style>
    <title>Project</title>
</head>
<body>
    <section id="section_01">
        <?php include('../common/navbar.php'); ?>
    </section>
    <section id="section_02">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card mt-4">
                        <div id="msg"></div>
                        <?php
                        if(isset($_GET['error_message'])){
                            $msg = base64_decode($_GET['error_message']);
                            ?>
                            <div class="card-header bg-danger text-center text-light border-danger" autocomplete="on">
                                <strong><?php echo $msg; ?></strong>
                            </div>
                            <?php
                        }
                        if(isset($_GET['success_message'])){
                            $msg = base64_decode($_GET['success_message']);
                            ?>
                            <div class="card-header bg-success text-center text-light border-danger" autocomplete="on">
                                <strong><?php echo $msg; ?></strong>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="card-body">
                        <!--  -->
                            <form action="../controller/editUserController.php?status=edit_user&user=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label for="image" class="btn p-0 d-flex justify-content-center">
                                        <?php
                                            if($userRow["image"] == ""){
                                            ?>
                                            <img src="../image/user-images/dummy-user.png" id="pre_image" alt="user dummy image" class="rounded-circle mx-auto user-image">
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <img src="<?php echo $userRow["image"]; ?>" id="pre_image" alt="user image" class="rounded-circle mx-auto user-image">
                                            <?php
                                            }
                                        ?>
                                        
                                    </label>
                                    <input type="file" name="image" id="image" class="d-none" accept="image/*">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="fname">First name</label>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your first name" autocomplete="on" value="<?php echo $userRow["fname"] ?>">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="lname">Last name</label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your last name" autocomplete="on" value="<?php echo $userRow["lname"] ?>">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email" autocomplete="on" value="<?php echo $userRow["email"] ?>">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="cno">Contact number</label>
                                    <input type="text" name="cno" id="cno" class="form-control" placeholder="Enter your contact number" autocomplete="on" value="<?php echo $userRow["cno"] ?>">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address" autocomplete="on" value="<?php echo $userRow["address"] ?>">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="profession">Profession</label>
                                    <input type="text" name="profession" id="profession" class="form-control" placeholder="Enter your profession" autocomplete="on" value="<?php echo $userRow["profession"] ?>">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" autocomplete="on" value="<?php echo $userRow["username"] ?>">
                                </div>
                                <div class="d-flex justify-content-center mb-3">
                                    <input type="submit" value="Update" class="btn btn-outline-primary px-5 rounded-pill">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include("../common/bottom.php") ?>
<script src="../js/userUpdate.js"></script>
<!-- <script>
    $(document).ready(()=>{
        $('form').submit((e)=>{
            e.preventDefault();
            
            var image = $("#image")[0].files[0];
            var fname = $("#fname").val();
            var lname = $('#lname').val();
            var email = $('#email').val();
            var cno = $('#cno').val();
            var address = $('#address').val();
            var profession = $('#profession').val();
            var username = $('#username').val();

            

            $.ajax({
                type:'POST',
                url:'../controller/editUserController.php?status=edit_user&user=<?php echo $id; ?>',
                data: new FormData(this),
                // dataType:'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:(data)=>{
                    console.log("before => "+data);
                    $("#msg").addClass("card-header bg-info text-center text-light fw-bolder");
                    $("#msg").text("Sending...");
                },
                success:(data)=>{
                    var item = JSON.parse(data);
                    // console.log("success => "+item.status);
                    if(item.status == 1){
                        $("#msg").addClass("card-header bg-success text-center text-light fw-bolder");
                        $("#msg").text(item.message);
                        $('form').get(0).reset();
                        $('#pre_image').attr('src',"../image/user-images/dummy-user.png");
                        $(window).scrollTop(0);
                    }
                    else{
                        $("#msg").addClass("card-header bg-danger text-center text-light fw-bolder");
                        $("#msg").text(item.message);
                        $(window).scrollTop(0);
                    }

                },
                error:(data)=>{
                    $("#msg").addClass("card-header bg-danger text-center text-light fw-bolder");
                    $("#msg").text("Error");
                    console.log("error => "+data);
                }
            });
        });
    });
</script> -->
</html>
<?php
}
?>