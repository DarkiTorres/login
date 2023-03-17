<?php    
    /* ------------------------------------------- */
    // Cláusula de Sesion 
    SESSION_START();
    
    if (isset($_SESSION['nivel'])){
        $nivel_sesion = $_SESSION['nivel'];
        if ($nivel_sesion == 1){
            header("Location: access_admin.php");
            exit();
        }
		if ($nivel_sesion == 0){
            header("Location: access_user.php");
            exit();
        }
    } 
	if (isset($_SESSION['error'])){
		$error_message = $_SESSION['error'];
		unset($_SESSION['error']); 
		echo "<script>alert('$error_message');</script>";
	}
	
    
    /* ------------------------------------------- */
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="./JQuery-3.6.3/jquery-3.6.3.min.js" type="application/javascript"></script>
	<script type="text/javascript" src="./js/scriptIndex.js" type="application/javascript"></script>
	<link rel="stylesheet" href="estilo.css">


	<title> Login </title>

</head>

<body>
	<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

	<div align="center">
		<form id="formulario" method="Post" action="validar_usuario.php">
			<h1 align="center">Login</h1>

			<label for="username">Username</label> 
			<input type="text" placeholder="Usuario" name="usuario" id="mi_usuario"> <br>

			<label for="password">Password</label>
			<input type="text" placeholder="Contraseña"name="password" id="mi_password"> <br><br>

			
			<a href="quien_soy.html">¿Quien soy?</a>
			<br><br>
			<input  type="submit" name="boton" value="Entrar">
			<br><br>
			<!--<input  type="button" name="botonC" value="Cifrar" onclick="return funcionCifrar()">-->
			<br>
			
			<div class="tamaño" align="center" id="lugarCifrado"></div>
		</form>
	</div>
	<br>
	<br>
</body>
</html>