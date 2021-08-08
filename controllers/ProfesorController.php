<?php
require_once "repo/RepoProfesor.php";
require_once "repo/RepoUsuario.php";
require_once "repo/RepoRepresentante.php";
require_once "repo/RepoAlumno.php";
require_once "repo/RepoMateria.php";
require_once "repo/RepoNotas.php"; 
require_once "models/Materia.php";
require_once "models/Profesor.php";
require_once "models/Usuario.php";
require_once "models/Alumno.php";
require_once "models/Representante.php";
require_once "models/Notas.php";

class ProfesorController
{ 
    private $repoNota, $repoMateria, $repoProfesor, $repoAlumno; 
    public function __construct()
    {
       $this->repoNota = new RepoNotas(); 
       $this->repoMateria = new RepoMateria(); 
       $this->repoProfesor = new RepoProfesor();
       $this->repoAlumno = new RepoAlumno(); 
    }

    public function getNotasPorMateria($idMateria)
    { 
        $materia = $this->repoMateria->buscar($idMateria); 
        $notas = $this->repoNota->getNotasPorMateria($materia); 
        return $notas;
    }

    public function crearNota($idMateria, $uno, $dos, $cedula_alumno)
    { 
        $materia = $this->repoMateria->buscar($idMateria); 
        $alumno = $this->repoAlumno->buscar($cedula_alumno); 
        $nota = new Notas($uno, $dos, $alumno, $materia); 
        if($this->repoNota->existe($nota))
        { 
            return false;
        }else{ 
            $res = $this->repoNota->crear($nota);
            return $res; 
        }
    }

    public function actualizarNota($idMateria, $uno, $dos, $cedula_alumno)
    { 
        $materia = $this->repoMateria->buscar($idMateria); 
        $alumno = $this->repoAlumno->buscar($cedula_alumno); 
        $nota = new Notas($uno, $dos, $alumno, $materia); 
        $res = $this->repoNota->actualizar($nota);
        return $res;
    }
}
?>