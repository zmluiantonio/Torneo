<?php

  // @Luis perfil competidor

  require_once("sesion.class.php");
  include("con.php");
  $sesion = new sesion();
  $usuario = $sesion->get("competidor");
  
  if( $usuario == false )
  { 
  echo "<script>alert('Debe iniciar Sesion');
            window.location='index.php';
            </script>";  
  }else{

   
    $id=$sesion->gete($usuario);
  }
  
$sel= "SELECT * FROM competidor WHERE usr = '$usuario'";
if ($result = $conexion->query($sel)) {
    $conexion->query($sel);

    while ($row = $result->fetch_assoc()) {

    
        //$id= $row["proveedor_id"];
         $nom = $row["nombre"];
         $pais=$row["pais"];
         $email=$row["email"];
         $cta=$row["cta_bancaria"];
        $paypal=$row["paypal"];
        $rfc=$row["RFC"];
         $dir=$row["direccion"];

       }}

  
$sel= "SELECT SUM(calificacion) AS total FROM calificacion WHERE proveedor_id = '$id'";
if ($result = $conexion->query($sel)) {
    $conexion->query($sel);

    while ($row = $result->fetch_assoc()) {

    
        
       $cal=$row["total"];

       }}



 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<title>Welcome</title>
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
  padding-left:5px;
}
table 
  {
    line-height:40px;
    width:80%;
    line-height:40px;
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
<?php
echo "a".$usuario."---";
echo "b".$id."---";
?>
<form name="f1" method="post"  enctype="multipart/form-data">
  <table border="1" align="center" rules="groups" height="150%">
    <tr bgcolor="#000000" >
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px">Welcome:<?php echo $usuario?></h1></th></tr>


    <tr>
<td width="21%"><h5><a href="Ecompetidor.php" style="color:#9A9A9A;">Edit Profile</a><br>
                <a href="efc.php" style="color:#9A9A9A;">Edit Profile Picture</a><br>
                <a href="ctorneo.php" style="color:#9A9A9A;">See Tournaments</a><br>
                 
</td> 
      <td width="21%"><img src="viewc.php?id=<?=$id;?>" height="150" width="150"><br></td></tr>


<tr>
      <td width="21%">Puntos</td>
      <td width="79%"><input type="text" id="n" class="fieldsize" name="nom" value="<?php echo $cal;?>"disabled="disabled" />
       <span class="err"><?php echo $error["nombre"];?></span></td>
    </tr>


    <tr>
      <td width="21%">Name</td>
      <td width="79%"><input type="text" id="n" class="fieldsize" value="<?php echo $nom;?>" disabled="disabled" />
       </td>
    </tr>


<tr>
      <td width="21%">Country</td>
      <td width="79%"><input type="text"  id="n" class="fieldsize" value="<?php echo $pais;?>"  disabled="disabled"/>
       </td>
    </tr>

<tr>
      <td width="21%">Email</td>
      <td width="79%"><input type="text"  id="n" class="fieldsize" value="<?php echo $email;?>"  disabled="disabled"/>
       </td>
    </tr>
<tr>
      <td width="21%">Bank Account</td>
      <td width="79%"><input type="text"  id="n" class="fieldsize" value="<?php echo $cta;?>"  disabled="disabled"/>
       </td>
    </tr>

    <tr>
      <td width="21%">Paypal</td>
      <td width="79%"><input type="text"  id="n" class="fieldsize" value="<?php echo $paypal;?>"  disabled="disabled"/>
       </td>
    </tr>

    <tr>
      <td width="21%">RFC</td>
      <td width="79%"><input type="text"  id="n" class="fieldsize" value="<?php echo $rfc;?>"  disabled="disabled"/>
       </td>
    </tr>

<tr>
      <td width="21%">Address</td>
      <td width="79%"><textarea  class="fieldsize" disabled="disabled" ><?php echo $dir;?></textarea>
       </td>
    </tr>

    

<tr>
      <td colspan="2" align="center"><a href="cerrar.php" style="color:#000;">Log Out</a></td>
    </tr>




    
  </table>
  
  
</form>
</body>
</html>

