<nav>
    <ul>
        <li><a href="index.php?action=inicio">Inicio</a></li>
        <?php
            if($_SESSION["rol"] == "profesor")
            { 
                $texto = "Editar Notas"; 
            }else{ 
                $texto = "Ver Notas"; 
            }
            echo "<li><a href='index.php?action=notas'>".$texto."</a></li>";
        ?>
        <li><a href="index.php?action=contactanos">Contactanos</a></li>
        <li><a href="index.php?action=perfil">Perfil</a></li>
        <li><a href="logout.php">Salir</a></li>
    </ul>
</nav>