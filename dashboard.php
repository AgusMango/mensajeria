<?php
error_reporting(E_ALL);
include_once("../model/usuario.php");
include_once("../controller/usuarioController.php");
include_once("../model/mensaje.php");
include_once("../controller/mensajeController.php");
include_once("config.php");
include_once("../orm/dbmsj.php");
include_once("../orm/dbuser.php");
if (!isset($_SESSION["userLog"])) {
    header("location:index.php");
} else {
    $usuario_logueado = buscarUsuario($_SESSION["userLog"], $_SESSION["userList"]);
    if (is_null($usuario_logueado)) echo '--null--';
    $nombre_logueado = $usuario_logueado->get_nombre();
    $recibidos = cargarLista_recibidos($conexion,$_SESSION["userLog"]);
    $enviados = cargarLista_enviados($conexion,$_SESSION["userLog"]);
}
if(isset($_POST["new_msj"])){
    header("location:nuevomensaje.php");
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
<header>
    <h2>
        <?php echo 'Bienvenido '.$nombre_logueado; ?>
    </h2>
</header>

<body>
    <div>
    <h1>Bandeja de entrada</h1>
    <?php
    foreach($recibidos as $mensaje){
        $asunto = $mensaje->get_asunto();
        $emisor = $mensaje->get_emisor();
        echo '<div class ="msj"> <h5>'.$asunto.' de '. $emisor.'<form action = "" method="post">
        <input type= hidden name="mensaje" value="'.$mensaje->get_id().'">
        <input class = "btn" value = "abrir mensaje" name = "msj_rcv" type="submit" />
        </form>';
        if(isset($_POST["msj_rcv"]) && $_POST["mensaje"] == $mensaje->get_id()){
            if($editado){
                echo '--editado--';
            }
            echo $mensaje->get_contenido();
        }
    }
    ?>
    </div>
    <div>
    <h1>Redactar:</h1>
    <form method = "post" action="dashboard.php">
    <input class = "btn" value = "nuevo mensaje" name = "new_msj" type="submit"/>
    </form>
    </div>
    <div>   
        <h2>Mensajes enviados</h2>
        <?php
        foreach($enviados as $mensaje){
            $asunto = $mensaje->get_asunto();
            $destinatario = $mensaje->get_destinatario();
            echo '<div class ="msj"> <h5>'.$asunto.' para '. $destinatario.'<form action = "" method="post">
            <input type= hidden name="mensaje" value="'.$mensaje->get_id().'">
            <input class = "btn" value = "abrir mensaje" name = "msj_rcv" type="submit" />
            </form>';
            if(isset($_POST["msj_rcv"]) && $_POST["mensaje"] == $mensaje->get_id()){
                echo $mensaje->get_contenido();
            }
        }
    ?>
    </div>
</body>
<footer>
    <h2>Este es mi foooter</h2>
</footer>

</html>