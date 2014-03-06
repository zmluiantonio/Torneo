<?php
	
	//@Luis Calling the session class and create object of type Session 
	require_once("sesion.class.php");
	$sesion = new sesion();
	
	
	
	if( isset($_POST["Login"]) )
	{
		
		$usuario = $_POST["nom"];
		$password = $_POST["pw"];


		//@Luis Data validation Company
if(validarUsuario($usuario,$password,$id) == true)
		{			
			
				//$telefono=$tel;
      			//$contry=$pais;
      			/*$direccion=$dir;
      			$descripcion=$des;
      			$RFC=$rfc;
			*/
				$sesion->set("Admin",$usuario);
			   
			   // $sesion->setn($usuario,$nombre);
			   // $sesion->settel($usuario,$telefono);
				//$sesion->setc($usuario,$contry);
				/*$sesion->setdi($usuario,$direccion);
				$sesion->setde($usuario,$descripcion);
				$sesion->setr($usuario,$RFC);
*/
			header("location: Administrador.php");
			

		}
			

					
		else 
		{


			echo "<script>alert('Verifica tus datos');
			window.location='Admin.php';
			            </script>";
		}

	}
	
// @Luis funcion para validar datos de usuario

		function validarUsuario($usuario, $password)
	{
		 include("con.php");
    $consultac = "select pw from Admin where usr = '$usuario';";
    
    $resultc = $conexion->query($consultac);
      
    if($resultc->num_rows > 0)
    {
      $filac = $resultc->fetch_assoc();
      if( strcmp($password,$filac["pw"]) == 0 ){
       
        echo "<br>todo es correcto";
        return true;            
      }
      else          
        return false;
        
      
    }
    else
        return false;
	}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manager</title>
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
	padding-left:20px;
	font-weight:bold;
}
</style>
</head>
<body>

<form name="f1" method="post"  enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table border="1" align="center" rules="groups" height="80%">
    <tr bgcolor="#000000" >
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px">Manager</h1></th>
    </tr>
    <tr>
      <td width="21%">User</td>
      <td width="79%"><input type="text" name="nom" id="n" class="fieldsize" placeholder="U s e r" />
        
    </tr>
    <tr>
      <td width="21%">Password</td>
      <td width="79%"><input type="password" name="pw" id="n" class="fieldsize" placeholder="P a s s w o r d" />
        
    </tr>
    
    <tr>
      <td colspan="2" align="left" ><input type="submit" name="Login" value="Log In" />
                                    
    
      </td> </tr>

    
    
      <tr>
    	<td colspan="2"><a href="index.php">Go Back</a> </td>
    	
    </tr>
  <tr>
    	<td colspan="2"></td>
    </tr>
    

  </table>
  
  
</form>
</body>
</html>
