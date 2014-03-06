<?php
  require_once("sesion.class.php");
 
  include("con.php");
  $sesion = new sesion();
  $usuario = $sesion->get("Admin");
  
if( $usuario == false )
  { 
  echo "<script>alert('Debe iniciar Sesion');
            window.location='index.php';
            </script>";  
  }else{



    $usrm=$sesion->get("Admin");
    //$idd=$sesion->gete("empresa");
    

  

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<title>Bienvenido</title>
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
   
       
echo "variable de serion usuario   ".$usrm;



?>

<form name="f1" method="post"  enctype="multipart/form-data">
  <table border="1" align="center" rules="groups" height="150%">
    <tr bgcolor="#000000" >
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px">Welcome: <?php echo $usrm;



    
}

      ?></h1></th></tr>


    <tr> 

<td width="21%"><h5><a href="" style="color:#9A9A9A;">Edit Profile</a><br>
                <a href="" style="color:#9A9A9A;">Edit Profile Picture </a><br>
                <a href="" style="color:#9A9A9A;">See Company??</a><br>
                <a href="" style="color:#9A9A9A;">See competitors??</a><br>
                <a href="vtorneos.php" style="color:#9A9A9A;">See Tournaments</a><br>
                <a href="orden.php" style="color:#9A9A9A;">Orden</a><br>
                <a href="estadisticas.php" style="color:#9A9A9A;">Estadisticas</a><br>
</td> 

  <!--// @Luis Seleccion de datos de empresa-->
      <td width="21%"><img src="c.jpg" height="150" width="150">*<br>
   
 </tr>

    <tr>
      <td width="21%">Nombre</td>
      <td width="79%"><input type="text" id="n" class="fieldsize" value="<?php echo $nom;?>" disabled="disabled" />
       </td>
    </tr>

<tr>
      <td width="21%">Telefono</td>
      <td width="79%"><input type="text"  id="n" class="fieldsize" value="<?php echo $tel;?>"  disabled="disabled"/>
       </td>
    </tr>
<tr>
      <td width="21%">Pais</td>
      <td width="79%"><input type="text"  id="n" class="fieldsize" value="<?php echo $pais;?>"  disabled="disabled"/>
       </td>
    </tr>



<tr>
      <td width="21%">Direccion</td>
      <td width="79%"><textarea  class="fieldsize" disabled="disabled" ><?php echo $dir;?></textarea>  
       </td>
    </tr>

<tr>
      <td width="21%">Descripcion</td>
      <td width="79%"><textarea  class="fieldsize" disabled="disabled" ><?php echo $des;?></textarea>
       </td>
    </tr>

    <tr>
      <td width="21%">RFC</td>
      <td width="79%"><input type="text" name="country" id="n" class="fieldsize" value="<?php echo $rfc;?>" disabled="disabled" />
       </td>
    </tr>

<tr><td></td></tr>

<tr>
      <td colspan="2" align="center"><a href="cerrar.php" style="color:#000;">Log Out</a></td>
      
    </tr>




    
  </table>
 
  
</form>
</body>
</html>

