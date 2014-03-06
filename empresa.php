<?php
  require_once("sesion.class.php");
  // @Luis incluir la coexion de la base de datos
  include("con.php");
  $sesion = new sesion();
  // @Luis funcion para validar datos de usuario
  
  $usuario = $sesion->get("empresa");
  

  // @Luis Validar que se inicie sesion
  
  if( $usuario == false )
  { 
  echo "<script>alert('Debe iniciar Sesion');
            window.location='index.php';
            </script>";  
  }else{


}

    
    $id=$sesion->gete($usuario);
    //$nom=$sesion->getn($usuario);
    //$tel=$sesion->gettel($usuario);
   //$pa=$sesion->getc($usuario);
    /*$dir=$sesion->getdi($usuario);
    $des=$sesion->getde($usuario);
    $rfc=$sesion->getr($usuario);
    
*/
  

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
   
       
echo "a".$usuario."---";
echo "b".$id."---";
/*echo "c".$nom."---";
echo "d".$tel."---";
//echo "e".$pa."---";
echo "f".$dir."---";
echo "g".$des."---";
echo "h".$rfc."---";
*/

?>

<form name="f1" method="post"  enctype="multipart/form-data">
  <table border="1" align="center" rules="groups" height="150%">
    <tr bgcolor="#000000" >
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px">Welcome: <?php echo $usuario;


   
  // @Luis select data of company
    $query = "SELECT * FROM empresa WHERE usr = '$usuario' ";

    if ($result = $conexion->query($query)) {
    $conexion->query($query);

    while ($row = $result->fetch_assoc()) {

      
         $nom = $row["nombre"];
         $tel=$row["telefono"];
         $pais=$row["pais"];
         $dir=$row["direccion"];
        $des=$row["descripcion"];
        $rfc=$row["rfc"];
         $file=$row["file"];
          
        }}
    


      ?></h1></th></tr>


    <tr> 

<td width="21%"><h5><a href="Eempresa.php" style="color:#9A9A9A;">Edit Profile</a><br>
                <a href="ef.php" style="color:#9A9A9A;">Edit Profile Picture</a><br>
                <a href="torneos.php" style="color:#9A9A9A;">Add Tournament</a><br>
                
                 <a href="calificar.php" style="color:#9A9A9A;">Qualify*</a></h5><br>
</td> 

  
      <td width="21%"><img src="View.php?id=<?=$id;?>" height="150" width="150">*<br>
   
 </tr>

    <tr>
      <td width="21%">Name</td>
      <td width="79%"><input type="text" id="n" class="fieldsize" value="<?php echo $nom;?>" disabled="disabled" />
       </td>
    </tr>

<tr>
      <td width="21%">Telephone</td>
      <td width="79%"><input type="text"  id="n" class="fieldsize" value="<?php echo $tel;?>"  disabled="disabled"/>
       </td>
    </tr>
<tr>
      <td width="21%">Country</td>
      <td width="79%"><input type="text"  id="n" class="fieldsize" value="<?php echo $pais;?>"  disabled="disabled"/>
       </td>
    </tr>



<tr>
      <td width="21%">Address</td>
      <td width="79%"><textarea  class="fieldsize" disabled="disabled" ><?php echo $dir;?></textarea>  
       </td>
    </tr>

<tr>
      <td width="21%">Description</td>
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

<?     





?>