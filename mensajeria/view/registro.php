<?php
    error_reporting(E_ALL);
include_once("../model/usuario.php");
include_once("../controller/usuarioController.php");
include_once("../orm/dbuser.php");
include_once("config.php");
if(isset($_POST["regresar"])){
    header("location:index.php");
}
if(isset($_POST["btregistrarse"])){
    $nombre = $_POST["nombre"];
    $usern = $_POST["user"];
    $password = $_POST["password"];
    $aux = dbread_user($conexion,$usern);
    if($aux->rowCount()){
        echo 'USERNAME OCUPADO';
    }
    else{

        $usr = new Usuario($usrn,$password,$nombre,1);
        $query = dbcreate_user($usr,$conexion);
        if($query){ 
            echo 'USUARIO CREADO';
        }
        else{ 
            echo "ERROR AL REGISTRAR: ". $query;
        }
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
</form>
<form action = "registro.php" method="post">
<h5>Registrarse: </h5>
    Nombre:
    <input type="text" name="nombre" />
    Username: 
    <input type="text" name="user" />
    Contraseña: 
    <input type="password" name="password" />
    <input class = "btn" value = "crear cuenta" name = "btregistrarse" type="submit" />
</form>
</html>