function enviarCorreo(){
    $.post("enviar.php",
    {
        correo:$("#el_correo").val()
    });
    //window.alert(result);
}
