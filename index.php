<?php
    error_reporting(E_ALL);
include_once("config.php");
include_once("../controller/usuarioController.php");
include_once("../model/usuario.php");



if(isset($_POST["reg"])){
    header("location:registro.php");
}
if(isset($_POST["log"])){
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bienvenido a su sistema de mensajería</title>
</head>
<body>
    <h1>Sistema de mensajería</h1>
    <h3>envia mensajes a otros usuarios</h3>
    <form action = "index.php" method="post">
        <h4>Inicia sesión en tu cuenta</h4>
        <input class = "btn" value = "login" name = "log" type="submit" />
    </form>
    <form action = "index.php" method="post">
        <h5>No tenés cuenta?¡Registrate!</h5>
        <input class = "btn" value = "registrarse" name = "reg" type="submit" />
    </form>
</body>
</html>