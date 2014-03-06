<?php
  require_once("sesion.class.php");
  
  $sesion = new sesion();
  $usuario = $sesion->get("Admin");
  
  if( $usuario == false )
  { 
  echo "<script>alert('Debe iniciar Sesion');
            window.location='index.php';
            </script>";  
  }
  else 
  {


       $id=$sesion->gete($usuario);

     }
  
  

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bienvenido</title>
<style type="text/css">
table {
  line-height:40px;
  width:100%;
  line-height:50px;
  height:auto;
  border:#000 1px solid;
  border-collapse:collapse
}
td {
  padding-left:20px;
  font-weight:bold;
}
.s:hover {
  background-color:#4E577C;
  cursor:pointer;
}
.squaredThree {
  width: 20px;
  margin: 20px auto;
  position: relative;
}
.squaredThree label {
  cursor: pointer;
  position: absolute;
  width: 20px;
  height: 20px;
  top: 0;
  border-radius: 4px;
  -webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, .4);
  -moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, .4);
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, .4);
  background: -webkit-linear-gradient(top, #222 0%, #45484d 100%);
  background: -moz-linear-gradient(top, #222 0%, #45484d 100%);
  background: -o-linear-gradient(top, #222 0%, #45484d 100%);
  background: -ms-linear-gradient(top, #222 0%, #45484d 100%);
  background: linear-gradient(top, #222 0%, #45484d 100%);
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#222', endColorstr='#45484d', GradientType=0 );
}
.squaredThree label:after {
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: alpha(opacity=0);
  opacity: 0;
  content: '';
  position: absolute;
  width: 9px;
  height: 5px;
  background: transparent;
  top: 4px;
  left: 4px;
  border: 3px solid #fcfff4;
  border-top: none;
  border-right: none;
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
 .squaredThree label:hover::after {
 -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
 filter: alpha(opacity=30);
 opacity: 0.3;
}
.squaredThree input[type=checkbox]:checked + label:after {
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: alpha(opacity=100);
  opacity: 1;
}
</style>
<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
   $('.record_table tr').click(function(event) {
    if (event.target.type !== 'checkbox') {
      $(':checkbox', this).trigger('click');
    }
  });
});
</script>
</head>
<body>




    

 <th align="left" colspan="2"><h1 style="color:#000;padding-left:20px"> 




 </h1> </th>

 
      <a href="Administrador.php" style="color:#000;"> Go Back </a><br>




<form name="view" method="post">
  <table align="center" class="record_table" >
    <tr bgcolor="#000000" height="50" style="color:#FFF;">
      <th>&nbsp;</th>
     
      <th>Torneo ID</th>
      <th>Proveedor ID</th>
      <th>Empresa ID</th>
      <th>Status</th>
      <th>fecha</th>
      <th>Action</th>
    </tr>
    <?php
  include ("con.php");
   $query = "SELECT * FROM orden ";

if ($result = $conexion->query($query)) {
    $conexion->query($query);

    while ($row = $result->fetch_assoc()) {
        $torid = $row["torneo_id"];
        $proid = $row["proveedor_id"];
        $empid = $row["empresa_id"];
        $status = $row["status"];
        $fecha = $row["fecha"];
        

?>

    <tr class="s" onclick="">
      <td><div class="squaredThree">
  <input type="checkbox" value="" id="squaredThree" name="chbox[]" />
  <!--<label for="squaredThree"></label>-->
</div></td>
      
     
      <td><?php echo $torid; ?></td>
      <td><?php echo $proid; ?></td>
      <td><?php echo $empid; ?></td>
      <td><?php echo $status; ?></td>
      <td><?php echo $fecha; ?></td>
      >





     
    
     
      <td><a href="?delete_id=<?php echo $torid;?>&amp;action=delete"><b>Delete</b></a> || <a href="edito.php?edit_id=<?php echo $torid; ?>"><b>Edit</b></a></td>
    </tr>
  
    <?php
  }
}
    ?>
    
  </table>
</form>
</body>
</html>
<?php 
  if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
  {
    

    $idb=$_REQUEST['delete_id'];
    $del="DELETE FROM alta WHERE torneo_id='$idb'";
    $ejecutar = $conexion->query($del);
    echo "<script>
      alert('Registro Eliminado');
      window.location='torneos.php';
      </script>";
  }
  


?>
