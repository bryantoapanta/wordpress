//FUNCION MODIFICAR CONEXION

$(document).on('click', '.btn_categoria', function () { //al pulsar una tecla en el buscador ejecutamos la funcion 

    //alert($(this).text());
    //$("#resultado").html("");
    $.ajax({
        url: '?accion=mostrarLinks', //llamamos a la funcion
        type: 'POST', //se lo pasamos por POST
        dataType: 'html', //tipo HTML
        data: { categoria: $(this).text() }, //le pasamos el parametro id 
    })

        .done(function (resultado) {
            //$(".container").addClass('disabledbutton');//le añado una clase donde inhabilito las funciones del div
            //  $(".container").fadeTo('slow', .1);//oscurecemos el div 
            $("#categoria-div").addClass('disabledbutton');//le añado una clase donde inhabilito las funciones del div
            $(".body").fadeTo('slow', .1);//oscurecemos el div 
            $("#categoria-div").before(resultado); //en el div #resultado le metemos lo que nos devuelva el php
            $("#links").css("top", "20vh");
        });

}
);


/* FUNCION VOLVER ------------- */

$(document).on("click", ".volver", (function () {

    $("#links").remove(); // dejamos en blanco el div_ajax
    $(".body").fadeTo('slow', 1);//oscurecemos el div 
    $("#categoria-div").removeClass('disabledbutton');

}));