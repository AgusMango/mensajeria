<?php
    error_reporting(E_ALL);
class msjController{
  private $listaMensajes;
  private $con;

  public function __construct($con){
      $this->con= $con;
      $this->listaMensajes=[];
      $this->cargarLista();
  }
  
  private function cargarLista(){
    $_id = 0;  
    $aux = dbreadALL_msj($this->con);
    while($row = $aux->fetch(PDO::FETCH_ASSOC)){
        $this->listaMensajes[] = new Mensaje($row["emisor"],$row["destinatario"],$row["asunto"],$row["contenido"],$row["editado"]);
        $_id = $_id +1; 
    }
  }

  public function agreagarMensaje(){

  }

  function editarMensaje(){
      
  }

  function eliminarMensaje(){
      
  }

  function buscarMensaje(){
      
  }
}
?>