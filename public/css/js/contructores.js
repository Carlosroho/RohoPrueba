function cruck(){
    event.preventDefault();
  

    $.ajax({
        url:'/addGym',
        method: 'POST',
        data: {
            temp: $('#ttt').val(),
            name: $('#gym').val(),
        },
        success: function(data) {
       $.jGrowl(data);        
        },
        error: function(data) {
        }
    });

}



function error(){
    event.preventDefault();
    var type ='error';

    $.ajax({
        url:'/addBlock',
        method: 'POST',
        data: {
            error: type,
        },
        success: function(data) {
       // $("#myModal").modal("hide");
       $.jGrowl(data); 
        },
        error: function(data) {
        }
    });

}



function logdev(){
    event.preventDefault();
  

    $.ajax({
        url:'/logdev',
        method: 'POST',
        data: {
            userconfirm: $('#usua').val(),
            passconfirm: $('#pas').val(),
        },
        success: function(data) {
             $.jGrowl(data.message);
        },
        error: function(data) {
        }
    });

}


function loadBit(){
    event.preventDefault();
    $('#mybit').remove();
       var tabla = '<table class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive " align="center" id="mybit"><tr><th><h4 align="center">Bitacora de Errores</h4></th></tr><tr><th>Accion</th><th>Lugar</th><th>Fecha y Hora</th</tr></table>';
       $('#tablebit').html(tabla);
    
    $.ajax({
       url:'/adjust',
       method: 'POST',
       data: {
        username: $('#usubit').val(),
        stday: $('#stday').val(),
        enday: $('#enday').val()

        },
       success: function(data) {
          
         $.each(data.data, function( i, val ) {
              $( '#' + i ).append( document.createTextNode( ' - ' + val ) );
               var nuevaFila = "<tr><td>"  + val["action"] + "</td><td>"+ val["where"] +"</td><td>"+ val["created_at"] + "</td></tr>"
               $('#mybit').append(nuevaFila);
  
             });

           $.jGrowl(data.message);
       },
       error: function(data) {}
   });

}