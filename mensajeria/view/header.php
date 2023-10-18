<?php
    include_once("../model/usuario.php");
    include_once("../controller/usuarioController.php");
    include_once("config.php");
    if(isset($_SESSION["userLog"])){
        echo '--1--';
        $logueado = $userHandler->buscarUsuario($_SESSION["userLog"]);
        echo '--2--';
        $nombre_logueado = $logueado->get_nombre();
    }
    else{
        echo '---HOLA---';
        $userHandler = new userController($conexion);
    }
    ?>