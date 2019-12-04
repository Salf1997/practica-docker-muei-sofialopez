$("#inicia").click(function(event){
    var id = $("#usuario").val();
    var pass = $("#password").val();
    var datos = "usuario="+id+"&password="+pass;
    event.preventDefault();
    $.ajax({
        url:'php/inicioSesion.php',
        type:'POST',
        dataType:'json',
        data:datos,
        beforeSend:function(){
            $('#error').removeClass('alert alert-danger');
            $('#error').empty();
        }
    }).done(function(respuesta){
        if(respuesta.tipo.includes("1")==true){
            location.href='inicio.php';
        }else{
            $('#error').addClass('alert alert-danger');
            $('#error').html(respuesta.tipo);
            console.log(respuesta.encontrado);
        };
    }).fail(function(error){
        console.log(error);
        console.log('Ha ocurrido un error');
    });

});

$('#logout').click( function(event){
    $.ajax({
        url:'php/logout.php',
        type:'POST',
        data:"",
    }).done(function(){
        location.href='index.php';
    }).fail(function(){
        console.log('error al cerrar sesión');
    });
});


$('#guarda').click(function(event){
    var id = $("#usuarioN").val();
    var pass = $("#passwordN").val();
    var datos = "usuarioN="+id+"&passwordN="+pass;
    console.log(datos);
   event.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'php/nuevoUsuario.php',
        dataType:'json',
        data: datos,
        beforeSend:function(){
            $('#error').removeClass('alert alert-danger');
            $('#error').removeClass('alert alert-success');
            $('#error').empty();
        }
    }).done(function(respuesta){
	console.log(respuesta);
      if(respuesta.tipo.includes("Error")==true){
	 $('#error2').addClass('alert alert-danger');
         $('#error2').html(respuesta.tipo);
      } else {
	 $('#error2').addClass('alert alert-success');
         $('#error2').html("Registro realizado con éxito");
      }
    }).fail(function( jqXHR, textStatus, errorThrown ) {
    	console.log(jqXHR);
	console.log(textStatus);
	console.log(errorThrown);
    });
});
