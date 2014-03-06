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
 $query = "SELECT* FROM calificacion WHERE id = '$_REQUEST[edit_id]' ";

if ($result = $conexion->query($query)) {
    $conexion->query($query);

    while ($row = $result->fetch_assoc()) {

      
        $idc= $row["proveedor_id"];
       $ide= $row["empresa_id"];
   $cala= $row["calificacion"];
       $des=$row["descripcion"];

        
}}

 $query = "SELECT* FROM competidor WHERE proveedor_id='$idc' ";

if ($result = $conexion->query($query)) {
    $conexion->query($query);

    while ($row = $result->fetch_assoc()) {

      
        $nombre=$row["nombre"];
        $email = $row["email"];
       

        
}}


$query = "SELECT SUM(calificacion) AS total FROM calificacion WHERE proveedor_id = '$idc' ";

if ($result = $conexion->query($query)) {
    $conexion->query($query);

    while ($row = $result->fetch_assoc()) {

      
        $cal= $row["total"];
        
}}
$me=$cal-$cala;//resta de ls puntos 


if(isset($_POST['calificar']) && $_POST['calificar']=='Calificar')
{
    //echo "hiii";
$calificar = $_POST["cal"];
$des =$_POST["des"];


$error=array("cal"=>"","des"=>"");
   
   if($cal=="")
    {
        $error['cal']="Campo requerido.";
    }else
    {
        $valid_cal=$cal;
    }

    if($des=="")
    {
        $error['des']="Campo requerido.";
    }else
    {
        $valid_des=$des;
    }
   if((strlen($valid_cal)>0)&& (strlen($valid_des)>0))
{
 $upd="UPDATE calificacion SET calificacion='$calificar',descripcion='$des'where id='$_REQUEST[edit_id]'";
      
                
  $ejecutar = $conexion->query($upd);

  if($ejecutar){
    echo "<script>alert('Registro exitoso');
            window.location='calificar.php';
            </script>";}
   
 else
           { echo "<script>alert('Error al registrarse');
            window.location='cal.php';
            </script>";;
                $conexion->close();
            }
            

  }


}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calificar</title>
<script type="text/javascript" language="javascript" >
function checkEmail(str)
{
  var xmlhttp;
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("checkEmail").innerHTML=xmlhttp.responseText;
    }
    }
xmlhttp.open("POST",str,true);
xmlhttp.send();
}


</script>
<style type="text/css">

h1 {
  margin:0px;
  padding:0px;
}
.err {
  color:red;
}
.fieldsize {
  width:200px;
}
table 
  {
    line-height:40px;
    width:80%;
    line-height:50px;
    height:auto;
    border:#000 1px solid;
    border-collapse:collapse 
  }
td
{
  padding-left:50px;
  font-weight:bold;
}


</style>
</head>
<body>


<form name="f1" method="post"  enctype="multipart/form-data" >
  <table border="1" align="center" rules="groups" height="80%">
    <tr bgcolor="#000000" >
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px">Calificar Competidor </h1></th></tr>

    
  


    <tr>
      <td width="21%">Nombre</td>
      <td width="79%"><input type="text" name="nec" id="n" class="fieldsize" value="<?php echo $nombre?>" disabled="disabled"/>
       
    </tr>

<tr>
      <td width="21%">Email</td>
      <td width="79%"><input type="text" name="ofe" id="n" class="fieldsize" value="<?php echo $email?>" disabled="disabled"/>
      
    </tr>
    <tr>
      <td width="21%">Puntos Actuales</td>
      <td width="79%"><input type="text" name="ofe" id="n" class="fieldsize" value="<?php echo $me?>" disabled="disabled"/>
      
    </tr>

<tr>
      <td width="21%">Calificación*</td>
      <td><select name="cal" class="fieldsize" >
            <option value="">- - -</option> 

 

        <option value="1"<?php if($cala=='1') echo "selected='selected'";?>>1</option>
        <option value="2" <?php if($cala=='2') echo "selected='selected'";?>>2</option>
        <option value="3"<?php if($cala=='3') echo "selected='selected'";?>>3</option>
        <option value="4"<?php if($cala=='4') echo "selected='selected'";?>>4</option>
        <option value="5"<?php if($cala=='5') echo "selected='selected'";?>>5</option>
        <option value="6"<?php if($cala=='6') echo "selected='selected'";?>>6</option>
        <option value="7"<?php if($cala=='7') echo "selected='selected'";?>>7</option>
        <option value="8"<?php if($cala=='8') echo "selected='selected'";?>>8</option>
        <option value="9"<?php if($cala=='9') echo "selected='selected'";?>>9</option>
        <option value="10"<?php if($cala=='10') echo "selected='selected'";?>>10</option>
        
 </select>
       <span class="err"><?php echo $error["cal"];?></span>
       </td>
    </tr>


<tr>
      <td>Descripción*</td>
      <td><textarea name="des" class="fieldsize"><?php echo $des?></textarea>
      <span class="err"><?php echo $error["des"];?></span><td/>
    </tr>
   

    <tr>
      <td colspan="2" align="right" ><input type="submit" name="calificar" value="Calificar" />
      <input type="button" value="Cancel" onclick="alert('Cancelar operacion');window.location='calificar.php';" /></td>
    </tr>
    <tr>
      <td colspan="2"></td>
    </tr>
  </table>
  
  
</form>
</body>
</html>

