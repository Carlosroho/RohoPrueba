$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

function check() {
   event.preventDefault();
    $.ajax({
        url:'/login',
        method: 'POST',
        data: {
            username: $('#username').val(),
            password: $('#password').val()
        },
        success: function(data) {
            if(data.error){
                $.jGrowl(data.message);
            }
            else{
                $.jGrowl(data.message);
            }
        },
        error: function(data) {}
    });
}


function add() {
    event.preventDefault();
     $.ajax({
         url:'/register',
         method: 'POST',
         data: {
             username: $('#username2').val(),
             password: $('#password2').val(),
            // passwordconfirm: $('#confirm-password').val()
         },
         success: function(data) {
           
            $.jGrowl(data.message);
           
         },
         error: function(data) {}
     });
 }
 function search() {
     
     event.preventDefault();
     $('#mytable').remove();

        var tabla = '<table class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive table-hover" align="center" id="mytable"><tr><th><h4 align="center">Tabla De Usuarios</h4></th></tr><tr><th>Id</th><th>Usuario</th><th>Contraseña</th><th>Acción</th></tr></table>';
        $('#place').html(tabla);
     
     //$('#mytable').DataTable().clear();
     $.ajax({
        url:'/load',
        method: 'POST',
        success: function(data) {
           
            $.each(data.data, function( i, val ) {
                $( '#' + i ).append( document.createTextNode( ' - ' + val ) );
                //console.log(val);
                
                var nuevaFila = "<tr><td>" + val["user_id"] + "</td><td>"+ val["username"] +"</td><td>"+ val["password"] + "</td><td><input type='button' onclick='update(" + val["user_id"] + ")' class='btn btn-success' value='actualizar'/><input type='button' onclick='remove("+ val["user_id"] +")' class='btn btn-danger' value='Borrar'/></td></tr>"
                $('#mytable').append(nuevaFila);
               // document.getElementById("mytable").appendChild(node);
              });

            //$('#userData').html(data);
        },
        error: function(data) {}
    });

 }

function remove(index){
    event.preventDefault();
    $.ajax({
        url:'/removeUser',
        method: 'POST',
        data: {
            user_id:index
        },
        success: function(data) {
            search();
            $.jGrowl(data.message);
        },
        error: function(data) {}
    });

}
function update(index){
    event.preventDefault();
$("#myModal").modal("show");

document.getElementById("iddd").value = index;
document.getElementById("changeduser").value = '';
document.getElementById("changedpass").value = '';

 
//$("#close").click(function(){
 //   $("#myModal").modal("hide");
//});

//$("#myModal").on('hidden.bs.modal', function () {

   


//});

}



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
        error: function(data) {}
    });

}


