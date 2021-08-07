<?php
if(isset($_POST) && $_GET["POST"] == "profesores"){ 
    require_once "controllers/AdminController.php";
    $controller = new AdminController();
    $res =  $controller->crearProfesor($_POST["cedula"], $_POST["password"], 1,
            $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["direccion"]); 
    if($res){ 
                echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}
?>