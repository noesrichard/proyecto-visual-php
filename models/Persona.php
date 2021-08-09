<?php
require_once "Usuario.php"; 
class Persona extends Usuario
{  
    protected $nombre, $apellido, $telefono, $direccion;

    public function __construct($username, $password, $rol, $nombre, $apellido, $telefono, $direccion)
    {
       parent::__construct($username, $password, $rol);
       $this->nombre = $nombre;   
       $this->apellido = $apellido;   
       $this->telefono = $this->validarTelefono($telefono);   
       $this->direccion = $this->validarDireccion($direccion);   
    }

    private function validarTelefono($telefono){ 
        if ($telefono == "")
        { 
            return "0000000000"; 
        }
        return $telefono;
    }

    private function validarDireccion($direccion)
    { 
        if($direccion == "")
        { 
            return "Desconocida"; 
        }
        return $direccion; 
    }
    public function getNombre(){ 
        return $this->nombre; 
    }

    public function getApellido(){ 
        return $this->apellido; 
    }

    public function getTelefono(){ 
        return $this->telefono; 
    }

    public function getDireccion(){ 
        return $this->direccion; 
    }

}

?>