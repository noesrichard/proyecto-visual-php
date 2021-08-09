<?php
require_once "models/Conexion.php";

class RepoNotas
{ 
    private $conexion; 
    public function __construct()
    {
       $this->conexion = new Conexion();  
    }
    
    public function existe($nota)
    { 
        $materia = $nota->getMateria(); 
        $alumno = $nota->getAlumno(); 
        $sql = "SELECT EXISTS(SELECT uno_not FROM notas WHERE id_mat_not='".$materia->getId()."' and ced_alu_not='".$alumno->getUsername()."') as existe;";
        $data = $this->conexion->query($sql)->fetch_assoc(); 
        return $data["existe"]; 
    }

    public function getNotasPorMateria($materia)
    { 
        $notas = array();
        $sql = "SELECT n.uno_not as nota_uno, 
                n.dos_not as nota_dos, 
                a.ced_alu as cedula_alumno, 
                a.nom_alu as nombre_alumno, 
                a.ape_alu as apellido_alumno
                FROM notas n, alumno a
                WHERE a.ced_alu = n.ced_alu_not
                AND n.id_mat_not = '".$materia->getId()."'
                and n.visible = 1;";
        $res = $this->conexion->query($sql); 
        while($row = $res->fetch_assoc())
        { 
            $notas[] = $row; 
        }
        return $notas;
    }

    public function crear($nota)
    { 
        $materia = $nota->getMateria(); 
        $alumno = $nota->getAlumno(); 
        $sql = "INSERT INTO notas values('".$materia->getId()."','".$nota->getUno()."','".$nota->getDos()."','".$alumno->getUsername()."');";
        $res = $this->conexion->query($sql); 
        return $res; 
    }

    public function actualizar($nota)
    { 
        $materia = $nota->getMateria(); 
        $alumno = $nota->getAlumno(); 
        $sql = "UPDATE notas
                SET uno_not = '".$nota->getUno()."', 
                dos_not = '".$nota->getDos()."' 
                WHERE ced_alu_not = '".$alumno->getUsername()."'
                AND id_mat_not = '".$materia->getID()."';";
        $res = $this->conexion->query($sql); 
        return $res;
    }

    public function getNotasAlumno($alumno)
    { 
        $notas = array();
        $sql = "SELECT m.nom_mat as materia, 
                n.uno_not as nota_uno, 
                n.dos_not as nota_dos 
                from notas n, materia m 
                where n.id_mat_not = m.id_mat
                and n.ced_alu_not = '".$alumno->getUsername()."'
                and n.visible = 1;";
        $res = $this->conexion->query($sql); 
        while($row = $res->fetch_assoc())
        { 
            $notas[] = $row; 
        }
        return $notas;
    }

    public function eliminar($materia, $alumno)
    {
        $sql = "UPDATE notas
                SET visible = 0
                WHERE id_mat_not = '".$materia->getId()."'
                AND ced_alu_not = '".$alumno->getUsername()."';";
        $this->conexion->query($sql); 
    }




}

?>