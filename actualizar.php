<?php
require_once "controllers/AdminController.php";
$controller = new AdminController();
if(isset($_POST) && $_GET["entidad"] == "profesor"){ 
    $res =  $controller->actualizarProfesor($_POST["cedula"], $_POST["password"], 1,
            $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["direccion"]); 
    if($res){ 
        echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}elseif(isset($_POST) && $_GET["entidad"] == "representante"){ 
    $res =  $controller->actualizarRepresentante($_POST["cedula"], $_POST["password"], 1,
            $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["direccion"]); 
    if($res){ 
        echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}
?>