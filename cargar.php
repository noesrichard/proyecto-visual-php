<?php
require_once "controllers/AdminController.php";
$controller = new AdminController();
$profesores = $controller->listarProfesores();
echo json_encode($profesores);
?>