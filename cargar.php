<?php
require_once "controllers/AdminController.php";
$controller = new AdminController();
if(isset($_GET["entidad"]) && $_GET["entidad"] == "profesor"){ 
    $profesores = $controller->listarProfesores();
    echo json_encode($profesores);
}
elseif(isset($_GET["entidad"]) && $_GET["entidad"] == "representante"){
    $repres = $controller->listarRepresentantes(); 
    echo json_encode($repres); 
}elseif(isset($_GET["entidad"]) && $_GET["entidad"] == "alumno"){
    $alumnos = $controller->listarAlumnos(); 
    echo json_encode($alumnos); 
}
?>