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

    
    $id=$sesion->gete($usuario);
  }
 $query = "SELECT * FROM alta where   torneo_id='$_REQUEST[edit_id]';  ";

if ($result = $conexion->query($query)) {
    $conexion->query($query);

  
    while ($row= $result->fetch_assoc()) {
        
 $id=$row["torneo_id"];
        $nec= $row["necesidad"];
        $ofe= $row["oferta"];
        
        $fi= $row["orden_date_inicio"];
        $ff= $row["orden_date_fin"];
        
}
}

if(isset($_POST['actualizar']) && $_POST['actualizar']=='Actualizar')
{
$necesidad=$_POST["nec"];
$oferta =$_POST["ofe"];
$statusPay=$_POST["status"];
$fechai=$_POST["fi"];
$fechaf = $_POST["ff"];
$error=array("necesidad"=>"","oferta"=>"","fi"=>"","ff"=>"");

 if($necesidad=="")
    {
        $error['necesidad']="Campo requerido.";
    }else
    {
        $valid_nec=$necesidad;
    }

if($oferta=="")
    {
        $error['oferta']="Campo requerido.";
    }else
    {
        $valid_of=$oferta;
    }



if($fechai=="")
    {
        $error['fi']="Campo requerido.";
    }else
    {
        $valid_fi=$fechai;
    }
    if($fechaf=="")
    {
        $error['ff']="Campo requerido.";
    }else
    {
        $valid_ff=$fechaf;
    }

    if((strlen($valid_nec)>0)&& (strlen($valid_of)>0)&& (strlen($valid_fi)>0)&& (strlen($valid_ff)>0))
{
 
      $upd="UPDATE alta SET necesidad='$necesidad',oferta='$oferta',orden_date_inicio='$fechai',orden_date_fin='$fechaf'where torneo_id='$_REQUEST[edit_id]'";
      

    
            
            $ejecutar = $conexion->query($upd);

    if($ejecutar)
          {  echo "<script>alert('Se actualizo con exito');
            window.location='torneos.php';
            </script>";}
        else
           { echo "<script>alert('Error al registrarse');
            
            </script>";;
                $conexion->close();
            }

  }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar</title>
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
<?php
echo "variable de serion usuario   ".$usuario."---";
echo "variable de serion id   ".$id;


?>

<form name="f1" method="post"  enctype="multipart/form-data" >
  <table border="1" align="center" rules="groups" height="80%">
    <tr bgcolor="#000000" >
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px">Editar Torneo </h1></th></tr>
 <tr>
      <td width="21%">Necesidad</td>
      <td width="79%"><input type="text" name="nec" id="n" class="fieldsize" value="<?php echo $nec?>" />
       <span class="err"><?php echo $error["necesidad"];?></span></td>
    </tr>

<tr>
      <td width="21%">Oferta</td>
      <td width="79%"><input type="text" name="ofe" id="n" class="fieldsize" value="<?php echo $ofe?>" />
      <span class="err"><?php echo $error["oferta"];?></span></td></td>
    </tr>
<tr>
      <td width="21%">fecha inicio</td>
      <td width="79%"><input type="text" name="fi" id="n" class="fieldsize" value="<?php echo $fi?>" />
        <input type="date" name="cumpleanios" id="login"step="1" autofocus=”autofocus” onchange="fi.value=this.value">
 <span class="err"><?php echo $error["fi"];?></span></td>
       </td>
    </tr>

      <td width="21%">Fecha final</td>
      <td width="79%"><input type="text" name="ff" id="n" class="fieldsize" value="<?php echo $ff?>" />
         <input type="date" name="cumpleanios" id="login"step="1" autofocus=”autofocus” onchange="ff.value=this.value">
      <span class="err"><?php echo $error["ff"];?></span></td> </td>
    </tr>
   

    <tr>
      <td colspan="2" align="right" ><input type="submit" name="actualizar" value="Actualizar" />
      <input type="button" value="Cancel" onclick="alert('Cancelar operacion');window.location='torneos.php';" /></td>
    </tr>
    <tr>
    	<td colspan="2"></td>
    </tr>
  </table>
  
  
</form>
</body>
</html>

