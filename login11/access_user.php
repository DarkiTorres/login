<?php    
    /* ------------------------------------------- */
    // Cláusula de Sesion 
    SESSION_START();
    
    if (isset($_SESSION['nivel'])){
        $nivel_sesion = $_SESSION['nivel'];
        if ($nivel_sesion != 0){
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

	<title> Validacion nivel 0</title>

</head>
<body onload='funcionUser()'>

    <h1>Usuario</h1>     

    </form>
    <br>
    <div id="tablaUsuarios"><b>[ La informacion de la persona se mostrara aqui (User)]</b></div>
    <br>

    <div>
        <input type="button" name="btnCerrarSesion" value="Cerrar Sesion" onclick="location.href='sesionCerrar.php'">
    </div>
</body>
</html>