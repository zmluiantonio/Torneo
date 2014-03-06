<?php
  require_once("sesion.class.php");
  include("con.php");
  $sesion = new sesion();
  $usuario = $sesion->get("empresa");
  
  if( $usuario == false )
  { 
  echo "<script>alert('Debe iniciar Sesion');
            window.location='index.php';
            </script>";  
  }else{

    $usrm=$sesion->get("empresa");
  }
  $query = "SELECT * FROM empresa WHERE usr = '$usrm' ";

if ($result = $conexion->query($query)) {
    $conexion->query($query);

    while ($row = $result->fetch_assoc()) {

      
        echo $id= $row["empresa_id"];
         
          
        
        }}

        header("location: empresa.php?id=$id;")


  
 ?>