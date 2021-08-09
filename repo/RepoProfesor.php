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

    public function buscar($cedula)
    { 
        $sql = "SELECT p.ced_pro as cedula,
            p.nom_pro as nombre,
            p.ape_pro as apellido,
            p.tel_pro as telefono,
            p.dir_pro as direccion, 
            u.password as password 
            from profesor p, usuario u
            where p.ced_pro = u.username
            and p.ced_pro = '".$cedula."';";
        $res = $this->conexion->query($sql); 
        $data = $res->fetch_assoc(); 
        return new Profesor($data["cedula"],$data["password"],1, $data["nombre"], $data["apellido"], $data["telefono"], $data["direccion"]);
    }

    public function existe($cedula){ 
        $sql = "SELECT EXISTS(SELECT ced_pro FROM profesor WHERE ced_pro='".$cedula."') as existe;";
        $resultado = $this->conexion->query($sql);
        $data = $resultado->fetch_assoc(); 
        return $data["existe"];
    }

    public function crear($profesor)
    { 
        $sql = "INSERT INTO profesor values('".$profesor->getUsername()."','".$profesor->getNombre()."', '".$profesor->getApellido()."','".$profesor->getTelefono()."','".$profesor->getDireccion()."', 1);";
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    
    public function actualizar($profesor)
    { 
        $sql = "UPDATE profesor p, usuario u
                SET p.nom_pro = '".$profesor->getNombre()."',
                p.ape_pro = '".$profesor->getApellido()."',
                p.tel_pro = '".$profesor->getTelefono()."',
                p.dir_pro = '".$profesor->getDireccion()."',
                u.password = '".$profesor->getPassword()."'
                WHERE p.ced_pro = '".$profesor->getUsername()."'
                and p.ced_pro = u.username";
        $resultado = $this->conexion->query($sql); 
        return $resultado;
    }

    public function getAll()
    { 
        $profesores = array();
        $sql = "SELECT p.ced_pro as cedula,
            p.nom_pro as nombre,
            p.ape_pro as apellido,
            p.tel_pro as telefono,
            p.dir_pro as direccion, 
            u.password as password 
            from profesor p, usuario u
            where p.ced_pro = u.username
            and p.visible = 1"; 
        $resultado = $this->conexion->query($sql);
        while($row = $resultado->fetch_assoc())
        { 
            $profesores[] = $row; 
        }
        return $profesores; 
    }

    public function eliminar($profesor)
    {
        $sql = "UPDATE profesor p, usuario u
                SET p.visible = 0,
                u.visible = 0
                WHERE p.ced_pro = '".$profesor->getUsername()."'
                AND u.username = p.ced_pro;";
        $this->conexion->query($sql); 
    }
}
?>