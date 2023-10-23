<?php
  include_once("../view/config.php");
    error_reporting(E_ALL);
  $listaMensajes_recv = [];
  $listaMensajes_sent = [];

 
  function cargarLista_recibidos($conexion,$receptor){ 
    $aux = dbread_msj_RECV($conexion,$receptor);
    while($row = $aux->fetch(PDO::FETCH_ASSOC)){
      $msj = new Mensaje($row["emisor"],$row["destinatario"],$row["asunto"],$row["mensaje"],$row["editado"]);
      $msj->set_id($row["id"]);
      $listaMensajes_recv[] =$msj;
    }
    return $listaMensajes_recv;
  }
 function cargarLista_enviados($conexion,$emisor){
    $_id = 0;  
    $aux = dbread_msj_SENT($conexion,$emisor);
    while($row = $aux->fetch(PDO::FETCH_ASSOC)){
        $msj = new Mensaje($row["emisor"],$row["destinatario"],$row["asunto"],$row["mensaje"],$row["editado"]);
        $msj->set_id($row["id"]);
        $listaMensajes_sent[] =$msj;
    }
    return $listaMensajes_sent;
  }

  //agregar
function enviarMensaje($conexion,$emisor,$dest,$asunto,$contenido){
    $msj = new Mensaje($emisor,$dest,$asunto,$contenido,0);
    var_dump($msj);
    $query = dbcreate_msj($conexion,$msj);
    return $query;
  }

  function editarMensaje($conexion,$msj,$nuevo_asunto,$nuevo_contenido){
      $msj->editar_Mensaje($nuevo_asunto,$nuevo_contenido);
      $query = dbupdate_msj($msj,$conexion);
      return $query;
  }

  function eliminarMensaje(){
      
  }

  function buscarMensaje($conexion,$username){
      $query = dbread_msj($conexion,$username);
      $row = $query->fetch(PDO::FETCH_ASSOC);
      if($row->rowcount() == 1){
      $msj = new Mensaje($row["emisor"],$row["destinatario"],$row["asunto"],$row["mensaje"],$row["editado"]);
      $msj->set_id($row["id"]);
      return $msj;
      }
      else return NULL;
  }

?>