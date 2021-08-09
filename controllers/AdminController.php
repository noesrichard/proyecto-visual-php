<?php
require_once "repo/RepoProfesor.php";
require_once "repo/RepoUsuario.php";
require_once "repo/RepoRepresentante.php";
require_once "repo/RepoAlumno.php";
require_once "repo/RepoMateria.php";
require_once "models/Materia.php";
require_once "models/Profesor.php";
require_once "models/Usuario.php";
require_once "models/Alumno.php";
require_once "models/Representante.php";
class AdminController
{
    private $repoProfesor, $repoUsuario, $repoAlumno, $repoRepresentante, $repoMateria;
    public function __construct()
    {
        $this->repoUsuario = new RepoUsuario();
        $this->repoProfesor = new RepoProfesor();
        $this->repoRepresentante = new RepoRepresentante();
        $this->repoAlumno = new RepoAlumno(); 
        $this->repoMateria = new RepoMateria;
    }

    public function crearProfesor($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion)
    {
        if ($this->repoUsuario->existe($cedula)) {
            echo "Ya existe un usuario con ese nombre";
            return false;
        }
        $profesor = new Profesor($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion);
        if ($this->repoUsuario->crear($profesor)) {
            if ($this->repoProfesor->crear($profesor)) {
                return $profesor;
            }
        }
        return false;
    }

    public function actualizarProfesor($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion)
    { 
        if($this->repoProfesor->existe($cedula)){ 
            $profesor = new Profesor($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion);
            if($this->repoProfesor->actualizar($profesor)){ 
                return $profesor;
            }
        }
        return false;
    }

    public function crearRepresentante($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion)
    {
        if ($this->repoUsuario->existe($cedula)) {
            echo "Ya existe un usuario con ese nombre";
            return false;
        } elseif ($this->repoRepresentante->existe($cedula)) {
            echo "Ya existe un profesor con esa cedula";
            return false;
        }
        $repre = new Representante($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion);
        if ($this->repoUsuario->crear($repre)) {
            if ($this->repoRepresentante->crear($repre)) {
                return $repre;
            }
        }
        return false;
    }

    public function actualizarRepresentante($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion)
    { 
        if($this->repoRepresentante->existe($cedula)){ 
            $repre = new Representante($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion);
            if($this->repoRepresentante->actualizar($repre)){ 
                return $repre;
            }
        }
        return false;
    }

    public function eliminarRepresentante($cedula)
    { 
        $repre = $this->repoRepresentante->buscar($cedula); 
        $this->repoRepresentante->eliminar($repre); 
    }

    public function eliminarAlumno($cedula)
    { 
        $alumno = $this->repoAlumno->buscar($cedula); 
        $this->repoAlumno->eliminar($alumno); 
    }

    public function eliminarProfesor($cedula)
    { 
        $profesor = $this->repoProfesor->buscar($cedula); 
        $this->repoProfesor->eliminar($profesor); 
    }

    public function crearAlumno($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion, $cedula_repre)
    {
        if ($this->repoUsuario->existe($cedula)) {
            echo "Ya existe un usuario con ese nombre";
            return false;
        } elseif ($this->repoAlumno->existe($cedula)) {
            echo "Ya existe un alumno con esa cedula";
            return false;
        }
        $repre = $this->repoRepresentante->buscar($cedula_repre); 
        $alumno = new Alumno($cedula, $password, $rol,$nombre, $apellido, $telefono, $direccion, $repre);
        if ($this->repoUsuario->crear($alumno)) {
            if ($this->repoAlumno->crear($alumno)) {
                return $alumno;
            }
        }
        return false;
    }

    public function actualizarAlumno($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion, $cedula_repre)
    { 
        if($this->repoAlumno->existe($cedula)){ 
            $repre = $this->repoRepresentante->buscar($cedula_repre);
            $alumno = new Alumno($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion, $repre);
            if($this->repoAlumno->actualizar($alumno)){ 
                return $alumno;
            }
        }
        return false;
    }

    public function crearMateria($id, $nombre, $descripcion, $cedula_profesor)
    { 
        if($this->repoMateria->existe($id)){ 
            return false;
        }
        $profesor = $this->repoProfesor->buscar($cedula_profesor); 
        $materia = new Materia($id, $nombre, $descripcion, $profesor);
        $res = $this->repoMateria->crear($materia); 
        if($res)
        { 
            return $materia; 
        }
        return false; 
    }

    public function actualizarMateria($id, $nombre, $descripcion, $cedula_profesor)
    { 
        if($this->repoMateria->existe($id)){ 
            $profe = $this->repoProfesor->buscar($cedula_profesor);
            $materia = new Materia($id, $nombre, $descripcion, $profe); 
            if($this->repoMateria->actualizar($materia)){ 
                return $materia;
            }
        }
        return false;
    }

    public function listarProfesores()
    {
        return $this->repoProfesor->getAll();
    }

    public function listarAlumnos()
    {
        return $this->repoAlumno->getAll();
    }

    public function listarRepresentantes()
    { 
        return $this->repoRepresentante->getAll(); 
    }

    public function listarMaterias()
    { 
        return $this->repoMateria->getAll(); 
    }
}
?>