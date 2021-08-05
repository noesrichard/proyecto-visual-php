<?php
class Vistas
{ 
    public static function vista($direccion)
    { 
        $modulo = "views/modules/inicio.php";
        if($direccion == "notas" || $direccion == "contactanos" ||
            $direccion == "perfil")
        { 
            $modulo = "views/modules/".$direccion.".php";
        }
        return $modulo; 
    }
}
?>