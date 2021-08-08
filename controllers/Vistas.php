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
        }elseif($direccion == "profesores" || $direccion == "representantes" || $direccion == "alumnos" || $direccion == "materias")
        { 
            $modulo = "views/modules/admin/".$direccion.".php";
        }elseif($direccion == "editar_notas")
        { 
            $modulo = "views/modules/profesor/".$direccion.".php";
        }

        return $modulo; 
    }
}
?>