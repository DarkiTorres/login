<?php    
    /* ------------------------------------------- */
    // Cláusula de Sesion 
    SESSION_START();
    
    if (isset($_SESSION['nivel'])){
        $nivel_sesion = $_SESSION['nivel'];
        if ($nivel_sesion != 1){
            header("Location: index.php");
            exit();
        }
    } else{
        header("Location: index.php");
        exit();
    }
    
    /* ------------------------------------------- */
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>

    <script src="./JQuery-3.6.3/jquery-3.6.3.min.js" type="application/javascript"></script>
	<script type="text/javascript" src="./js/scriptIndex.js" type="application/javascript"></script>

	<title> Validacion </title>

</head>



<body onload='funcionAdmin()'>

    <h1>Admin</h1>   

    <form id="mi_formulario" method="Post">

        Usuario: <input type="text" name="usu" id="mi_usu"><br><br>
        Password: <input type="text" name="pass" id="mi_pass"> <br> <br>
        Correo: <input type="text" name="cor" id="mi_cor"> <br> <br>
        <input type="checkbox" name="esAdmin" id="esAdmin" value="esAdmin"> <label>Es Admin</label>
        <br>
        <br>
        <br>
        
        <input type="submit" name="boton" value="Insertar" onclick="return insertarUsuario()">
        <input type="submit" name="boton" value="Borrar" onclick="return borrarUsuario()">
        <input type="button" name="botonConsulta" value="Consulta" onclick="return funcionAdmin()"> 
              
    </form>

    <br> 
    <br>
    
    <div id="tablaUsuarios"><b>[ La informacion de la persona se mostrara aqui (Admin)]</b></div>
    <br>

    <div align="center">
        <input type="button" name="botonVolver" value="Cerrar Sesion" onclick="location.href='sesionCerrar.php'">
    </div>
</body>
</html>