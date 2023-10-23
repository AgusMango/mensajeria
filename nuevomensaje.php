<?php
error_reporting(E_ALL);
include_once("../model/usuario.php");
include_once("../controller/usuarioController.php");
include_once("../model/mensaje.php");
include_once("../controller/mensajeController.php");
include_once("config.php");
if(!isset($_SESSION["userLog"])) {
    header("location:index.php");
    }
if(isset($_GET["regresar"])) {
    header("location:dashboard.php");
}
if(isset($_POST["sendmsj"])) {
    if(!isset($_POST["destinatario"]) ||!isset($_POST["contenido"]) ||!isset($_POST["asunto"])){echo 'COMPLETE TODOS LOS CAMPOS';
    }else {
        $aux = buscarUsuario($_POST["destinatario"],$_SESSION["userList"]);
        if(!$aux){
            echo 'no existe un destinatario con ese username';
        }else{
            $msj = enviarMensaje($conexion,$_SESSION["userLog"],$_POST["destinatario"],$_POST["asunto"],$_POST["contenido"]);
            echo '--1--';
            if(!$msj)echo 'ERROR AL ENVIAR';else echo 'MENSAJE ENVIADO';
        }   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>redactar</title>
</head>
<body>
    <form method = "get" action="nuevomensaje.php">
        <input type="submit" value="<---" name = "regresar">
    </form>
    <h1>Redactar nuevo mensaje</h1>
    <form  method = "post" action="nuevomensaje.php">
     para: <input type="text" name = "destinatario" placeholder="destinatario"/>
     <input type="text" name = "asunto" placeholder ="asunto"/>
     <br>
     <input type="text" name = "contenido" placeholder="mensaje">
     <input type="submit" value="enviar mensaje" name = "sendmsj">
    </form>
</body>
</html>