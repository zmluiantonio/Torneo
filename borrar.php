<?php 

  // @Luis sentencia delete
  if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
  {
    

    $id=$_REQUEST['delete_id'];
    $del="DELETE FROM alta WHERE torneo_id='$torid'";
    $ejecutar = $conexion->query($del);
    echo "<script>
      alert('Registro Eliminado');
      window.location='torneos.php';
      </script>";
  }
  
?>