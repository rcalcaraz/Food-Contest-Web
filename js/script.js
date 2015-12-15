function alertas(mensajes) {
      while(mensajes.length>0){
         $("body").append("<div id='top'><div class='alert alert-warning alert-dismissible' role='alert'>" + mensajes.pop() + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>");
         mensajes.pop();
      }
      mensajes.splice(0, mensajes.length);
}

$(document).ready(function () {

    // Badge ingrediente
    var ingredienteBadgePrincipio = "<button class = 'ingrediente btn btn-primary botonIngrediente' type = 'button'>"

    var ingredienteBadgeFinal = " <span class='badge'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></span></button>"

    /// Añadir ingrediente seleccionado 
    $("#nuevoIngrediente").click(function () {
        contadorIngredientes = 3;
        var ingrediente = $("#inputIngredientesNuevoPincho").val();
        $("#ingredientesSeleccionados").append(ingredienteBadgePrincipio + ingrediente + ingredienteBadgeFinal);
        // Listener para eliminar ingredientes
        $(".ingrediente").on("click", function () {
            $(this).remove();
        });
    });


    // Ingredientes provisional 
    var ingredientes = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];

    // Autocompletar para ingredientes
    $("#inputIngredientesNuevoPincho").autocomplete({
        source: ingredientes
    });

    // Spinner
    var spinner = $("#spinner").spinner();

    // Datepicker conversion a español
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);

    // Datepicker
    $(function () {
        $("#inputIniciovotacion").datepicker();
        $("#inputFinalvotacionpopular").datepicker();
        $("#inputFinalvotacionprofesional").datepicker();
        $("#inputComienzovotacionfinalistas").datepicker();
        $("#inputFinalvotacionfinalistas").datepicker();
        $("#inputIniciovotacionE").datepicker();
        $("#inputFinalvotacionpopularE").datepicker();
        $("#inputFinalvotacionprofesionalE").datepicker();
        $("#inputComienzovotacionfinalistasE").datepicker();
        $("#inputFinalvotacionfinalistasE").datepicker();
    });

    // Scroll
    $(function () {
        $.scrollIt();
    });

    // Slider
    $('#fc-slideshow').flipshow();
    var $gallery = $('.gallery').flickity({
        cellSelector: 'img',
        imagesLoaded: true,
        percentPosition: false,
        wrapAround: true
    });

    // Flickity
    var $caption = $('.captionFlickity');
    var flkty = $gallery.data('flickity');

    $gallery.on('cellSelect', function () {
        $caption.text(flkty.selectedElement.alt)
    });

});
