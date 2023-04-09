// form submiting
$("form").submit(function(){

    let fname = $('#fname').val();
    let lname = $('#lname').val();
    let email = $('#email').val();
    let cno = $('#cno').val();
    let address = $('#address').val();
    let profession = $('#profession').val();
    let pw = $('#pw').val();
    let cpw = $('#cpw').val();
    let image_ext = $("#image")[0].files[0].name.split('.');
    image_ext = image_ext[image_ext.length-1].toLowerCase();
    image_ext = toString(image_ext);
    let allow_array = ['jpg','png','jpeg','gif','jfif'];
    let protocal = location.protocol;
    let hostname = location.host;

    alert(hostname);

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
    if(cpw == ""){
        let msg = "Confirm password cannot be empty!";
        $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
        $("#msg").text(msg);
        return false
    }
    if(cpw !== pw){
        let msg = "Confirm password and password has to match!";
        $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
        $("#msg").text(msg);
        return false
    }
    if(!jQuery.inArray(image_ext,allow_array)){
        let msg = "Selected image type has to be jpg, png, jpeg, gif ro jfif!";
        $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
        $("#msg").text(msg);
        return false
    }
    if(!validateEmail(email)){
        let msg = "Type valid email!";
        $("#msg").addClass("card-header bg-danger text-center text-light border-danger fw-bolder");
        $("#msg").text(msg);
        return false
    }

    if(($('input[type=text]').val() !== "") && ($('input[type=email]').val() !== "") && ($('input[type=password]').val() !== "")){
        alert("hi");

        $.ajax({
            type:"POST",
            url : "../controller/registerController.php?status=register_user",
            data: new FormData(this),
            dataType:'json',
            contentType: false,
            cache:false,
            processData:false,
            beforeSend: function(){
                $("#msg").addClass("card-header bg-info text-center text-light fw-bolder");
                $("#msg").text("Sending...");
            },
            success: function(data){
                let item = JSON.parse(data);
                console.log(item);
                console.log(data);
                window.location = protocal+"//"+hostname+"/view/login.php";
            },
            error:function(data){
                $("#msg").addClass("card-header bg-danger text-center text-light fw-bolder");
                $("#msg").text("Error");
                console.log(data)
            }
        }); 

    }

});