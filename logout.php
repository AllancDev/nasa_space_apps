<?php 
    session_start();
    unset($_SESSION['hashuser'], $_SESSION['loginUsuario']);

    header("Location: login.php");
    exit;
?>