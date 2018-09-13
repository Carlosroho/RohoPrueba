function updateUser(){
    event.preventDefault();

    $.ajax({
        url:'/updateUser',
        method: 'POST',
        data: {
            username: $('#changeduser').val(),
            password: $('#changedpass').val(),
            user_id: $('#iddd').val(),
        },
        success: function(data) {
       // $("#myModal").modal("hide");
       $.jGrowl(data.message);
           search();
        },
        error: function(data) {

        }
    });

}