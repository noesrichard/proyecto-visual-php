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
        $cedulaRepre = $alumno->getRepresentante()->getCedula(); 
        $sql = "INSERT INTO alumno values('".$alumno->getCedula()."', '".$alumno->getUsername()."',
                '".$alumno->getNombre()."', '".$alumno->getApellido()."','".$alumno->getTelefono()."','".$alumno->getDireccion()."',
                '".$cedulaRepre."');";
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }


    public function getAll()
    { 
        $alumnos = array(); 
        $sql = "SELECT a.ced_alu as cedula, 
                    a.username_alu as username, 
                    a.nom_alu as nombre, 
                    a.ape_alu as apellido,
                    a.tel_alu as telefono, 
                    a.dir_alu as direccion, 
                    r.ced_rep as cedula_rep, 
                    r.username_rep as username_rep, 
                    r.nom_rep as nombre_rep, 
                    r.ape_rep as apellido_rep, 
                    r.tel_rep as telefono_rep,
                    r.dir_rep as direccion_rep 
                    from alumno a, representante r
                    where a.ced_rep_alu = r.ced_rep; ";
        $resultado = $this->conexion->query($sql); 
        while($row = $resultado->fetch_assoc()) { 
            $representante = new Representante($row["username_rep"], "", 2, $row["cedula_rep"], $row["nombre_rep"], 
                    $row["apellido_rep"], $row["telefono_rep"], $row["direccion_rep"]);
            $alumnos[] = new Alumno($row["username"],"", 2, $row["cedula"], $row["nombre"], $row["apellido"], 
                    $row["telefono"], $row["direccion"], $representante);
        }
        return $alumnos; 
    }
}

?> 