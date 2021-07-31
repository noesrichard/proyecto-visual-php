<?php
class Controller
{ 
    public function template()
    { 
        include "views/template.php"; 
    }

    public function redireccion()
    { 
        if (isset($_GET["action"]))
        { 
            $direccion = $_GET["action"];
        }
        else
        { 
            $direccion = "inicio.php";
        }
    }
}