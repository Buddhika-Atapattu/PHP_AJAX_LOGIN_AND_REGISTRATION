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

    let row = $("#row").val();

    $("#delete").click(()=>{
        alert('hi');
    })

    for(let i = 1; i <= row ; i++){
        
        let button = "#delete_"+i;
        button = String(button);
        
        console.log(button)
        $('#delete').click(()=>{

            alert('hi');
            // $.ajax({
            //     type:'DELETE',
            //     url:'../controller/homeController.php?status=user_loged_in&page=1',
            //     dataType:'text',
            //     cache:false,
            //     processData:false,
            //     contentType:false,
            //     success:(data)=>{
            //         $('#tbody').html(data);
            //     },
            //     error:(data)=>{
        
            //     }
            // });
        });
    }
});

                                