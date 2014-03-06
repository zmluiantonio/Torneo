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

    $usrm=$sesion->get("empresa");
  }
 
$query = "SELECT * FROM orden where   torneo_id='$_REQUEST[edit_id]';  ";

if ($result = $conexion->query($query)) {
    $conexion->query($query);
while ($row= $result->fetch_assoc()) {
        
        $idt=$row["torneo_id"];
        $idp= $row["proveedor_idroveedor"];
        $ide= $row["empresa_id"];
        $f= $row["fecha"];
        $status = $row["status"];
        $ref= $row["referencia"];
        
}
}

$query = "SELECT * FROM alta where   torneo_id='$_REQUEST[edit_id]';  ";

if ($result = $conexion->query($query)) {
    $conexion->query($query);
while ($row= $result->fetch_assoc()) {
        
        $nec=$row["necesidad"];
        $of= $row["oferta"];
        
}
}

if(isset($_POST['aceptar']) && $_POST['aceptar']=='Aceptar')
{
    //echo "hiii";

$status =$_POST["status"];
$ref =$_POST["ref"];

$error=array("st"=>"","ref"=>"");
   
   if($status=="")
    {
        $error['st']="Campo requerido.";
    }else
    {
        $valid_st=$status;
    }

    
if($ref=="")
    {
        $error['ref']="Campo requerido.";
    }else
    {
        $valid_ref=$ref;
    }


   if((strlen($valid_st)>0)&& (strlen($valid_ref)>0))
{
  $upd="UPDATE orden SET status='$status',referencia='$ref' where torneo_id='$idt'";
      
                
  $ejecutar = $conexion->query($upd);

  if($ejecutar){
    echo "<script>alert('Registro exitoso');
            window.location='orden.php';
            </script>";}
   
 else
           { echo "<script>alert('Error al registrarse');
            window.location='edito.php';
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


<form name="f1" method="post"  enctype="multipart/form-data" >
  <table border="1" align="center" rules="groups" height="80%">
    <tr bgcolor="#000000" >
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px"> Editar orden de torneo </h1></th></tr>

   

    <tr>
      <td width="21%">Necesidad</td>
      <td width="79%"><input type="text" name="nec" id="n" class="fieldsize" value="<?php echo $nec?>"disabled="disabled" />
      
    </tr>

<tr>
      <td width="21%">Oferta</td>
      <td width="79%"><input type="text" name="ofe" id="n" class="fieldsize" value="<?php echo $of?>" disabled="disabled"/>
      <span class="err"><?php echo $error["oferta"];?></span></td></td>
    </tr>











<tr>
      <td width="21%">fecha</td>
      <td width="79%"><input type="text" name="fi" id="n" class="fieldsize" value="<?php echo $f?>" disabled="disabled" />
       
       </td>
    </tr>

     

    <tr>
      <td>Referencia</td>
      <td><textarea name="ref" class="fieldsize"  ><?php echo $ref?></textarea>
       <span class="err"><?php echo $error["ref"];?></span></td>
     
    </tr>

   <tr>
      <td>Status*</td>



    <td><select name="status" class="fieldsize" >
            <option value="">- - -</option> 

 

        <option value="Abierto"<?php if($status=='Abierto') echo "selected='selected'";?> >Abierto</option>
        <option value="Seleccionado" <?php if($status=='Seleccionado') echo "selected='selected'";?>>Seleccionado</option>
        <option value="Cancelado"<?php if($status=='Cancelado') echo "selected='selected'";?> >Cancelado</option>
        <option value="Exito" <?php if($status=='Exito') echo "selected='selected'";?>>Exito</option>
        
 </select>
       <span class="err"><?php echo $error["st"];?></span>
       </td> </tr>


    <tr>
      <td colspan="2" align="right" ><input type="submit" name="aceptar" value="Aceptar" />
      <input type="button" value="Cancel" onclick="alert('Cancelar operacion');window.location='orden.php';" /></td>
    </tr>
    <tr>
    	<td colspan="2"></td>
    </tr>
  </table>
  
  
</form>
</body>
</html>

