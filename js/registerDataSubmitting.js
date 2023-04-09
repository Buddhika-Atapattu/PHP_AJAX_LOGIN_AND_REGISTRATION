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

        let fname = $('#fname').val();
        let lname = $('#lname').val();
        let email = $('#email').val();
        let cno = $('#cno').val();
        let address = $('#address').val();
        let profession = $('#profession').val();
        let pw = $('#pw').val();
        let cpw = $('#cpw').val();

        $(window).scrollTop(0);

        if(fname == ""){
            let msg = "First name cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            return false
        }
        if(lname == ""){
            let msg = "Last name cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            return false
        }
        if(email == ""){
            let msg = "Email cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            return false
        }
        if(cno == ""){
            let msg = "Contact number cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            return false
        }
        if(address == ""){
            let msg = "Address cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            return false
        }
        if(profession == ""){
            let msg = "Profession cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            return false
        }
        if(pw == ""){
            let msg = "Password cannot be empty!";
            $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
            $("#msg").text(msg);
            return false
        }
    });
});