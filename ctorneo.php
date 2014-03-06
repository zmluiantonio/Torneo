<?php
  require_once("sesion.class.php");
    include ("con.php");
  $sesion = new sesion();
  $usuario = $sesion->get("competidor");
  
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
<title>See Tournament</title>
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

      <a href="competidor.php" style="color:#000;">Go Back</a><br><br>




<form name="view" method="post">
  <table align="center" class="record_table" >
    <tr bgcolor="#000000" height="50" style="color:#FFF;">
      <th>&nbsp;</th>
      
      <th>Need</th>
      <th>Offer</th>
      
      <th>Start Date</th>
      <th>Final Date</th>
      <th>Action</th>
    </tr>
<?php
   $query = "SELECT * FROM alta WHERE statuspay='Pagado'";



if ($result = $conexion->query($query)) {
    $conexion->query($query);

    while ($row = $result->fetch_assoc()) {
        
      $id = $row["torneo_id"];
      $ide = $row["empresa_id"];
       $nece = $row["necesidad"];
       $ofer = $row["oferta"];
       $status = $row["statuspay"]; 
       $fi = $row ["orden_date_inicio"];
       $ff = $row["orden_date_fin"];     



?>
     

    <tr class="s" onclick="">
      <td><div class="squaredThree">
  
  <!--<label for="squaredThree"></label>-->
</div></td>




    
      <td><?php echo $nece; ?></td>
      <td><?php echo $ofer; ?></td>
      
      <td><?php echo $fi; ?></td>
      <td><?php echo $ff; ?></td>

     
      <td> <a href="vert.php?edit_id=<?php echo $id; ?>"><b>See</b></a></td>
    </tr>
  
 
    
<?php


}}
    ?>
  </table>
</form>
</body>
</html>

