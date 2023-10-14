<?php
    error_reporting(E_ALL);

function dbcreate_user($usr,$con){
    try {
    $option = array(
        'cost' => 10
    );
    $usuario = $usr->get_username();
    $nombre = $usr->get_nombre();
    $password = $usr->get_password();
    $tipo = $usr->get_tipo();
    $passHashed = password_hash($password, PASSWORD_BCRYPT, $option);
    $query = $con->prepare("INSERT INTO  usuarios (username, password, nombre, tipo) VALUES (:usuario,:pass,:nombre,:tipo)");
    $query->bindParam(':usuario', $usuario);
    $query->bindParam(':pass', $passHashed);
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':tipo', $tipo);
    $result = $query->execute();
    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    return $result;
}


function dbreadALL_user($con){
    $query = $con->prepare("SELECT * FROM usuarios");
    $query->execute();
    return $query;
}

function dbread_user($con,$username){
    $query = $con->prepare("SELECT * FROM usuarios WHERE username = :username");
    $query->bindParam(":username", $username);
    $query->execute();
    return $query;
}

function dbupdate_user($username,$con){
}

function dbdelete_user($user,$con){
    $query = $con->prepare("SELECT * FROM usuarios WHERE usuario = :user");
    $query->bindParam(":user", $user->get_id());
    $query->execute();
    return $query;
}

?>