<?php
require_once "models/Conexion.php";

class RepoNotas
{ 
    private $conexion; 
    public function __construct()
    {
       $this->conexion = new Conexion();  
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
                AND n.id_mat_not = '".$materia->getId()."';";
        $res = $this->conexion->query($sql); 
        while($row = $res->fetch_assoc())
        { 
            $notas[] = $row; 
        }
        return $notas;
    }

}

?>