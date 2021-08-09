<?php
require_once "Persona.php"; 
class Alumno extends Persona
{ 
    private  $representante; 

    public function __construct( $cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion, $representante )
    {
        parent::__construct($cedula, $password, $rol, $nombre, $apellido, $telefono, $direccion);     
        $this->representante = $representante; 
    }
       public function getRepresentante()
    { 
        return $this->representante; 
    }
}
?>