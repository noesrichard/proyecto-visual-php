<?php
    session_start(); 
    require_once "controllers/Controller.php";
    require_once "controllers/Vistas.php"; 
    if (isset($_SESSION["username"]))
    { 
        $controlador = new Controller(); 
        $controlador->template();
    }else{ 
        header("Location: /proyecto/login.php");
    }    
      
?>