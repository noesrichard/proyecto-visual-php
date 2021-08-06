
<nav>
    <ul>
        <li><a href="index.php?action=inicio">Inicio</a></li>
        <?php
            include_once "models/RepoUsuario.php"; 
            $rol = $_SESSION["rol"];
            if($rol == PROFESOR)
            { 
                echo "<li><a href='index.php?action=notas'>Editar Notas</a></li>";
            }elseif($rol == ADMIN){ 
                echo "<li><a href='index.php?action=notas'>Crear Profesor</a></li>";
                echo "<li><a href='index.php?action=notas'>Crear Materia</a></li>";
                echo "<li><a href='index.php?action=notas'>Crear Alumno</a></li>";
                echo "<li><a href='index.php?action=notas'>Crear Representante</a></li>";
            }else{ 
                echo "<li><a href='index.php?action=notas'>Ver Notas</a></li>";
            }

        ?>
        <li><a href="index.php?action=contactanos">Contactanos</a></li>
        <li><a href="index.php?action=perfil">Perfil</a></li>
        <li><a href="logout.php">Salir</a></li>
    </ul>
</nav>