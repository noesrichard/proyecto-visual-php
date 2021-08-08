<?php
class Notas 
{ 
    private $uno, $dos, $alumno, $materia; 

    public function __construct($uno, $dos, $alumno, $materia)
    {
       $this->uno = $uno;  
       $this->dos = $dos;  
       $this->alumno = $alumno;  
       $this->materia = $materia;  
    }

    public function getUno()
    { 
        return $this->uno; 
    }

    public function getDos()
    { 
        return $this->dos; 
    }

    public function getAlumno()
    { 
        return $this->alumno; 
    }

    public function getMateria()
    { 
        return $this->materia; 
    }
}
?>