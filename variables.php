<?php

require_once("sesion.class.php");
// @Luis  se crea una variable de tipo sesion
  $sesion = new sesion();
  
  
    echo "datos de texbox<br>";
  echo   $usuario = "cocacolamx";
  echo   $password = "123123";


echo "<br>";
  function vari($usuario,$password){
      global$idd;
      global$nombre;
    echo "<br>Funcion de variables <br>";
    include("con.php");
$query = "SELECT * FROM empresa WHERE usr = '$usuario' AND pasw='$password' ";

    if ($result = $conexion->query($query)) {
    $conexion->query($query);

    while ($row = $result->fetch_assoc()) {

      
      $idd=$row["empresa_id"];
      $nombre=$row["nombre"];
        }}

       
    echo "variable dento de funcion  ".$idd."<br>";
   echo "variable dento de funcion  ".$nombre."<br>";
  
  }

  function validarUsuario($usuario,$password)
  {
   

    

     echo "<br>funcion de validacion";


     include("con.php");
    $consultac = "select pasw from empresa where usr = '$usuario';";
    
    $resultc = $conexion->query($consultac);
      
    if($resultc->num_rows > 0)
    {
      $filac = $resultc->fetch_assoc();
      if( strcmp($password,$filac["pasw"]) == 0 ){
       
        echo "<br>todo es correcto";
        return true;            
      }
      else          
        return false;
        
      
    }
    else
        return false;

  }
    
  if(validarUsuario($usuario,$password) == true)
    {     
      vari($usuario,$password);

$id = $idd;
$nom=$nombre;
      //vari($usuario,$password);
      //   set($nombre, $valor)
          //  $_SESSION [$nombre] = $valor;
      $sesion->set("empresa",$usuario);

        //sete($valor, $id) {
     //$_SESSION [$valor] = $id;
      $sesion->sete($usuario,$id);
    
      //public function setn($id, $nom) 
     //$_SESSION [$id] = $nom;
      
      $sesion->setn($id,$nom);

  


      header("location: v.php");
      
    }
      else{
            
            echo "<script>alert('Verifica tus datos');
                  
                  </script>";
          }
      
  
    
?>