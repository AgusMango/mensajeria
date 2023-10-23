<?php
    error_reporting(E_ALL);
class Mensaje {
    // Propiedades
    private $emisor;
    private $destinatario;
    private $asunto;
    private $contenido;

    private $editado;

    private $id = 0;

    // Metodos

    public function __construct($s,$r,$a,$c,$e){
             $this->emisor= $s;
             $this->destinatario=$r;
             $this->asunto=$a;
             $this->contenido=$c;
             $this->editado= $e;
    }

    public function editar_Mensaje($nuevo_contenido,$nuevo_asunto){
        $this->contenido = $nuevo_contenido;
        $this->asunto = $nuevo_asunto;
        $this->editado = 1;
    }

    public function eliminarMensaje(){

    }

    public function set_id($n){
        $this->id = $n;
    }

    public function get_emisor(){
        return $this->emisor;
    }

    public function get_destinatario(){
        return $this->destinatario;
    }
    public function get_asunto(){
        return $this->asunto;
    }
    public function get_contenido(){
        return $this->contenido;
    }
    public function get_editado(){
        return $this->editado;
    }
    public function get_id(){
        return $this->id;
    }
}

?>