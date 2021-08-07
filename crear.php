<?php
require_once "controllers/AdminController.php";
$controller = new AdminController();
if(isset($_POST) && $_GET["entidad"] == "profesor"){ 
    $res =  $controller->crearProfesor($_POST["cedula"], $_POST["password"], 1,
            $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["direccion"]); 
    if($res){ 
                echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}elseif(isset($_POST) && $_GET["entidad"] == "representante"){ 
    $res =  $controller->crearRepresentante($_POST["cedula"], $_POST["password"], 2,
            $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["direccion"]); 
    if($res){ 
                echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}elseif(isset($_POST) && $_GET["entidad"] == "alumno"){ 
    $res =  $controller->crearAlumno($_POST["cedula"], $_POST["password"], 2,
            $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["direccion"], $_POST["cedula_rep"]); 
    if($res){ 
        echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}elseif(isset($_POST) && $_GET["entidad"] == "materia"){ 
    $res =  $controller->crearMateria($_POST["id"],$_POST["nombre"],$_POST["descripcion"],$_POST["cedula_profesor"],); 
    if($res){ 
        echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}
?>