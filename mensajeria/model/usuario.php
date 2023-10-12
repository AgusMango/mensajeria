<?php
class Usuario {
    //propiedades
    private $username;
    private $pass;
    private $nombre;
    private $tipo;
    private $id;
    // Metodos

    public function __construct($usern,$password, $name, $type){
        $this->username = $usern;
        $this->pass = $password;
        $this->nombre = $name;
        $this->tipo = $type;
        
    }

    public function editar(){
            
    }

    public function eliminar(){

    }
    public function get_username(){
        return $this->username;
    }
    public function get_password(){
        return $this->pass;
    }
    public function get_nombre(){
        return $this->nombre;
    }
    public function get_tipo(){
        return $this->tipo;
    }
    public function get_id(){
        return $this->id;
    }
}

?>