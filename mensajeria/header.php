<?php 
include_once("config.php"); 
include_once("model/usuario.php");

$userLoged = Usuario::estaLogeado() ? $_SESSION["userLog"] : "";
$userData = new Usuario($con, $userLoged);
?>