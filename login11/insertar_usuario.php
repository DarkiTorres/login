<?php
$usu = $_POST['usu'];
$pass = $_POST['pass'];
$cor = $_POST['cor'];
$nivel = $_POST['nivel'];

echo "<script>alert('$nivel');</script>";

$password_hash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);

$con = mysqli_connect('localhost','master','1234');
 if (!$con){
    die('No se pudo conectar: ' . mysqli_error($con)); 
 }
 mysqli_select_db($con,'mi_bd'); 
 $sql="INSERT into usuarios(usuario, password, correo, nivel) values('".$usu."','".$password_hash."','".$cor."',".$nivel.")";
 $result = mysqli_query($con,$sql); 
 mysqli_close($con);
?>