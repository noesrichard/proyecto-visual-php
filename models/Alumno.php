<?php
require_once "models/Usuario.php"; 
class Alumno extends Usuario
{ 
    private $cedula, $nombre, $apellido, $telefono, $direccion, $representante; 

    public function __construct( $cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion, $representante )
    {
        parent::__construct($cedula, $password, $rol);     
        $this->nombre = $nombre; 
        $this->apellido = $apellido; 
        $this->telefono = $telefono; 
        $this->direccion = $direccion; 
        $this->representante = $representante; 
    }
    
    public function getCedula()
    { 
        return $this->cedula; 
    }
    public function getNombre()
    { 
        return $this->nombre; 
    }
    public function getApellido()
    { 
        return $this->apellido; 
    }
    public function getTelefono()
    { 
        return $this->telefono; 
    }
    public function getDireccion()
    { 
        return $this->direccion; 
    }

    public function getRepresentante()
    { 
        return $this->representante; 
    }
}
?>