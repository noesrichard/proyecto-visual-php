<?php
require_once "models/Conexion.php";
require_once "models/Profesor.php"; 
class RepoProfesor
{ 
    private $conexion;  
    function __construct()
    {
       $this->conexion = new Conexion(); 

    }

    public function existeProfesor($cedula){ 
        $sql = "SELECT EXISTS(SELECT ced_pro FROM profesor WHERE ced_pro='".$cedula."') as existe;";
        $resultado = $this->conexion->query($sql);
        $data = $resultado->fetch_assoc(); 
        return $data["existe"];
    }

    public function crear($profesor)
    { 
        $sql = "INSERT INTO profesor values('".$profesor->getCedula()."','".$profesor->getUsername()."','".$profesor->getNombre()."', '".$profesor->getApellido()."','".$profesor->getTelefono()."','".$profesor->getDireccion()."');";
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    public function getAll()
    { 
        $profesores = array();
        $sql = "SELECT ced_pro as cedula, username_pro as username, nom_pro as nombre, ape_pro as apellido, tel_pro as telefono, dir_pro as direccion from profesor"; 
        $resultado = $this->conexion->query($sql);
        while($row = $resultado->fetch_assoc())
        { 
            $profesores[] = new Profesor($row["username"],"", 1, $row["cedula"], $row["nombre"], $row["apellido"], $row["telefono"], $row["direccion"]);
        }
        return $profesores; 
    }
}
?>