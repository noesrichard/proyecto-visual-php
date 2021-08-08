<?php
class Vistas
{ 
    public static function vista($direccion)
    { 
        $modulo = "views/modules/inicio.php";
        if($direccion == "contactanos" || $direccion == "perfil")
        { 
            $modulo = "views/modules/".$direccion.".php";
        }
        elseif($direccion == "profesores" || $direccion == "representantes" || $direccion == "alumnos" || $direccion == "materias")
        { 
            $modulo = "views/modules/admin/".$direccion.".php";
        }
        elseif($direccion == "editar_notas")
        { 
            $modulo = "views/modules/profesor/".$direccion.".php";
        }
        elseif($direccion == "notas"){ 
            $modulo = "views/modules/alumno/".$direccion.".php";
        }
        elseif($direccion == "notas_repre"){ 
            $modulo = "views/modules/repre/".$direccion.".php";
        }
        return $modulo; 
    }
}
?>