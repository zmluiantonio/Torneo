<?php
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
 $query = "SELECT * FROM alta where   torneo_id='$_REQUEST[edit_id]';  ";

if ($result = $conexion->query($query)) {
    $conexion->query($query);

  
    while ($row= $result->fetch_assoc()) {
        
        $idt=$row["torneo_id"];
        $ide=$row["empresa_id"];
        $nec= $row["necesidad"];
        $ofe= $row["oferta"];
        $status= $row["statuspay"];
        $fi= $row["orden_date_inicio"];
        $ff= $row["orden_date_fin"];
        
 
}
}





if(isset($_POST['aceptar']) && $_POST['aceptar']=='Accept')
{
    

$fecha_actual = localtime(time(), 1);
$anyo_actual  = $fecha_actual["tm_year"] + 1900;
$mes_actual   = $fecha_actual["tm_mon"] + 1;
$dia_actual   = $fecha_actual["tm_mday"];
$fecha= $anyo_actual."-".$mes_actual."-".$dia_actual;


  $cinsertar = "INSERT INTO orden (torneo_id,proveedor_id,empresa_id,status,fecha) VALUES 
  ('$idt','$id','$ide','Seleccionado','$fecha')";
                
  $ejecutar = $conexion->query($cinsertar);

  if($ejecutar){
    echo "<script>alert('Registro exitoso');
            window.location='ctorneo.php';
            </script>";}
   
 else
           { echo "<script>alert('Error al registrarse');
            window.location='vert.php';
            </script>";;
                $conexion->close();
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


<form name="f1" method="post"  enctype="multipart/form-data" >
  <table border="1" align="center" rules="groups" height="80%">
    <tr bgcolor="#000000" >
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px"> Details Tournament</h1></th></tr>

    
  


    <tr>
      <td width="21%">Need</td>
      <td width="79%"><input type="text" name="nec" id="n" class="fieldsize" value="<?php echo $nec?>"disabled="disabled" />
      
    </tr>

<tr>
      <td width="21%">Offer</td>
      <td width="79%"><input type="text" name="ofe" id="n" class="fieldsize" value="<?php echo $ofe?>" disabled="disabled"/>
      <span class="err"><?php echo $error["oferta"];?></span></td></td>
    </tr>

<tr>
      <td width="21%">Start Date</td>
      <td width="79%"><input type="text" name="fi" id="n" class="fieldsize" value="<?php echo $fi?>" disabled="disabled" />
       
       </td>
    </tr>

      <td width="21%">Final Date</td>
      <td width="79%"><input type="text" name="ff" id="n" class="fieldsize" value="<?php echo $ff?>" disabled="disabled"/>
         
    </tr>
 <tr>
      <td colspan="2" align="right" ><input type="submit" name="aceptar" value="Accept" />
      <input type="button" value="Cancel" onclick="alert('Cancelar operacion');window.location='ctorneo.php';" /></td>
    </tr>
    <tr>
    	<td colspan="2"></td>
    </tr>
  </table>
  
  
</form>
</body>
</html>

