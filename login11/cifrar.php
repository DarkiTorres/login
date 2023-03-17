<?php

    $password = $_GET['password']; 

    $password_hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    
    echo($password.': ');
    echo('<br>');
    echo($password_hash);

?>