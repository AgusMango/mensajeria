<?php
    error_reporting(E_ALL);
function dbcreate_msj($con,$msj){
    $query = $con->prepare("INSERT INTO mensajes (emisor,destinatario,asunto,mensaje,editado)VALUES(:e,:d,:a,:m,:ed)");
    $query->bindParam(':e', $msj->get_emisor());
    $query->bindParam(':d', $msj->get_destinatario());
    $query->bindParam(':a', $msj->get_asunto());
    $query->bindParam(':c', $msj->get_contenido());
    $query->bindParam(':ed', $msj->get_editado());
    $query->execute();
    return $query;
}


function dbread_msj_RECV($con,$username){
    $query = $con->prepare("SELECT * FROM mensajes WHERE destinatario = :destinatario");
    $query->bindParam(':destinatario', $username);
    $query->execute();
    return $query;
}


function dbread_msj_SENT($con,$username){
    $query = $con->prepare("SELECT * FROM mensajes WHERE emisor = :emisor");
    $query->bindParam(':emisor', $username);
    $query->execute();
    return $query;
}
function dbupdate_msj($msj,$con){
    $query = $con->prepare("UPDATE mensajes SET asunto = :asunto, mensaje = :contenido, editado = :e WHERE id = :id");
    $query->bindParam(':asunto', $msj->get_asunto());
    $query->bindParam(':mensaje', $msj->get_contenido());
    $query->bindParam(':editado', 1);
    $query->bindParam(':id',$msj->get_id());
    $query->execute();
    return $query;
}

function dbdelete_msj(){

}
?>