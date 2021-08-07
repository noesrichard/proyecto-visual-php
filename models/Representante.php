<?php

require_once "Usuario.php"; 
class Representante extends Usuario
{ 
    private  $nombre, $apellido, $telefono, $direccion; 

    public function __construct($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion)
    {
        parent::__construct($cedula, $password,$rol); 
        $this->nombre = $nombre; 
        $this->apellido = $apellido; 
        $this->telefono = $telefono; 
        $this->direccion = $direccion; 
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
}

?>