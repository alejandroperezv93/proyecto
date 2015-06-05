

$(document).ready(function(){
    $('#archivoscompartidos').hide();
    $('#resultado2').hide();
    $('#archivoseliminados').hide();


    $('#compartido').click(function(){
        $('#archivos').hide("slow");
        $('#archivoseliminados').hide();
        $('#archivoscompartidos').show();

    });
    $('#mis_archivos').click(function(){
        $('#archivos').show("slow");
        $('#archivoscompartidos').hide();
        $('#archivoseliminados').hide();

    });
    $('#papelera').click(function(){
        $('#archivos').hide("slow");
        $('#archivoscompartidos').hide();
        $('#archivoseliminados').show();

    });
    $('.boton1').click(presionSubmit);


});


function presionSubmit(){




        var text =$(this).val();


    $.ajax({
        url: "bundles/tuser/votar.php", //url de donde obtener los datos
        dataType: 'json', //tipo de datos retornados
        data:"numero=" + text,
        contentType: "application/x-www-form-urlencoded",
        type: 'post' //enviar variables como post
    }).done(function (data){
        var json_string = JSON.stringify(data);

        //convertir el texto a un nuevo objeto
        var obj = $.parseJSON(json_string);

        $('#resultado2').append(obj.nombre);



    });





}