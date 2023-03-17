/* ------------------------------------ MÉTODO CIFRAR ------------------------------------ */
function funcionCifrar() {
    var clave = document.getElementById('mi_password').value;
    cifrarPassword(clave);
}

function cifrarPassword(clave){
    // AJAX
    $.ajax({
           type: "GET",
           url: "cifrar.php",
           data: {password:clave},  

           success: function (respuesta) {
               $("#lugarCifrado").html(respuesta);
           },
           
           error: function (e) {
               $("#lugarCifrado").text("error:"+e.status+"error:"+e.statusText);
           }
       }); 
}
/* --------------------------------------------------------------------------------------- */

/* ------------------------------------- TABLA ADMIN ------------------------------------- */
function funcionAdmin() { 
    var usuario = document.getElementById('mi_usu').value;
    llenarTablaAdmin(usuario);
}

function llenarTablaAdmin(usuario){ 
    $.ajax({
        type: "GET",
        url: "mostrar_usuariosAdmin.php",
        data: {usu:usuario},  

        success: function (respuesta) {
            $("#tablaUsuarios").html(respuesta);
        },
        
        error: function (e) {
            $("#tablaUsuarios").text("error:"+e.status+"error:"+e.statusText);
        }
    }); 
}
/* --------------------------------------------------------------------------------------- */

/* ------------------------------------- TABLA USER -------------------------------------- */
function funcionUser() {
    $.get("mostrar_usuariosUser.php", function (respuesta, status) {
        $("#tablaUsuarios").html(respuesta);
    });
}
/* --------------------------------------------------------------------------------------- */

function insertarUsuario(){
    var nivox = document.getElementById('esAdmin').checked;
    var niv;
    if (nivox == true){
        niv = 1;
    } else{
        niv = 0;
    }
    
    $.post("insertar_usuario.php",
        {
        usu:$("#mi_usu").val(),
        pass:$("#mi_pass").val(),
        cor:$("#mi_cor").val(),
        nivel:niv
    });
}

function borrarUsuario(){
    $.post("borrar_usuario.php",
    {
        usu:$("#mi_usu").val()
    });
}
