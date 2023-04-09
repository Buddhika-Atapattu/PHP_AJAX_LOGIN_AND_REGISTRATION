<?php
if((isset($_SESSION["user"]))){
    include("../common/bottom.php");
    $userArray = $_SESSION["user"];
?>

<script>
    $(document).ready(function(){
        let user_id = <?php echo $userArray['id']; ?>;
        $.ajax({
            type:"GET",
            url:'../controller/userController.php?user_id='+user_id,
            data: {'user_id':user_id},
            // dataType:'json',
            contentType: false,
            cache:false,
            processData:false,
            success: function(data){
                let item = JSON.parse(data);
                $.each(data.item,function(key,val){
                    if(data.status === 1){
                        console.log("ok");
                    }
                    else{
                        console.log("no");
                    }
                })
                // $('#user_image').html(data);
                
                console.log();
                $("#user_image").attr('src',item.image);
                
            },
            error:function(){
                console.log("error");
            }
        });
    })
</script>
<style><?php include("../css/user.css") ?></style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../view/home.php?status=user_loged_in&page=1">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item d-flex justify-content-end me-2">
                <?php
                if($userArray["image"] == ""){
                    ?>
                    <img src="../image/user-images/dummy-user.png" alt="User image" class="rounded-circle user-image-nav">
                    <?php
                }
                else{
                    ?>
                    <?php echo $userArray["image"]; ?>
                    <!-- <div id="user_image"></div> -->
                    <img src="" alt="user image" id="user_image" class="rounded-circle mx-auto user-image-nav">
                    <?php
                }
                ?>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" id="logout" href="../view/profile.php?user=<?php echo $userArray["id"] ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $userArray["fname"]." ".$userArray["lname"] ?>
                </a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" id="logout" href="../controller/logout.php?status=logout" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>


<?php
}
else{
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../view/home.php">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="../view/login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../view/register.php">Register</a>
            </li>
        </ul>
    </div>
</nav>
    <?php
}
?>
