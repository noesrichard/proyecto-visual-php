<?php
require_once "controllers/AdminController.php";
require_once "controllers/ProfesorController.php"; 
$controller = new AdminController();
$profesorController = new ProfesorController(); 
if(isset($_POST) && $_GET["entidad"] == "profesor"){ 
    $res =  $controller->actualizarProfesor($_POST["cedula"], $_POST["password"], 1,
            $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["direccion"]); 
    if($res){ 
        echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}elseif(isset($_POST) && $_GET["entidad"] == "representante"){ 
    $res =  $controller->actualizarRepresentante($_POST["cedula"], $_POST["password"], 3,
            $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["direccion"]); 
    if($res){ 
        echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}elseif(isset($_POST) && $_GET["entidad"] == "alumno"){ 
    $res =  $controller->actualizarAlumno($_POST["cedula"], $_POST["password"], 2,
            $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["direccion"], $_POST["cedula_rep"]); 
    if($res){ 
        echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}elseif(isset($_POST) && $_GET["entidad"] == "materia"){ 
    $res =  $controller->actualizarMateria($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["cedula_profesor"]); 
    if($res){ 
        echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo "ERROR";
    }
}elseif(isset($_POST) && $_GET["entidad"] == "nota" && isset($_GET["materia"])){ 
    $res =  $profesorController->actualizarNota($_GET["materia"], $_POST["nota_uno"], $_POST["nota_dos"], $_POST["cedula_alumno"]); 
    if($res){ 
        echo json_encode("Se guardo correctamente"); 
    }else{ 
        echo $res;
        echo "ERROR";
    }
}
?>