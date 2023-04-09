<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../common/header.php"); ?>
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
                        <!-- action="../controller/loginController.php?status=login_user" -->
                            <form  method="post" enctype="multipart/form-data">
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
                                <div class="d-flex justify-content-center mb-3">
                                    <input type="submit" value="Login" class="btn btn-outline-primary px-5 rounded-pill">
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
<script src="../js/login.js"></script>
</html>