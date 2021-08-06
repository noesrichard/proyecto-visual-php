<?php
require_once "models/Conexion.php";
require_once "models/Representante.php"; 
class RepoRepresentante
{ 
    private $conexion;  
    function __construct()
    {
       $this->conexion = new Conexion(); 

    }

    public function existe($cedula){ 
        $sql = "SELECT EXISTS(SELECT ced_rep FROM representante WHERE ced_rep='".$cedula."') as existe;";
        $resultado = $this->conexion->query($sql);
        $data = $resultado->fetch_assoc(); 
        return $data["existe"];
    }

    public function crear($repre)
    { 
        $sql = "INSERT INTO representante 
                values('".$repre->getCedula()."','".$repre->getUsername()."',
                '".$repre->getNombre()."', '".$repre->getApellido()."','".$repre->getTelefono()."',
                '".$repre->getDireccion()."');";
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    public function buscar($cedula)
    { 
        $sql = "SELECT ced_rep as cedula, 
                username_rep as username, 
                nom_rep as nombre, 
                ape_rep as apellido, 
                tel_rep as telefono, 
                dir_rep as direccion
                FROM representante
                WHERE ced_rep = '".$cedula."';";
        $res = $this->conexion->query($sql);
        $data = $res->fetch_assoc(); 
        $repre = new Representante($data["username"], "", 2, $data["cedula"], $data["nombre"],
                $data["apellido"],$data["telefono"],$data["direccion"]);
        return $repre; 
    }
}
?>