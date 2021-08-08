<?php 

include_once "repo/RepoNotas.php"; 
include_once "repo/RepoAlumno.php";
include_once "repo/RepoRepresentante.php"; 
include_once "models/Alumno.php";
include_once "models/Notas.php"; 
include_once "models/Representante.php"; 

class AlumnoController
{ 
    private $repoNota, $repoAlumno, $repoRepresentante; 
    public function __construct()
    {
        $this->repoNota = new RepoNotas();     
        $this->repoAlumno = new RepoAlumno(); 
        $this->repoRepresentante = new RepoRepresentante(); 
    }

    public function getNotasAlumno($cedula)
    { 
        $alumno = $this->repoAlumno->buscar($cedula); 
        $notas = $this->repoNota->getNotasAlumno($alumno); 
        return $notas; 
    }
    
    public function getNotasAlumnoRepres($cedula_repre)
    { 
        $repre = $this->repoRepresentante->buscar($cedula_repre); 
        $alumno = $this->repoAlumno->buscarPorRepresentante($repre); 
        $notas = $this->repoNota->getNotasAlumno($alumno); 
        return $notas; 
    }
}


?>