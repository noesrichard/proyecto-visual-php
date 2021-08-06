<?php

require_once "Usuario.php"; 
class Representante extends Usuario
{ 
    private $cedula, $nombre, $apellido, $telefono, $direccion; 

    public function __construct($username, $password, $rol, $cedula, $nombre, $apellido, $telefono, $direccion)
    {
        parent::__construct($username, $password,$rol); 
        $this->cedula = $cedula; 
        $this->nombre = $nombre; 
        $this->apellido = $apellido; 
        $this->telefono = $telefono; 
        $this->direccion = $direccion; 
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
}

?>