<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="jquery-easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui/demo.css">
    <link rel="stylesheet" href="css/login.css">
    <script type="text/javascript" src="jquery-easyui/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui/jquery.easyui.min.js"></script>
</head>

<body>

    <div class="flex-centrado">
        <div style="margin:20px 0;"></div>
        <div class="easyui-panel" style="width:400px;padding:50px 60px">
            <form action="login.php" method="post">
                <div style="margin-bottom:20px">
                    <input class="easyui-textbox" name="username" prompt="Username" iconWidth="28" style="width:100%;height:34px;padding:10px;">
                </div>
                <div style="margin-bottom:20px">
                    <input class="easyui-passwordbox" name="password" prompt="Password" iconWidth="28" style="width:100%;height:34px;padding:10px">
                </div>
                <input type="submit" class="easyui-linkbutton c1" style="width:120px" value="Iniciar Sesion">
            </form>
        </div>
    </div>
</body>

</html>
<?php
include "models/RepoUsuario.php";
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repo = new RepoUsuario(); 
    $user = $repo->buscar($username, $password);
    if($user != null)
    { 
       $_SESSION["username"] = $user->getUsername();  
       $_SESSION["rol"] = $user->getRol();
       header("Location: /proyecto/"); 
    }
}
?>