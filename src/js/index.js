$(document).on('submit','#inicioSesion', function(event){
    console.log("evento desencadenado");
    event.preventDefault();
    $.ajax({
        url:'php/inicioSesion.php',
        type:'POST',
        dataType:'json',
        data:$(this).serialize(),
        beforeSend:function(){
            $('#error').removeClass('alert alert-danger');
            $('#error').empty();
        }
    }).done(function(respuesta){
        console.log(respuesta.tipo);
        if(respuesta.tipo.includes("1")==true){
            location.href='inicio.php';
        }else{
            $('#error').addClass('alert alert-danger');
            $('#error').html(respuesta.tipo);
        };
    });
});

$('#logout').click( function(event){
    event.preventDefault();
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