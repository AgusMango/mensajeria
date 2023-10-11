<?php
if(isset($_POST["reg"])){
    header("location:registro.php");
}
if(isset($_POST["btiniciarsesion"])){
    $nombre = $_POST["nombre"];
    $usuario = $_POST["user"];
    $password = $_POST["password"];
    

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
        <h4>Ingresá en tu cuenta: </h4>
        Usuario: 
        <input type="text" name="user" />
        Contraseña: 
        <input type="password" name="password" />
        <input class = "btn" value = "iniciar sesión" name = "btiniciarsesion" type="submit" />
    </form>
    <form action = "index.php" method="post">
        <h5>No tenés cuenta?¡Registrate!</h5>
        <input class = "btn" value = "registrarse" name = "reg" type="submit" />
    </form>
</body>
</html>