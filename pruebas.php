<?php
require_once "controllers/AdminController.php";
$controller = new AdminController();
$profesores = $controller->listarProfesores();
foreach($profesores as $profesor){ 
    echo $profesor->getCedula();echo "<br>"; 
    echo $profesor->getNombre();echo "<br>"; 
    echo $profesor->getApellido();echo "<br>"; 
}
?>
