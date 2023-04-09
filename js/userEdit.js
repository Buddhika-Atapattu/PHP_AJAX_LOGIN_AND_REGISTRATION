$(document).ready(function(){
    // image per veiw
    $("#image").on('change',function(){
        let image = this.files[0];
        if(image){
            let reader = new FileReader();
            reader.onload = function(){
                $('#pre_image').attr('src',reader.result);
            }
            reader.readAsDataURL(image); 
        }
        
    });

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

    $("form").submit(function(e){

        e.preventDefault();

        var fname = $("#fname").val();
        var lname = $('#lname').val();
        var email = $('#email').val();
        var cno = $('#cno').val();
        var address = $('#address').val();
        var profession = $('#profession').val();

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
                return false
            }
        }

        if(fname == ""){
            let msg = "First name cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }
        //fname
        var patfname = /^[a-zA-Z ]*$/;
        if(!fname.match(patfname)){
            let msg = "First name invalid!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }
        if(lname == ""){
            let msg = "Last name cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }
        //lname
        var patlname = /^[a-zA-Z ]*$/;
        if(!lname.match(patlname)){
            let msg = "Last name invalid!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }
        if(email == ""){
            let msg = "Email cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
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
             return false
 
         }
        if(cno == ""){
            let msg = "Contact number cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }
        //   conact number validation
        var patcno=/^\+971[0-9]{9}$/;
        if(!cno.match(patcno)){
            let msg = "Contact number invalid!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }
        if(address == ""){
            let msg = "Address cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }
        if(profession == ""){
            let msg = "Profession cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            $(window).scrollTop(0);
            return false
        }
    });
})