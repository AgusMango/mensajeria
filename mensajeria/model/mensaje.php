<?php
    error_reporting(E_ALL);
class Mensaje {
    // Propiedades
    private $emisor;
    private $destinatario;
    private $asunto;
    private $contenido;

    private $editado;

    // Metodos

    function __construct($e,$d,$a,$c){
             $this->emisor= $e;
             $this->destinatario=$d;
             $this->asunto=$a;
             $this->contenido=$c;
             $this->editado= 0;
    }

    function editarMensaje(){

    }

    function eliminarMensaje(){

    }

}

?>