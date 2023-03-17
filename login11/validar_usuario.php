<?php
    //Sesion
    session_start();
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];                
    
    $con = mysqli_connect('localhost','master','1234');

    if (!$con) {
        die('No se pudo conectar: ' . mysqli_error($con));                                        
    }
    
    mysqli_select_db($con,'mi_bd'); 

    $sql="SELECT * FROM usuarios WHERE usuario = '".$usuario."'";
    $result = mysqli_query($con,$sql);      

    $row = mysqli_fetch_array($result);

    $index = "index.php";
    if ($row == null){
        //Declaración de Datos Incorrectos
        $_SESSION['error'] = "Usuario no registrado";

        header("Location: $index");
        exit();
    }
    else{
        if(password_verify($password,$row['password'])){
            //Declaración de Variable de Sesion
            $_SESSION['nivel'] = $row['nivel'];
            $valor_sesion = $_SESSION['nivel'];

            if($valor_sesion == 1){
                header("Location: access_admin.php");
                exit();
            }
            else if($valor_sesion == 0){
                header("Location: access_user.php");
                exit();
            }
            else{
                header("Location: $index");
                exit();
            }
            echo 'contraseña correcta';
        } else{
            //Declaración de Datos Incorrectos
            $_SESSION['error'] = "Contraseña Incorrecta";

            header("Location: $index");
            exit();
        }
    }

    mysqli_close($con);

?>