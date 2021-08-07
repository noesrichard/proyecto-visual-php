<?php
require_once "models/Conexion.php"; 

class RepoMateria{ 

    private $conexion; 
    public function __construct()
    {
       $this->conexion = new Conexion();  
    }

    public function existe($id)
    { 
        $sql = "SELECT EXISTS(SELECT id_mat from materia where id_mat = '".$id."') as existe;";
        $res = $this->conexion->query($sql); 
        $data = $res->fetch_assoc(); 
        return $data["existe"];
    }

    public function buscar($id)
    { 
        $sql = "SELECT id_mat as id, 
                nom_mat as nombre, 
                des_mat as descripcion,
                ced_pro_mat as cedula_profesor,
                FROM materia
                WHERE id_mat = '".$id."';";
        $res = $this->conexion->query($sql); 
        $data = $res->fetch_assoc(); 
        $materia = new Materia($data["id"], $data["nombre"], $data["descripcion"], $data["cedula_profesor"]); 
        return $materia; 
    }

    public function actualizar($materia)
    { 
        $profe = $materia->getProfesor(); 
        $sql = "UPDATE materia
                SET nom_mat = '".$materia->getNombre()."',
                des_mat = '".$materia->getDescripcion()."',
                ced_pro_mat = '".$profe->getUsername()."'
                WHERE id_mat = '".$materia->getId()."';"; 
        $res = $this->conexion->query($sql); 
        return $res;
    }

    public function getAll()
    { 
        $materias = array();
        $sql = "SELECT id_mat as id, 
                nom_mat as nombre, 
                des_mat as descripcion,
                ced_pro_mat as cedula_profesor
                FROM materia;";
        $res = $this->conexion->query($sql); 
        while($row = $res->fetch_assoc()){ 
            $materias[] = $row; 
        } 
        return $materias; 
    }

    public function crear($materia)
    { 
        $profesor = $materia->getProfesor(); 
        $sql = "INSERT INTO materia VALUES('".$materia->getId()."','".$materia->getNombre()."','".$materia->getDescripcion()."',
                '".$profesor->getUsername()."');";
        if($this->conexion->query($sql))
        { 
            return $materia; 
        }
        return false; 
    }

}

?>