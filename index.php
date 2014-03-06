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
			 vari($usuario,$password);
				$id = $idd;
				$nombre=$nom;
				//$telefono=$tel;
      			//$contry=$pais;
      			/*$direccion=$dir;
      			$descripcion=$des;
      			$RFC=$rfc;
			*/
				$sesion->set("empresa",$usuario);
			    $sesion->sete($usuario,$id);
			   // $sesion->setn($usuario,$nombre);
			   // $sesion->settel($usuario,$telefono);
				//$sesion->setc($usuario,$contry);
				/*$sesion->setdi($usuario,$direccion);
				$sesion->setde($usuario,$descripcion);
				$sesion->setr($usuario,$RFC);
*/
			header("location: empresa.php");
			

		}
			elseif (validarUsuario($usuario,$password) == false)
			{
			// @Luis //validacion de competidor
						if(validarCom($usuario,$password) == true)
					{			

						varic($usuario,$password);
						$id = $idd;
 						$sesion->sete($usuario,$id);	
						$sesion->set("competidor",$usuario);
						header("location: competidor.php");
						

					}else{
						
						echo "<script>alert('Invalid Data');
			            window.location='index.php';
			            </script>";
					}

			}

					
		else 
		{


			echo "<script>alert('Verifica tus datos');
			window.location='index.php';
			            </script>";
		}

	}
	
// @Luis funcion para validar datos de usuario

		function validarUsuario($usuario, $password)
	{
		 include("con.php");
    $consultac = "select pasw from empresa where usr = '$usuario';";
    
    $resultc = $conexion->query($consultac);
      
    if($resultc->num_rows > 0)
    {
      $filac = $resultc->fetch_assoc();
      if( strcmp($password,$filac["pasw"]) == 0 ){
       
        echo "<br>todo es correcto";
        return true;            
      }
      else          
        return false;
        
      
    }
    else
        return false;
	}

// @Luis funcion para validar datos de competidor
function validarCom($usuario, $password)
	{
		include("con.php");
		$consultac = "select pasw from competidor where usr = '$usuario';";
		
		$resultc = $conexion->query($consultac);
			
		if($resultc->num_rows > 0)
		{
			$filac = $resultc->fetch_assoc();
			if( strcmp($password,$filac["pasw"]) == 0 )
				return true;						
			else					
				return false;
				
			
		}
		else
				return false;
	}



function vari($usuario,$password){
      global$idd,$nom,$tel,$pais,$dir,$des,$rfc;
    echo "<br>Funcion de variables <br>";
    include("con.php");
$query = "SELECT * FROM empresa WHERE usr = '$usuario' AND pasw='$password' ";

    if ($result = $conexion->query($query)) {
    $conexion->query($query);

    while ($row = $result->fetch_assoc()) {

      
      		$idd=$row["empresa_id"];
      		$nom=$row["nombre"];
      		$tel=$row["telefono"];
      		$pais=$row["pais"];
      		$dir=$row["direccion"];
      		$des=$row["descripcion"];
      		$rfc=$row["rfc"];
        }}

       
    echo "variable dento de funcion  ".$idd."<br>";
  }

  function varic($usuario,$password){
      global$idd,$nom,$tel,$pais,$dir,$des,$rfc;
    echo "<br>Funcion de variables <br>";
    include("con.php");
$query = "SELECT * FROM competidor WHERE usr = '$usuario' AND pasw='$password' ";

    if ($result = $conexion->query($query)) {
    $conexion->query($query);

    while ($row = $result->fetch_assoc()) {

      
      		$idd=$row["proveedor_id"];
      		
        }}

       
    echo "variable dento de funcion  ".$idd."<br>";
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log In</title>
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
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px">Log In</h1></th>
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
    	<td colspan="2"><a href="remp.php">Registering As A Company</a>  ||  <a href="rcom.php">Registering As A Competitor</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Admin.php">Manager</a></td>
    	
    </tr>
  <tr>
    	<td colspan="2"></td>
    </tr>
    

  </table>
  
  
</form>
</body>
</html>
