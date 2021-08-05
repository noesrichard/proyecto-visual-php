<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

    <header>
        <img src="images/header-clase.jpg" width="100%" alt="cabecera">
    </header>
    <?php
        include "modules/nav.php";
    ?>
    <section>
    <?php
        $controlador = new Controller(); 
        $controlador->redireccion();
    ?>
    </section>
    
</body>
</html>
