<?php
include "Conexion.php";
include "Usuario.php"; 
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
    public function buscar($username, $password)
    { 
        echo $username; echo "<br>";
        echo $password; echo "<br>";
        $sql = "SELECT username, `password`, id_rol_usu as rol FROM usuario WHERE username='".$username."' and password='".$password."';";
        $resultado = $this->conexion->query($sql);
        $data = $resultado->fetch_assoc(); 
        return new Usuario($data["username"], $data["password"], $data["rol"]);
    }
}
?>