$(document).ready(function(){

    $("#pw_visible_btn").on("click",function(){
        let pw_type = $("#pw").attr("type");
        if(pw_type == "password"){
            $("#pw").attr("type","text");
            $("#pw_visible_btn").html('<i class="fa fa-eye-slash"></i>');
        }
        else{
            $("#pw").attr("type","password");
            $("#pw_visible_btn").html('<i class="fa fa-eye"></i>');
        }
    });

    $('form').submit(function(e){

        e.preventDefault();

        var username = $("#username").val();

        var pw = $("#pw").val();

        var protocal = location.protocol;
        var hostname = location.host;

        if(username == ""){
            let msg = "Username cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }
        var patfname = /^[a-zA-Z ]*$/;
        if(!username.match(patfname)){
            let msg = "Username invalid!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }
        if(pw == ""){
            let msg = "Password cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }

        $.ajax({
            type:'POST',
            url:'../controller/loginController.php?status=login_user',
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
                    window.location = protocal+"//"+hostname+"/test-project"+item.message;
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