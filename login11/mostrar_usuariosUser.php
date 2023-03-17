<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
           
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head>

<body>

<?php    

    $con = mysqli_connect('localhost','master','1234');     

    if (!$con) {
        die('No se pudo conectar: ' . mysqli_error($con));              
    }
    
    mysqli_select_db($con,'mi_bd');
    
     $sql="SELECT * FROM usuarios";   
             
    $result = mysqli_query($con,$sql);                     

    /*************  Genera la tabla respuesta ************************/
    echo "<table>
        <tr>
            <th>Usuario</th>
            <th>Correo</th>   
            <th>Nivel</th>   
            
        </tr>";

        // Obtiene cada fila (arreglo) de resultados
        while($ren = mysqli_fetch_array($result)) {       
            echo "<tr>";
                echo "<td>" . $ren['usuario'] . "</td>";
                echo "<td>" . $ren['correo'] . "</td>";
                echo "<td>" . $ren['nivel'] . "</td>";

                
            echo "</tr>";
        }
    echo "</table>";

    mysqli_close($con);
?>
</body>
</html>