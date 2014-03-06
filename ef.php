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
    $id=$sesion->gete($usuario);
  
  


}


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
   
       



?>

<form name="f1" method="post"  enctype="multipart/form-data">
  <table border="1" align="center" rules="groups" height="150%">
    <tr bgcolor="#000000" >
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px">Edit Profile Picture: <?php echo $usrm;?></h1></th></tr>


    

      <td width="21%"><img src="View.php?id=<?=$id;?>" height="150" width="150"><br>
   
 

   
    <tr>
      <td colspan="2" align="left" ><input type="submit" name="actualizar" value="Update" />
                                    <input type="button" value="Cancel" onclick="window.location='empresa.php';" />
    
      </td>
    </tr>

 
    <tr>
      <td colspan="2" align="center" >
      <img src="c.jpg">
    
      </td>
    </tr>


    
  </table>
  
  
</form>
</body>
</html>

