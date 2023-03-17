<?php
    $con = mysqli_connect('localhost', 'master', '1234');
    $usu = $_POST['usu'];

    if (!$con)
    {
        die('No se pudo conectar: ' . mysqli_error($con));
    }
    mysqli_select_db($con, 'mi_bd');
    $sql="DELETE FROM usuarios Where usuario='".$usu."'";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>