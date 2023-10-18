<?php
    error_reporting(E_ALL);
class msjController{
  private $listaMensajes_recv;
  private $listaMensajes_sent;
  private $con;

  private $usr;

  public function __construct($con,$usr){
      $this->con= $con;
      $this->listaMensajes_recv=[];
      $this->cargarLista_recibidos($usr);
      $this->cargarLista_enviados($usr);
  }
  
  private function cargarLista_recibidos($receptor){ 
    $aux = dbread_msj_RECV($this->con,$receptor);
    while($row = $aux->fetch(PDO::FETCH_ASSOC)){
      $aux = new Mensaje($row["emisor"],$row["destinatario"],$row["asunto"],$row["contenido"],$row["editado"]);
      $aux->set_id($row["id"]);
      $this->listaMensajes_recv[] =$aux;
    }
  }
  private function cargarLista_enviados($emisor){
    $_id = 0;  
    $aux = dbread_msj_SENT($this->con,$emisor);
    while($row = $aux->fetch(PDO::FETCH_ASSOC)){
        $aux = new Mensaje($row["emisor"],$row["destinatario"],$row["asunto"],$row["contenido"],$row["editado"]);
        $aux->set_id($row["id"]);
        $this->listaMensajes_sent[] =$aux;
    }
  }

  //agregar
  public function enviarMensaje($dest,$asunto,$contenido){
    $msj = new Mensaje($this->usr,$dest,$asunto,$contenido,0);
    $this->listaMensajes_sent[] = $msj;
    $query = dbcreate_msj($this->con,$msj);
    return $query;
  }

  function editarMensaje($msj,$nuevo_asunto,$nuevo_contenido){
      $msj->editar_Mensaje($nuevo_asunto,$nuevo_contenido);
      $query = dbupdate_msj($msj,$this->con);
      return $query;
  }

  function eliminarMensaje(){
      
  }

  function buscarMensaje(){
      
  }
}
?>