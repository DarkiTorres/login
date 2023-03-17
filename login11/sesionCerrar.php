<?php
    
    session_start();
    unset($_SESSION['nivel']); 
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit();

?>