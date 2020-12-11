//FUNCION MODIFICAR CONEXION

$(document).on('click', '.btn_categoria', function () { //al pulsar una tecla en el buscador ejecutamos la funcion 

    //alert("hola");
    //$("#resultado").html("");
    $.ajax({
        url: '?accion=mostrarLinks', //llamamos a la funcion
        type: 'POST', //se lo pasamos por POST
        dataType: 'html', //tipo HTML
        data: {}, //le pasamos el parametro id 
    })

        .done(function (resultado) {
            //$(".container").addClass('disabledbutton');//le añado una clase donde inhabilito las funciones del div
            //  $(".container").fadeTo('slow', .1);//oscurecemos el div 
            $("#links").html("hola"); //en el div #resultado le metemos lo que nos devuelva el php
            $("#links").css("top", "40vh");
        });

}
);