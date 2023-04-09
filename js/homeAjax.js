$(document).ready(()=>{
    $.ajax({
        type:'GET',
        url:'../controller/homeController.php?status=user_loged_in&page=1',
        dataType:'html',
        cache:false,
        processData:false,
        contentType:false,
        success:(data)=>{
            // let respond = $.trim(data);
            // let item = JSON.stringify(respond);;
            // item = jQuery.parseJSON(respond);
            // console.log(item);
            $('#tbody').html(data);
        },
        error:(data)=>{

        }
    });
});

                                