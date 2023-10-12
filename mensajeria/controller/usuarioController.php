<?php
  class userController{

  private $listaUsuarios;
  private $con;

  public function construct($con){
    $this->listaUsuarios=[];
    $this->con = $con;
  }


  public function agreagarUsuario(){
    
  }

  public function editarUsuario(){
      
  }

  public function eliminarUsuario($username){
      
  }

  public function buscarUsuario($username){
      $user = dbread_user($username,$this->con);
      return $user;
  }

  public function login($username, $password){
      //modificar para usar la lista
      $query = dbread_user($username,$this->con);
      if ($query->rowCount() == 1){
      $row = $query->fetch(PDO::FETCH_ASSOC);
        $passHashed = $row["password"];
        if (password_verify($password, $passHashed)){
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
  public function cargarLista($con){
    $seguir = 1;
    $_id = 0;  
    while($seguir){
      $aux = dbread_user($_id,$this->con);
      if(!$aux->rowCount()){
        $seguir = 0;
      }
      else{
        $row = $aux->fetch(PDO::FETCH_ASSOC);
        $this->listaUsuarios[] = new Usuario($row["username"],$row["password"],$row["nombre"],$row["tipo"]);
        $_id = $_id +1; 
      }
    }
  }
}
?>