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
             password: $('#password2').val()
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

        var tabla = '<table class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive " align="center" id="mytable"><tr><th><h4 align="center">Tabla De Usuarios</h4></th></tr><tr><th>Id</th><th>Usuario</th><th>Contraseña</th><th>Acción</th></tr></table>';
        $('#place').html(tabla);
     
     //$('#mytable').DataTable().clear();
     $.ajax({
        url:'/load',
        method: 'POST',
        success: function(data) {
           
            $.each(data.data, function( i, val ) {
                $( '#' + i ).append( document.createTextNode( ' - ' + val ) );
                //console.log(val);
                
                var nuevaFila = "<tr><td>"  + val["user_id"] + "</td><td>"+ val["username"] +"</td><td>"+ val["password"] + "</td><td><input type='button' onclick='update(" + val["user_id"] + ")' class='btn btn-success' value='actualizar'/><input type='button' onclick='remove("+ val["user_id"] +")' class='btn btn-danger' value='Borrar'/></td></tr>"
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
        error: function(data) {

        }
    });

}


$(function(){$("input[name='photo']").on("change", function(){
    var fileInput = document.getElementById('photo');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
            $.jGrowl('Solo se permiten archivos .jpeg/.jpg/.png/.gif');
            fileInput.value = '';
           
        
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" class="img-thumbnail"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    });
 });


 

 function charge() {
     
    event.preventDefault();
    $('#mytab').remove();

       var tabla = '<table class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive" align="center" id="mytab"><tr><th><h4 align="center">Perfiles</h4></th></tr><tr><th>Photo</th><th>Clave</th><th>Nombre</th><th>Modificar Imagen</th></tr></table>';
       $('#pla').html(tabla);

   // var src='/img/'
    
    //$('#mytable').DataTable().clear();
    $.ajax({
       url:'/charge',
       method: 'POST',
       success: function(data) {
          
           $.each(data.data, function( i, val ) {
               $( '#' + i ).append( document.createTextNode( ' - ' + val ) );
               //console.log(val);
               if(val["photo"]==null){
                var nuevaFila = "<tr><td>No hay Imagen Disponible</td><td>"+ val["user_id"] +"</td><td>"+ val["username"] + "</td><td>Nueva Imagen <form method='POST' action='/updateimg' enctype='multipart/form-data'><input type='file' id='newpicture' name='newpicture'/><input type='hidden' id='id_picture' name='id_picture' value='"+val["user_id"]+"'><input type='submit' class='btn btn-info' value='Actualizar'/></form></td></tr>";
                $('#mytab').append(nuevaFila);
               }else{
                var nuevaFila = "<tr><td> <img src=/img/"+ val["photo"] + " class='img-thumbnail'/></td><td>"+ val["user_id"] +"</td><td>"+ val["username"] +  "</td><td>Nueva Imagen <form method='POST' action='/updateimg' enctype='multipart/form-data'><input type='file' id='newpicture' name='newpicture'/><input type='hidden' id='id_picture' name='id_picture' value='"+val["user_id"]+"'><input type='submit' class='btn btn-info' value='Actualizar'/></form></td></tr>";
                $('#mytab').append(nuevaFila);
               }
               
               
              // document.getElementById("mytable").appendChild(node);
             });

           //$('#userData').html(data);
       },
       error: function(data) {}
   });

}



function chargenew() {
     
    event.preventDefault();
    //$('#mytablita').remove();
    document.getElementById('content').innerHTML=
    "<template class='row col-md-3 col-lg-12' id='usercard'>"+
    "<div class='col-md-3' id='user_card'>"+
        "<h3  id='card_id' align='right'></h3>"+
        "<img id='user_img' src='' alt='Avatar' style='width:100%'>"+
        "<div id='card_container'>"+
            "<h4 id='card_user' align='center'><b></b></h4>"+ 
        "</div>"+
    "</div>"+
    "</template>";

     //  var tabla = '<table class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive table-hover" align="center" id="mytablita"><tr><th><h4 align="center">Perfiles</h4></th></tr><tr><th>Photo</th><th>Clave</th><th>Nombre</th><th>Modificar Imagen</th></tr></table>';
      // $('#pic').html(tabla);

   // var src='/img/'
    
    //$('#mytable').DataTable().clear();
    $.ajax({
       url:'/charge',
       method: 'POST',
       success: function(data) {
          
           $.each(data.data, function( i, val ) {
               $( '#' + i ).append( document.createTextNode( ' - ' + val ));
               //console.log(val);
               if(val["photo"]==null){
                var card = document.getElementsByTagName("template")[0];
                var user_id = card.content.querySelector('#card_id').textContent = val["user_id"];
                var username = card.content.querySelector('#card_user').textContent = val["username"];
                var user_photo = card.content.querySelector('#user_img').src="/img/default.jpg";
                var clone = document.importNode(card.content, true);
                document.getElementById("content").appendChild(clone);

           
               }else{

                var card = document.getElementsByTagName("template")[0];
					var user_id = card.content.querySelector('#card_id').textContent = val["user_id"];
					var username = card.content.querySelector('#card_user').textContent = val["username"];
					var user_photo = card.content.querySelector('#user_img').src="/img/"+val["photo"];
					var clone = document.importNode(card.content, true);
					document.getElementById("content").appendChild(clone);
                
            
               }
               
               
              // document.getElementById("mytable").appendChild(node);
             });

           //$('#userData').html(data);
       },
       error: function(data) {}
   });

}


function orderer() {
     
    event.preventDefault();
    //$('#mytablita').remove();

     //  var tabla = '<table class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive table-hover" align="center" id="mytablita"><tr><th><h4 align="center">Perfiles</h4></th></tr><tr><th>Photo</th><th>Clave</th><th>Nombre</th><th>Modificar Imagen</th></tr></table>';
    $('#pic').html('');

    $.ajax({
       url:'/charge',
       method: 'POST',
       success: function(data) {
           var con =0;
          
          
           $.each(data.data, function( i, val ) {
               $( '#' + i ).append( document.createTextNode( ' - ' + val ));
               //console.log(val);
               
               if(con == 4){
                if(val["photo"]==null){



                    var line= "<div class='clearfix visible-md-block clearfix visible-lg-block'></div>"+
                      "<div class='col-md-3 col-lg-3'>"+
                      "<h1 align='right'>"+ val["user_id"]+"</h1>"+
                          "<div align='center'><img src='/img/default.jpg' alt='Avatar'  class='img-thumbnail'></div>"+
                          "<h2 align='center'>"+val["username"]+"</h2>"+
                        "</div>";
      
      
      
      
                    //  var nuevaFila = "<tr><td>No hay Imagen Disponible</td><td>"+ val["user_id"] +"</td><td>"+ val["username"] + "</td><td>Nueva Imagen <form method='POST' action='/updateimg' enctype='multipart/form-data'><input type='file' id='newpicture' name='newpicture'/><input type='hidden' id='id_picture' name='id_picture' value='"+val["user_id"]+"'><input type='submit' class='btn btn-info' value='Actualizar'/></form></td></tr>";
                      $('#pic').append(line);

                      
      
                     }else{
      
                          
                    var line= "<div class='clearfix visible-md-block clearfix visible-lg-block'></div>"+
                    "<div class='col-md-3 col-lg-3'>"+
                    "<h1 align='right'>"+ val["user_id"]+"</h1>"+
                    "<div align='center'><img src='/img/"+ val["photo"] +  "'alt='Avatar'  class='img-thumbnail'></div>"+
                    "<h2 align='center'>"+val["username"]+"</h2>"+
                    "</div>";
      
                      var nuevaFila = "<tr><td> <img src=/img/"+ val["photo"] + " class='img-thumbnail'/></td><td>"+ val["user_id"] +"</td><td>"+ val["username"] +  "</td><td>Nueva Imagen <form method='POST' action='/updateimg' enctype='multipart/form-data'><input type='file' id='newpicture' name='newpicture'/><input type='hidden' id='id_picture' name='id_picture' value='"+val["user_id"]+"'><input type='submit' class='btn btn-info' value='Actualizar'/></form></td></tr>";
                      $('#pic').append(line);
                  
                     }
                     
                     con = 0;
               }
               else{
                if(val["photo"]==null){



                    var line= "<div class='col-md-3 col-lg-3'>"+
                    "<h1 align='right'>"+ val["user_id"]+"</h1>"+
                    "<div align='center'><img src='/img/default.jpg' alt='Avatar'  class='img-thumbnail'></div>"+      
                        "<h2 align='center'>"+val["username"]+"</h2>"+
                    "</div>";
      
      
      
                    //  var nuevaFila = "<tr><td>No hay Imagen Disponible</td><td>"+ val["user_id"] +"</td><td>"+ val["username"] + "</td><td>Nueva Imagen <form method='POST' action='/updateimg' enctype='multipart/form-data'><input type='file' id='newpicture' name='newpicture'/><input type='hidden' id='id_picture' name='id_picture' value='"+val["user_id"]+"'><input type='submit' class='btn btn-info' value='Actualizar'/></form></td></tr>";
                      $('#pic').append(line);
      
                     }else{
      
                          
                    var line=  "<div class='col-md-3 col-lg-3'>"+
                    "<h1 align='right'>"+ val["user_id"]+"</h1>"+
                    "<div align='center'><img src='/img/"+ val["photo"] +  "'alt='Avatar'  class='img-thumbnail'></div>"+
                    "<h2 align='center'>"+val["username"]+"</h2>"+
                    "</div>";
      
                      var nuevaFila = "<tr><td> <img src=/img/"+ val["photo"] + " class='img-thumbnail'/></td><td>"+ val["user_id"] +"</td><td>"+ val["username"] +  "</td><td>Nueva Imagen <form method='POST' action='/updateimg' enctype='multipart/form-data'><input type='file' id='newpicture' name='newpicture'/><input type='hidden' id='id_picture' name='id_picture' value='"+val["user_id"]+"'><input type='submit' class='btn btn-info' value='Actualizar'/></form></td></tr>";
                      $('#pic').append(line);
                  
                     }
                     
               }
               con ++;
               
               
               
              // document.getElementById("mytable").appendChild(node);
             });

           //$('#userData').html(data);
       },
       error: function(data) {}
   });

}

$(document).ready(function () {
 
    //sobreescribimos el metodo submit para que envie la solicitud por ajax
    $("#leformate").submit(function (e) {

        //esto evita que se haga la petición común, es decir evita que se refresque la pagina
        e.preventDefault();

        //ruta la cual recibira nuestro archivo
    
          
        //FormData es necesario para el envio de archivo, 
        //y de la siguiente manera capturamos todos los elementos del formulario
        var parametros=new FormData($(this)[0])
        
        //realizamos la petición ajax con la función de jquery
        $.ajax({
            url:'/lemark' ,
            type: "POST",
            data: parametros,
            contentType: false, //importante enviar este parametro en false
            processData: false, //importante enviar este parametro en false
            success: function (data) {

                
                   
               alert(data);
            },
            error: function (r) {
                
                alert("Error del servidor");
            }
        });

    })

})