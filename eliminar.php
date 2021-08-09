<?php
require_once "controllers/AdminController.php"; 
$adminController = new AdminController();

if (isset($_GET) && $_GET["entidad"] == "representante")
{ 
    $adminController->eliminarRepresentante($_GET["cedula"]);    
    echo json_encode(array("success" => "Si"));
}
elseif (isset($_GET) && $_GET["entidad"] == "alumno")
{ 
    $adminController->eliminarAlumno($_GET["cedula"]);    
    echo json_encode(array("success" => "Si"));
}
elseif (isset($_GET) && $_GET["entidad"] == "profesor")
{ 
    $adminController->eliminarProfesor($_GET["cedula"]);    
    echo json_encode(array("success" => "Si"));
}