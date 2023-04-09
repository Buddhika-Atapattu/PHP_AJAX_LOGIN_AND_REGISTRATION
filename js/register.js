$(document).ready(function(){
    // image per veiw
    $("#image").on('change',function(){
        let image = this.files[0];
        let image_ext = $("#image")[0].files[0].name.split('.');
        image_ext = image_ext[image_ext.length-1].toLowerCase();
        image_ext = toString(image_ext);
        let allow_array = ['jpg','png','jpeg','gif','jfif'];
        // console.log(image_ext);
        
        if(image){
            let reader = new FileReader();
            reader.onload = function(){
                $('#pre_image').attr('src',reader.result);
            }
            reader.readAsDataURL(image); 
        }
        
    });

    // password into text 
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
    $("#cpw_visible_btn").on("click",function(){
        let cpw_type = $("#cpw").attr("type");
        if(cpw_type == "password"){
            $("#cpw").attr("type","text");
            $("#cpw_visible_btn").html('<i class="fa fa-eye-slash"></i>');
        }
        else{
            $("#cpw").attr("type","password");
            $("#cpw_visible_btn").html('<i class="fa fa-eye"></i>');
        }
    }); 

    $('form').submit(function(e){

        e.preventDefault();

        var fname = $("#fname").val();
        var lname = $('#lname').val();
        var email = $('#email').val();
        var cno = $('#cno').val();
        var address = $('#address').val();
        var profession = $('#profession').val();
        var username = $('#username').val();
        var pw = $('#pw').val();
        var cpw = $('#cpw').val();
        var protocal = location.protocol;
        var hostname = location.host;

        if($("#image").get(0).files.length !== 0){
            var image_ext = $("#image")[0].files[0].name.split('.');
            image_ext = image_ext[image_ext.length-1].toLowerCase();
            image_ext = toString(image_ext);
            var allow_array = ['jpg','png','jpeg','gif','jfif'];

            if(!jQuery.inArray(image_ext,allow_array)){
                let msg = "Selected image type has to be jpg, png, jpeg, gif ro jfif!";
                $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
                $("#msg").text(msg);
                $(window).scrollTop(0);
                return false;
            }
        }

        if(fname == ""){
            let msg = "First name cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        //fname
        var patfname = /^[a-zA-Z ]*$/;
        if(!fname.match(patfname)){
            let msg = "First name invalid!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        if(lname == ""){
            let msg = "Last name cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        //lname
        var patlname = /^[a-zA-Z ]*$/;
        if(!lname.match(patlname)){
            let msg = "Last name invalid!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        if(email == ""){
            let msg = "Email cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        // email validation regular expression validation
         var patemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;

         if(!email.match(patemail))
         {
            console.log(email);
             let msg = "Email is invalid!";
             $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
             $("#msg").text(msg);
             $(window).scrollTop(0);
             return false;
 
         }
        if(cno == ""){
            let msg = "Contact number cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        //   conact number validation
        var patcno=/^\+971[0-9]{9}$/;
        if(!cno.match(patcno)){
            let msg = "Contact number invalid!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        if(address == ""){
            let msg = "Address cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        if(profession == ""){
            let msg = "Profession cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        if(pw == ""){
            let msg = "Password cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        if(cpw == ""){
            let msg = "Confirm password cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        if(cpw !== pw){
            let msg = "Confirm password and password has to match!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        if(username !== ""){
            let msg = "Username cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }
        var patusername=/^[a-zA-Z0-9_\.\-]*$/;
        if(!username.match(patusername)){
            let msg = "Username cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false;
        }

        $.ajax({
            type:'POST',
            url:'../controller/registerController.php?status=register_user',
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
                    $("#msg").text(window.atob(item.message));
                    $('form').get(0).reset();
                    $('#pre_image').attr('src',"../image/user-images/dummy-user.png");
                    $(window).scrollTop(0);
                }
                else{
                    $("#msg").addClass("card-header bg-danger text-center text-light fw-bolder");
                    $("#msg").text(window.atob(item.message));
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