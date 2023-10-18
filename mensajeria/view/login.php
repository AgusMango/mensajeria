<?php
        error_reporting(E_ALL);
include_once("../orm/dbuser.php");
include_once("../model/usuario.php");
include_once("../controller/usuarioController.php");
include_once("config.php");
include_once("header.php");
if(isset($_POST["regresar"])){
    header("location:index.php");
}
if(isset($_POST["btiniciarsesion"])){
    $usuario = $_POST["user"];
    $password = $_POST["password"];
    $log = $userHandler->login($usuario,$password);
    if(!$log){
        echo 'ACCESO DENEGADO';
    }
    else{
        header("location:dashboard.php");
    }
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

<form method="post">
    <input class = "btn" value = "<---" name = "regresar" type="submit" />
 <form action = "login.php" method="post">
        <h4>Ingresá en tu cuenta: </h4>
        Usuario: 
        <input type="text" name="user" />
        Contraseña: 
        <input type="password" name="password" />
        <input class = "btn" value = "iniciar sesión" name = "btiniciarsesion" type="submit" />
    </form>
</html>