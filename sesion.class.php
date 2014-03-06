<?php
class sesion {
  function __construct() {
     session_start ();
  }
//@Luis set and get function's to user 
public function set($nombre, $valor) {
     $_SESSION [$nombre] = $valor;
  }
public function get($nombre) {
     if (isset ( $_SESSION [$nombre] )) {
        return $_SESSION [$nombre];
     } else {
         return false;
     }
  }

//@Luis set and get function's to id
  public function sete($valor, $id) {
     $_SESSION [$valor] = $id;
  }
  public function gete($valor) {
     if (isset ( $_SESSION [$valor] )) {
        return $_SESSION [$valor];
     } else {
         return false;
     }
  }
/*
//@Luis set and get function's to name
    public function setn($id, $nom) {
     $_SESSION [$id] = $nom;
  }
    public function getn($id) {
     if (isset ( $_SESSION [$id] )) {
        return $_SESSION [$id];
     } else {
         return false;
     }
  }

//@Luis set and get function's to telephone
  public function settel($valorn, $telefono) {
     $_SESSION [$valorn] = $telefono;
  }
    public function gettel($valorn) {
     if (isset ( $_SESSION [$valorn] )) {
        return $_SESSION [$valorn];
     } else {
         return false;
     }
  }

//@Luis set and get function's to contry
  public function setc($valorc, $pais) {
     $_SESSION [$valorc] = $pais;
  }
    public function getc($valorc) {
     if (isset ( $_SESSION [$valorc] )) {
        return $_SESSION [$valorc];
     } else {
         return false;
     }
  }
/*
//@Luis set and get function's to direc
  public function setdi($valord, $dir) {
     $_SESSION [$valord] = $dir;
  }
    public function getdi($valord) {
     if (isset ( $_SESSION [$valord] )) {
        return $_SESSION [$valord];
     } else {
         return false;
     }
  }

//@Luis set and get function's to des
  public function setde($valorde, $des) {
     $_SESSION [$valorde] = $des;
  }
    public function getde($valorde) {
     if (isset ( $_SESSION [$valorde] )) {
        return $_SESSION [$valorde];
     } else {
         return false;
     }
  }

//@Luis set and get function's to rfc
  public function setr($valorr, $rfc) {
     $_SESSION [$valorr] = $rfc;
  }
    public function getr($valorr) {
     if (isset ( $_SESSION [$valorr] )) {
        return $_SESSION [$valorr];
     } else {
         return false;
     }
  }


*/



  public function elimina_variable($nombre,$valor) {
      unset ( $_SESSION [$nombre] );
      unset ( $_SESSION [$valor] );
      
  }
  public function termina_sesion() {
      $_SESSION = array();
      session_destroy ();
  }
}
?>