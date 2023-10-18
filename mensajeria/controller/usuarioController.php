<?php
    error_reporting(E_ALL);
    
  class userController{

  private $listaUsuarios;
  private $con;

  public function __construct($con){
    echo 'cargando lista';
    $this->listaUsuarios=array();
    $this->con = $con;
    $this->cargarLista();
    echo 'lista cargada';
  }

  private function cargarLista(){
    echo 'db  no leida ';
    $aux = dbreadALL_user($this->con);
    echo 'db leida';
    while($row = $aux->fetch(PDO::FETCH_ASSOC)){
      $usr =  new Usuario($row["username"],$row["password"],$row["nombre"],$row["tipo"]);
        array_push($this->listaUsuarios,$usr);
        }
    return;
  }
  
  public function agreagarUsuario($user){
    array_push($this->listaUsuarios,$user);
    $query = dbcreate_user($user,$this->con);
    return $query;
  }

  public function editarUsuario(){
      
  }

  public function eliminarUsuario($username){
      
  }

  public function buscarUsuario($username){
      $user = 1;
      $i = 0;
      while($user != null){
        $user = $this->listaUsuarios[$i];
        if(strcmp($user->get_username(),$username) == 0){
          return $user;
        }
        $i = $i+1;
      }
      return null;
  }

  public function login($username, $password){
    /*
      //modificar para usar la lista
      $query = dbread_user($username,$this->con);*/
      $query = $this->buscarUsuario($username);
      if (!is_null($query)){
        $pass = $query->get_password();
        if (strcmp($password, $pass) == 0){
           $_SESSION["userLog"]= $username;
            return true;
        } else {
            return false;
        }
    } else{
        return false;
    }
  }

  public function logout(){
    if ($_SESSION["userLog"]){
      session_destroy();
      echo "Sesion cerrada";
  }
  }

}
?>