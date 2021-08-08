<?php
require_once "controllers/AdminController.php";
require_once "controllers/ProfesorController.php";
$adminController = new AdminController();
$profesorController = new ProfesorController(); 
if(isset($_GET["entidad"]) && $_GET["entidad"] == "profesor"){ 
    $profesores = $adminController->listarProfesores();
    echo json_encode($profesores);
}
elseif(isset($_GET["entidad"]) && $_GET["entidad"] == "representante"){
    $repres = $adminController->listarRepresentantes(); 
    echo json_encode($repres); 
}elseif(isset($_GET["entidad"]) && $_GET["entidad"] == "alumno"){
    $alumnos = $adminController->listarAlumnos(); 
    echo json_encode($alumnos); 
}elseif(isset($_GET["entidad"]) && $_GET["entidad"] == "materia"){
    $materias = $adminController->listarMaterias(); 
    echo json_encode($materias); 
}elseif(isset($_GET["materia"])){ 
    $notas = $profesorController->getNotasPorMateria($_GET["materia"]);
    echo json_encode($notas);
}
?>