<?php
class Materia
{ 
    private $profesor, $id, $nombre, $descripcion; 
    private $notas; 

    public function __construct($id, $nombre, $descripcion, $profesor)
    {
       $this->id =  $id; 
       $this->nombre =  $nombre;  
       $this->descripcion =  $descripcion; 
       $this->profesor =  $profesor; 
    }
    
    public function getId()
    { 
        return $this->id; 
    }

    public function getNombre()
    { 
        return $this->nombre; 
    }

    public function getDescripcion()
    { 
        return $this->descripcion; 
    }

    public function getProfesor()
    { 
        return $this->profesor;
    }
}
?>