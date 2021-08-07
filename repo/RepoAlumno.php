<?php

require_once "models/Conexion.php"; 
require_once "models/Alumno.php"; 
require_once "models/Representante.php"; 

class RepoAlumno
{ 
    private $conexion; 
    public function __construct()
    {
       $this->conexion = new Conexion();  
    }

    public function existe($cedula)
    { 
        $sql = "SELECT EXISTS(SELECT ced_alu FROM alumno WHERE ced_alu='".$cedula."') as existe;";
        $resultado = $this->conexion->query($sql);
        $data = $resultado->fetch_assoc(); 
        return $data["existe"];
    }
    
    public function crear($alumno)
    { 
        $cedulaRepre = $alumno->getRepresentante()->getUsername(); 
        $sql = "INSERT INTO alumno values('".$alumno->getUsername()."', '".$alumno->getNombre()."', 
            '".$alumno->getApellido()."','".$alumno->getTelefono()."','".$alumno->getDireccion()."', '".$cedulaRepre."');";
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    public function actualizar($alumno)
    { 
        $cedulaRepre = $alumno->getRepresentante()->getUsername();
        $sql = "UPDATE alumno a, usuario u
                SET a.nom_alu = '".$alumno->getNombre()."',
                a.ape_alu = '".$alumno->getApellido()."',
                a.tel_alu = '".$alumno->getTelefono()."',
                a.dir_alu = '".$alumno->getDireccion()."',
                a.ced_rep_alu = '".$cedulaRepre."',
                u.password = '".$alumno->getPassword()."'
                WHERE a.ced_alu = '".$alumno->getUsername()."'
                and a.ced_alu = u.username";
        $resultado = $this->conexion->query($sql); 
        return $resultado;

    }


    public function getAll()
    { 
        $alumnos = array(); 
        $sql = "SELECT a.ced_alu as cedula, 
                    u.password as password,
                    a.nom_alu as nombre, 
                    a.ape_alu as apellido,
                    a.tel_alu as telefono, 
                    a.dir_alu as direccion, 
                    r.ced_rep as cedula_rep, 
                    r.nom_rep as nombre_rep, 
                    r.ape_rep as apellido_rep, 
                    r.tel_rep as telefono_rep,
                    r.dir_rep as direccion_rep 
                    from alumno a, representante r, usuario u
                    where a.ced_rep_alu = r.ced_rep
                    and a.ced_alu = u.username; ";
        $resultado = $this->conexion->query($sql); 
        while($row = $resultado->fetch_assoc()) { 
            $alumnos[] = $row; 
        }
        return $alumnos; 
    }
}

?> 