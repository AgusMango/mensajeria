<?php


function dbcreate_user($usr,$con){
    $option = array(
        'cost' => 10
    );
    $usuario = $usr->get_username();
    $nombre = $usr->get_nombre();
    $password = $usr->get_password();
    $tipo = $usr->get_tipo();
    $passHashed = password_hash($password, PASSWORD_BCRYPT, $option);

    $query = $con->prepare("INSERT INTO
            usuarios (nombre, username, password, tipo) 
            VALUES (:nombre, :usuario, :pass, :tipo)");
    $query->bindParam(":nombre", $nombre);
    $query->bindParam(":usuario", $usuario);
    $query->bindParam(":pass", $passHashed);
    $query->bindParam(":tipo", $tipo);
    return $query->execute();
}


function dbread_user($id, $con){
    $query = $con->prepare("SELECT * FROM usuarios WHERE id = :user");
    $query->bindParam(":user", $id);
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