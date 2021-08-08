
<nav>
    <ul>
        <li><a href="index.php?action=inicio">Inicio</a></li>
        <?php
            require_once "repo/RepoUsuario.php"; 
            $rol = $_SESSION["rol"];
            if($rol == PROFESOR)
            { 
                echo "<li><a href='index.php?action=editar_notas'>Editar Notas</a></li>";
            }elseif($rol == ADMIN){ 
                echo "<li><a href='index.php?action=profesores'>Profesores</a></li>";
                echo "<li><a href='index.php?action=materias'>Materias</a></li>";
                echo "<li><a href='index.php?action=alumnos'>Alumnos</a></li>";
                echo "<li><a href='index.php?action=representantes'>Representantes</a></li>";
            }elseif($rol == ALUMNO){ 
                echo "<li><a href='index.php?action=notas'>Ver Notas</a></li>";
            }else{ 
                echo "<li><a href='index.php?action=notas_repre'>Ver Notas</a></li>";
            }

        ?>
        <li><a href="index.php?action=contactanos">Contactanos</a></li>
        <li><a href="index.php?action=perfil">Perfil</a></li>
        <li><a href="logout.php">Salir</a></li>
    </ul>
</nav>