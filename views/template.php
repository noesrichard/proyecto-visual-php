<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="jquery-easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui/demo/demo.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="jquery-easyui/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="jquery-easyui/locale/easyui-lang-es.js"></script>
    <title>Sistema de notas</title>
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
