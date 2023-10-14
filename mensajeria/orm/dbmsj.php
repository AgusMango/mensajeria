<?php
    error_reporting(E_ALL);
function dbcreate_msj(){

}


function dbread_msj(){

}
function dbread_msj_RECV($con,$username){
    $query = $con->prepare("SELECT * FROM mensajes WHERE ");
    $query->execute();
    return $query;
}


function dbread_msj_SENT($con){
    $query = $con->prepare("SELECT * FROM mensajes WHERE ");
    $query->execute();
    return $query;
}
function dbupdate_msj(){

}

function dbdelete_msj(){

}
?>