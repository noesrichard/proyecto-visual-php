<?php
require_once "models/Profesor.php";
require_once "repo/RepoProfesor.php";
require_once "repo/RepoUsuario.php"; 
class AdminController
{
    private $repoProfesor, $repoUsuario; 
    public function __construct()
    {
        $this->repoUsuario = new RepoUsuario();
        $this->repoProfesor = new RepoProfesor();
    }

    public function crearProfesor($username, $password, $rol, $cedula, $nombre, $apellido, $telefono, $direccion)
    {
        if($this->repoUsuario->existeUsername($username)){ 
            echo "Ya existe un usuario con ese nombre"; 
            return false; 
        }
        elseif($this->repoProfesor->existeProfesor($cedula)){ 
            echo "Ya existe un profesor con esa cedula"; 
            return false; 
        }
        $profesor = new Profesor($username, $password, $rol, $cedula, $nombre, $apellido, $telefono, $direccion);
        if ($this->repoUsuario->crear($profesor)) {
            if ($this->repoProfesor->crear($profesor)) {
                return $profesor;
            }
        }
        return false;
    }

    public function listarProfesores()
    { 
       return $this->repoProfesor->getAll(); 
    }
}
?>