<?php
require_once "repo/RepoNotas.php";
require_once "repo/RepoMateria.php";
require_once "repo/RepoProfesor.php";

class ProfesorController
{ 
    private $repoNota, $repoMateria, $repoProfesor; 
    public function __construct()
    {
       $this->repoNota = new RepoNotas(); 
       $this->repoMateria = new RepoMateria(); 
       $this->repoProfesor = new RepoProfesor();
    }

    public function getNotasPorMateria($idMateria)
    { 
        $materia = $this->repoMateria->buscar($idMateria); 
        $notas = $this->repoNota->getNotasPorMateria($materia); 
        return $notas;
    }
}
?>