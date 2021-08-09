<?php
require_once "models/Conexion.php";
require_once "models/Usuario.php"; 
const ADMIN = 0; 
const PROFESOR = 1; 
const ALUMNO = 2; 
const REPRESENTANTE = 2; 
class RepoUsuario
{ 
    private $conexion;  
    function __construct()
    {
       $this->conexion = new Conexion(); 

    }

    public function existe($username){ 
        $sql = "SELECT EXISTS(SELECT username FROM usuario WHERE username='".$username."') as existe;";
        $resultado = $this->conexion->query($sql);
        $data = $resultado->fetch_assoc(); 
        return $data["existe"];
    }
    public function buscar($username, $password)
    { 
        $sql = "SELECT username, `password`, id_rol_usu as rol FROM usuario WHERE username='".$username."' and password='".$password."' and visible = 1;";
        $resultado = $this->conexion->query($sql);
        $data = $resultado->fetch_assoc(); 
        return new Usuario($data["username"], $data["password"], $data["rol"]);
    }

    public function crear($usuario)
    { 
        $sql = "INSERT INTO usuario values('".$usuario->getUsername()."','".$usuario->getPassword()."','".$usuario->getRol()."', 1); ";
        $resultado = $this->conexion->query($sql); 
        return $resultado; 
    }
}
?>