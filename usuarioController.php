<?php
    error_reporting(E_ALL);
    include_once("../view/config.php");


 $listaUsuarios = [];


 function cargarLista($conexion){
    echo 'db  no leida ';
    $aux = dbreadALL_user($conexion);
    echo 'db leida';
    while($row = $aux->fetch(PDO::FETCH_ASSOC)){
      $usr =  new Usuario($row["username"],$row["password"],$row["nombre"],$row["tipo"]);
     $listaUsuarios[] = $usr;
    }
    return $listaUsuarios;
  }
  
 function agreagarUsuario($user, $conexion){
    $listaUsuarios[] = $user;
    $query = dbcreate_user($user,$conexion);
    return $query;
  }

 function editarUsuario(){
      
  }

 function eliminarUsuario($username){
      
  }

function buscarUsuario($username,$listaUsuarios){
      echo '--nombre de usuario: '. $username;
      $i = 0;
      while(1){
        $user = $listaUsuarios[$i];
        if(is_null($user)) break;
        if($user->get_username() == $username){
          echo $user->get_username();
          return $user;
        }
        $i = $i+1;
      }
      return null;
  }

 function login($username, $password,$listaUsuarios){
    /*
      //modificar para usar la lista
      $query = dbread_user($username,$this->con);*/
      $query = buscarUsuario($username,$listaUsuarios);
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

function logout(){
    if ($_SESSION["userLog"]){
      session_destroy();
      echo "Sesion cerrada";
  }
  }


?>