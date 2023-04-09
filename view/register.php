<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../common/header.php"); ?>
    <title>Project</title>
    <style><?php include("../css/user.css") ?></style>
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
                            <div class="card-header bg-danger text-center text-light">
                                <strong><?php echo $msg; ?></strong>
                            </div>
                            <?php
                        }
                        if(isset($_GET['success_message'])){
                            $msg = base64_decode($_GET['success_message']);
                            ?>
                            <div class="card-header bg-success text-center text-light" >
                                <strong><?php echo $msg; ?></strong>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="card-body">
                            <!-- action="../controller/registerController.php?status=register_user"  -->
                            <form  method="post" enctype="multipart/form-data" id="registerForm">
                                <div class="form-group mb-3">
                                    <label for="image" class="btn p-0 d-flex justify-content-center">
                                        <img src="../image/user-images/dummy-user.png" id="pre_image" alt="user dummy image" class="w-25 rounded-circle mx-auto user-image">
                                    </label>
                                    <input type="file" name="image" id="image" class="d-none" accept="image/*">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="fname">First name</label>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your first name" autocomplete="on">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="lname">Last name</label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your last name" autocomplete="on">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" autocomplete="on">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="cno">Contact number</label>
                                    <input type="text" name="cno" id="cno" class="form-control" placeholder="Enter your contact number" autocomplete="on">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address" autocomplete="on">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="profession">Profession</label>
                                    <input type="text" name="profession" id="profession" class="form-control" placeholder="Enter your profession" autocomplete="on">
                                </div>
                                <div class="form-geroup mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" autocomplete="on">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pw">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="pw" id="pw" class="form-control" placeholder="Password" autocomplete="on">
                                        <div class="input-group-text" id="pw_visible_btn">
                                            <span id="pw_show" class="btn p-0"><i class="fa fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pw">Confirm password</label>
                                    <div class="input-group">
                                        <input type="password" name="cpw" id="cpw" class="form-control" placeholder="Password" autocomplete="on">
                                        <div class="input-group-text" id="cpw_visible_btn">
                                            <span id="cpw_show" class="btn p-0"><i class="fa fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mb-3">
                                    <input type="submit" value="Submit" class="btn btn-outline-primary px-5 rounded-pill">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include("../common/bottom.php"); ?>
<script type="text/javascript" src="../js/register.js"></script>
<script>
    <?php echo base64_decode("RW1haWwgYWxyYWR5IHRha2VuIQ==")?>
</script>
</html>