<?php
// @Luis Registro de empresa
include('con.php');

if(isset($_POST['aceptar']) && $_POST['aceptar']=='Aceptar')
{
$nombre = $_POST["nom"];
$telefono=$_POST["tel"];
$pais =$_POST["country"];
$direccion=$_POST["dir"];
$descripcion=$_POST["des"];
$rfc = $_POST["rfc"];
$usr = $_POST["usr"];
$pw=$_POST["pw"];
$cpw=$_POST["cpw"];
$file=$_FILES['file']['name'];

$error=array("nombre"=>"","telefono"=>"","country"=>"","direccion"=>"","descripcion"=>"","rfc"=>"","usr"=>"","pw"=>"","cpw"=>"","file"=>"");
   
   if($nombre=="")
    {
        $error['nombre']="Campo requerido.";
    }else
    {
        $valid_nom=$nombre;
    }

    if($telefono=="")
    {
        $error['telefono']="Campo requerido.";
    }else
    {
         if(!preg_match('/^[0-9-]+$/',$telefono))
        {
        $error['telefono']="Telefono invalido";
        }
        else
        {
            if(strlen($telefono)>=8)
            {
                $valid_tel=$telefono;
            }
            else
            {
            $error['telefono']="Telefono invalido";
            }
    
        }
    }


if($pais=="")
    {
        $error['country']="Campo requerido.";
    }else
    {
        $valid_country=$pais;
    }



    if($direccion=="")
    {
        $error['direccion']="Campo requerido.";
    }else
    {
        $valid_dir=$direccion;
    }

    if($descripcion=="")
    {
        $error['descripcion']="Campo requerido.";
    }else
    {
        $valid_des=$descripcion;
    }


    if($rfc=="")
    {
        $error['rfc']="Campo requerido.";
    }else
    {
         if(!preg_match('/^[A-Z]{4}([0-9]){6}([A-Z0-9]){3}+$/',$rfc))
        {
        $error['rfc']="RFC Invalido";
        }
        else
        {
            
                $valid_rfc=$rfc;
            
        }
    }


if($usr=="")
    {
        $error['usr']="Campo requerido.";
    }

    else
    { 

        $consulta = "SELECT * FROM empresa WHERE usr='$usr'";
    $econs = $conexion->query($consulta);
    $reng=$econs->num_rows;
    if($reng == 0)

    {

        if(!preg_match('/^[_a-z0-9-]+$/',$usr))
        {
        $error['usr']="Usuario invalido";
        }
        else
        {
            if(strlen($usr)>=6)
            {
                $valid_usr=$usr;
            }
            else
            {
            $error['usr']="El usuario debe contener 6 caracteres";
            }
    
        }
    }else{
        $error['usr']="Ya existe el usuario";
    }

}



    if($pw=="")
    {
        $error['pw']="Campo requerido.";
    }else
    { 
        
            if(strlen($pw)>=6)
            {
                $valid_pw=$pw;
            }
            else
            {
            $error['pw']="La contraseña debe contener minimo 6 caracteres";
            }
    
        
    }

    if($cpw=="")
    {
        $error['cpw']="Campo requerido.";
    }
    else 
        {if($pw==$cpw)
            {
                $valid_cpw=$cpw;
            }
            else
            {
            $error['cpw']="Contraseña diferente";
            }
}
    if($file=="")
    {
        $error['file']="Campo requerido.";
    }else
    {
        if($_FILES['file']['type']=='image/jpeg' || $_FILES['file']['type']=='image/jpg')
        {
            $valid_file=$file;
        }
        else
        {
            $error['file']="Su logo debe ser en formato jpg.";   
        }
    }
    if((strlen($valid_nom)>0)&& (strlen($valid_tel)>0)&& (strlen($valid_country)>0)&& (strlen($valid_dir)>0)&& (strlen($valid_des)>0) && (strlen($valid_rfc)>0) && (strlen($valid_usr)>0) && (strlen($valid_pw)>0) && (strlen($valid_cpw)>0) && (strlen($valid_file)>0))
{
    

    
            if(file_exists($valid_file))
            {
                $file=uniqid().$file;
            }

        $tmpName  = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
            
            $fp = fopen($tmpName, 'r');
            $content = fread($fp,$fileSize);
            $content = addslashes($content);
            fclose($fp);  
/*
 nombre VARCHAR(1000),
  telefono INT,
  pais VARCHAR(100),
  direccion VARCHAR(1000),
  descripcion VARCHAR(1000),
  rfc VARCHAR(1000),
  usr VARCHAR(20),
  pasw VARCHAR(10),
  file MEDIUMBLOB,*/

$insertar = "INSERT INTO empresa (nombre,telefono,pais,direccion,descripcion,rfc,usr,pasw,file) VALUES 
                                ('$nombre','$telefono','$pais','$direccion','$descripcion','$rfc','$usr','$pw','$content')";
            
            $ejecutar = $conexion->query($insertar);

    if($ejecutar)
          {  echo "<script>alert('Registro exitoso');
            window.location='index.php';
            </script>";}
        else
           { echo "<script>alert('Error al registrarse');
            window.location='Empresa.php';
            </script>";;
                $conexion->close();
            }
            



    }

}   



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrar </title>
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
input.text{
	display: none;
}
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
      <th align="left" colspan="2"><h1 style="color:#FFF;padding-left:20px">Registrar Empresa</h1></th>
    </tr>


    <tr>
      <td width="21%">Nombre*</td>
      <td width="79%"><input type="text" name="nom" id="n" class="fieldsize" value="" />
      <span class="err"><?php echo $error["nombre"];?></span>
       </td>
    </tr>

<tr>
      <td width="21%">Teléfono*</td>
      <td width="79%"><input type="text" name="tel" id="n" class="fieldsize" value="" />
      <span class="err"><?php echo $error["telefono"];?></span>
       </td>
    </tr>




<tr>
      <td width="21%">País*</td>
      <td><select name="country" class="fieldsize" >
            <option value="">- - -</option> 

 

        <option value="Afganistán"<?php if($country=='Afganistán') echo "selected='selected'";?>>Afganistán</option>
        <option value="Albania" <?php if($country=='Albania') echo "selected='selected'";?>>Albania</option>
        <option value="Alemania"<?php if($country=='Alemania') echo "selected='selected'";?>>Alemania</option>
        <option value="Andorra"<?php if($country=='Andorra') echo "selected='selected'";?>>Andorra</option>
        <option value="Angola"<?php if($country=='Angola') echo "selected='selected'";?>>Angola</option>
        <option value="Anguila"<?php if($country=='Anguila') echo "selected='selected'";?>>Anguila</option>
        <option value="Antigua y Barbuda"<?php if($country=='Antigua y Barbuda') echo "selected='selected'";?>>Antigua y Barbuda</option>
        <option value="Antártida"<?php if($country=='Antártida') echo "selected='selected'";?>>Antártida</option>
        <option value="Arabia Saudita"<?php if($country=='Arabia Saudita') echo "selected='selected'";?>>Arabia Saudita</option>
        <option value="Argelia"<?php if($country=='Argelia') echo "selected='selected'";?>>Argelia</option>
        <option value="Argentina"<?php if($country=='Argentina') echo "selected='selected'";?>>Argentina</option>
        <option value="Armenia"<?php if($country=='Armenia') echo "selected='selected'";?>>Armenia</option>
        <option value="Aruba"<?php if($country=='Aruba') echo "selected='selected'";?>>Aruba</option>
        <option value="Australia"<?php if($country=='Australia') echo "selected='selected'";?>>Australia</option>
        <option value="Austria"<?php if($country=='Austria') echo "selected='selected'";?>>Austria</option>
        <option value="Azerbaiján"<?php if($country=='Azerbaiján') echo "selected='selected'";?>>Azerbaiján</option>
        <option value="Bahamas"<?php if($country=='Bahamas') echo "selected='selected'";?>>Bahamas</option>
        <option value="Bahrain"<?php if($country=='Bahrain') echo "selected='selected'";?>>Bahrain</option>
        <option value="Bangladesh"<?php if($country=='Bangladesh') echo "selected='selected'";?>>Bangladesh</option>
        <option value="Barbados"<?php if($country=='Barbados') echo "selected='selected'";?>>Barbados</option>
        
        <option value="Belarús"<?php if($country=='Belarús') echo "selected='selected'";?>>Belarús</option>
        <option value="Belice"<?php if($country=='Belice') echo "selected='selected'";?>>Belice</option>
        <option value="Benín"<?php if($country=='Benín') echo "selected='selected'";?>>Benín</option>
        <option value="Bermuda"<?php if($country=='Bermuda') echo "selected='selected'";?>>Bermuda</option>
        <option value="Bhután"<?php if($country=='Bhután') echo "selected='selected'";?>>Bhután</option>
        <option value="Bielorrusia"<?php if($country=='Bielorrusia') echo "selected='selected'";?>>Bielorrusia</option>
        <option value="Bolivia"<?php if($country=='Bolivia') echo "selected='selected'";?>>Bolivia</option>
        <option value="Bonaire"<?php if($country=='Bonaire') echo "selected='selected'";?>>Bonaire</option>
        <option value="Bosnia Herzegovina"<?php if($country=='Bosnia Herzegovina') echo "selected='selected'";?>>Bosnia Herzegovina</option>
        <option value="Botswana"<?php if($country=='Botswana') echo "selected='selected'";?>>Botswana</option>
        <option value="Brasil"<?php if($country=='Brasil') echo "selected='selected'";?>>Brasil</option>
        <option value="Brunéi"<?php if($country=='Brunéi') echo "selected='selected'";?>>Brunéi</option>
        <option value="Bulgaria"<?php if($country=='Bulgaria') echo "selected='selected'";?>>Bulgaria</option>
        <option value="Burkina Faso"<?php if($country=='Burkina Faso') echo "selected='selected'";?>>Burkina Faso</option>
        <option value="Burundi"<?php if($country=='Burundi') echo "selected='selected'";?>>Burundi</option>
        <option value="Bélgica"<?php if($country=='Bélgica') echo "selected='selected'";?>>Bélgica</option>
        <option value="Cabo Verde"<?php if($country=='Cabo Verde') echo "selected='selected'";?>>Cabo Verde</option>
        <option value="Camboya"<?php if($country=='Camboya') echo "selected='selected'";?>>Camboya</option>
        <option value="Camerún"<?php if($country=='Camerún') echo "selected='selected'";?>>Camerún</option>
        <option value="Canadá"<?php if($country=='Canadá') echo "selected='selected'";?>>Canadá;</option>
        
        <option value="Chad"<?php if($country=='Chad') echo "selected='selected'";?>>Chad</option>
        <option value="Chile"<?php if($country=='Chile') echo "selected='selected'";?>>Chile</option>
        <option value="China"<?php if($country=='China') echo "selected='selected'";?>>China</option>
        <option value="Chipre"<?php if($country=='Chipre') echo "selected='selected'";?>>Chipre</option>
        <option value="Colombia"<?php if($country=='Colombia') echo "selected='selected'";?>>Colombia</option>
        <option value="Congo"<?php if($country=='Congo') echo "selected='selected'";?>>Congo</option>
        <option value="Corea del Norte"<?php if($country=='Corea del Norte') echo "selected='selected'";?>>Corea del Norte</option>
        <option value="Corea del Sur"<?php if($country=='Corea del Sur') echo "selected='selected'";?>>Corea del Sur</option>
        <option value="Costa Rica"<?php if($country=='Costa Rica') echo "selected='selected'";?>>Costa Rica</option>
        <option value="Costa de Marfil"<?php if($country=='Costa de Marfil') echo "selected='selected'";?>>Costa de Marfil</option>
        <option value="Croacia"<?php if($country=='Croacia') echo "selected='selected'";?>>Croacia</option>
        <option value="Cuba"<?php if($country=='Cuba') echo "selected='selected'";?>>Cuba</option>
        <option value="Curacao"<?php if($country=='Curacao') echo "selected='selected'";?>>Curacao</option>
        <option value="Dinamarca" <?php if($country=='Dinamarca') echo "selected='selected'";?>>Dinamarca</option>
        <option value="Djibouti"<?php if($country=='Djibouti') echo "selected='selected'";?>>Djibouti</option>
        <option value="Dominica"<?php if($country=='Dominica') echo "selected='selected'";?>>Dominica</option>
        <option value="Ecuador"<?php if($country=='Ecuador') echo "selected='selected'";?>>Ecuador</option>
        <option value="Egipto"<?php if($country=='Egipto') echo "selected='selected'";?>>Egipto</option>
        <option value="El Salvador"<?php if($country=='El Salvador') echo "selected='selected'";?>>El Salvador</option>
        <option value="Emiratos Árabes Unidos " <?php if($country=='Emiratos Árabes Unidos') echo "selected='selected'";?>>Emiratos Árabes Unidos</option>
        
        <option value="Eritrea" <?php if($country=='Eritrea') echo "selected='selected'";?>>Eritrea</option>
        <option value="Escocia"<?php if($country=='Escocia') echo "selected='selected'";?>>Escocia</option>
        <option value="Eslovaquia"<?php if($country=='Eslovaquia') echo "selected='selected'";?>>Eslovaquia</option>
        <option value="Eslovenia" <?php if($country=='Eslovenia') echo "selected='selected'";?>>Eslovenia</option>
        <option value="España"<?php if($country=='España') echo "selected='selected'";?>>España</option>
        <option value="Estados Unidos"<?php if($country=='Estados Unidos') echo "selected='selected'";?>>Estados Unidos</option>
        <option value="Estonia"<?php if($country=='Estonia') echo "selected='selected'";?>>Estonia</option>
        <option value="Etiopía" <?php if($country=='Etiopía') echo "selected='selected'";?>>Etiopía</option>
        <option value="Fiji"<?php if($country=='Fiji') echo "selected='selected'";?>>Fiji</option>
        <option value="Filipinas" <?php if($country=='Filipinas') echo "selected='selected'";?>>Filipinas</option>
        <option value="Finlandia"<?php if($country=='Finlandia') echo "selected='selected'";?>>Finlandia</option>
        <option value="Francia" <?php if($country=='Francia') echo "selected='selected'";?>>Francia</option>
        <option value="Gabón"<?php if($country=='Gabón') echo "selected='selected'";?>>Gabón</option>
        <option value="Gales"<?php if($country=='Gales') echo "selected='selected'";?>>Gales</option>
        <option value="Gambia" <?php if($country=='Gambia') echo "selected='selected'";?>>Gambia</option>
        <option value="Georgia" <?php if($country=='Georgia') echo "selected='selected'";?>>Georgia</option>
        <option value="Ghana" <?php if($country=='Ghana') echo "selected='selected'";?>>Ghana</option>
        <option value="Gibraltar"<?php if($country=='Gibraltar') echo "selected='selected'";?>>Gibraltar</option>
        <option value="Grecia"<?php if($country=='Grecia') echo "selected='selected'";?>>Grecia</option>
        
        <option value="Grenada"<?php if($country=='Grenada') echo "selected='selected'";?>>Grenada</option>
        <option value="Groenlandia"<?php if($country=='Groenlandia') echo "selected='selected'";?>>Groenlandia</option>
        <option value="GuadalupeP"<?php if($country=='Guadalupe') echo "selected='selected'";?>>Guadalupe</option>
        <option value="IG"<?php if($country=='IG') echo "selected='selected'";?>>Guadalupe</option>
        <option value="Guam"<?php if($country=='Guam') echo "selected='selected'";?>>Guam</option>
        <option value="Guatemala"<?php if($country=='Guatemala') echo "selected='selected'";?>>Guatemala</option>
        <option value="Guinea"<?php if($country=='Guinea') echo "selected='selected'";?>>Guinea</option>
        <option value="Guinea Ecuatorial "<?php if($country=='Guinea Ecuatorial') echo "selected='selected'";?>>Guinea Ecuatorial</option>
        <option value="Guinea-Bissau"<?php if($country=='Guinea-Bissau') echo "selected='selected'";?>>Guinea-Bissau</option>
        <option value="Guyana"<?php if($country=='Guyana') echo "selected='selected'";?>>Guyana</option>
        <option value="Guyana Francesa"<?php if($country=='Guyana Francesa') echo "selected='selected'";?>>Guyana Francesa</option>
        <option value="Haití"<?php if($country=='Haití') echo "selected='selected'";?>>Haití;</option>
        <option value="Holanda"<?php if($country=='Holanda') echo "selected='selected'";?>>Holanda</option>
        <option value="Honduras"<?php if($country=='Honduras') echo "selected='selected'";?>>Honduras</option>
        <option value="Hong Kong"<?php if($country=='Hong Kong') echo "selected='selected'";?>>Hong Kong</option>
        <option value="Hungría"<?php if($country=='Hungría') echo "selected='selected'";?>>Hungría</option>
        <option value="India"<?php if($country=='India') echo "selected='selected'";?>>India</option>
        <option value="Indonesia"<?php if($country=='Indonesia') echo "selected='selected'";?>>Indonesia</option>
        
        <option value="Inglaterra"<?php if($country=='Inglaterra') echo "selected='selected'";?>>Inglaterra</option>
        <option value="Iraq"<?php if($country=='Iraq') echo "selected='selected'";?>>Iraq</option>
        <option value="Irlanda"<?php if($country=='Irlanda') echo "selected='selected'";?>>Irlanda</option>
        <option value="Irlanda del Norte" <?php if($country=='Irlanda del Norte') echo "selected='selected'";?>>Irlanda del Norte</option>
        <option value="Irán"<?php if($country=='Irán') echo "selected='selected'";?>>Irán</option>
        <option value="Isla Reunión" <?php if($country=='Isla Reunión') echo "selected='selected'";?>>Isla Reunión</option>
        <option value="Isla de Córsega" <?php if($country=='Isla de Córsega') echo "selected='selected'";?>>Isla de Córsega</option>
        <option value="Islandia"<?php if($country=='Islandia') echo "selected='selected'";?>>Islandia</option>
        <option value="Islas Caimán"<?php if($country=='Islas Caimán') echo "selected='selected'";?>>Islas Caimán</option>
        <option value="Islas Cook"<?php if($country=='Islas Cook') echo "selected='selected'";?>>Islas Cook</option>
        <option value="Islas Faeroe"<?php if($country=='Islas Faeroe') echo "selected='selected'";?>>Islas Faeroe</option>
        <option value="Islas Maldivias"<?php if($country=='Islas Maldivias') echo "selected='selected'";?>>Islas Maldivias</option>
        <option value="Islas Marshall" <?php if($country=='Islas Marshall') echo "selected='selected'";?>>Islas Marshall</option>
        <option value="Islas Virgenes Britanicas"<?php if($country=='Islas Virgenes Britanicas') echo "selected='selected'";?>>Islas Virgenes Britanicas</option>
        <option value="Islas Vírgenes"<?php if($country=='Islas Virgenes') echo "selected='selected'";?>>Islas Vírgenes</option>
        <option value="Islas Virgenes(E.E.U.U)"<?php if($country=='Islas Virgenes (E.E.U.U)') echo "selected='selected'";?>>Islas Vírgenes (E.E.U.U)</option>
        <option value="Islas Wallis y Futuna"<?php if($country=='Islas Wallis y Futuna') echo "selected='selected'";?>>Islas Wallis y Futuna</option>
        <option value="Islas de Comores"<?php if($country=='Islas de Comores') echo "selected='selected'";?>>Islas de Comores</option>
        <option value="Israel"<?php if($country=='Israel') echo "selected='selected'";?>>Israel</option>
        <option value="Italia"<?php if($country=='Italia') echo "selected='selected'";?>>Italia</option>
        
        <option value="Jamaica"<?php if($country=='Jamaica') echo "selected='selected'";?>>Jamaica</option>
        <option value="Japón"<?php if($country=='Japón') echo "selected='selected'";?>>Japón</option>
        <option value="Jordania"<?php if($country=='Jordania') echo "selected='selected'";?>>Jordania</option>
        <option value="Kazajstán"<?php if($country=='Kazajstán') echo "selected='selected'";?>>Kazajstán</option>
        <option value="Kenya"<?php if($country=='Kenya') echo "selected='selected'";?>>Kenya</option>
        <option value="Kirguistán"<?php if($country=='Kirguistán') echo "selected='selected'";?>>Kirguistán</option>
        <option value="Kiribati"<?php if($country=='Kiribati') echo "selected='selected'";?>>Kiribati</option>
        <option value="Kuwait"<?php if($country=='Kuwait') echo "selected='selected'";?>>Kuwait</option>
        <option value="Laos"<?php if($country=='Laos') echo "selected='selected'";?>>Laos</option>
        <option value="Latvia"<?php if($country=='Latvia') echo "selected='selected'";?>>Latvia</option>
        <option value="Lesotho"<?php if($country=='Lesotho') echo "selected='selected'";?>>Lesotho</option>
        <option value="Letonia"<?php if($country=='Letonia') echo "selected='selected'";?>>Letonia</option>
        <option value="Liberia"<?php if($country=='Liberia') echo "selected='selected'";?> >Liberia</option>
        <option value="Liechtenstein"<?php if($country=='Liechtenstein') echo "selected='selected'";?>>Liechtenstein</option>
        <option value="Lituania"<?php if($country=='Lituania') echo "selected='selected'";?>>Lituania</option>
        
        <option value="Luxemburgo"<?php if($country=='Luxemburgo') echo "selected='selected'";?>>Luxemburgo</option>
        <option value="Líbano"<?php if($country=='Líbano') echo "selected='selected'";?>>Líbano</option>
        <option value="Macau"<?php if($country=='Macau') echo "selected='selected'";?>>Macau</option>
        <option value="Macedonia"<?php if($country=='Macedonia') echo "selected='selected'";?>>Macedonia</option>
        <option value="Madagascar"<?php if($country=='Madagascar') echo "selected='selected'";?>>Madagascar</option>
        <option value="Malasia"<?php if($country=='Malasia') echo "selected='selected'";?>>Malasia</option>
        <option value="Malawi"<?php if($country=='Malawi') echo "selected='selected'";?>>Malawi</option>
        <option value="Mali"<?php if($country=='Mali') echo "selected='selected'";?>>Mali</option>
        <option value="Malta"<?php if($country=='Malta') echo "selected='selected'";?>>Malta</option>
        <option value="Marruecos"<?php if($country=='Marruecos') echo "selected='selected'";?>>Marruecos</option>
        <option value="Martinica"<?php if($country=='Martinica') echo "selected='selected'";?>>Martinica</option>
        <option value="Mauritania"<?php if($country=='Mauritania') echo "selected='selected'";?>>Mauritania</option>
        <option value="Mauritius"<?php if($country=='Mauritius') echo "selected='selected'";?>>Mauritius</option>
        <option value="Micronesia"<?php if($country=='Micronesia') echo "selected='selected'";?>>Micronesia</option>
        <option value="Moldavia"<?php if($country=='Moldavia') echo "selected='selected'";?>>Moldavia</option>
        
        <option value="Mongolia"<?php if($country=='Mongolia') echo "selected='selected'";?>>Mongolia</option>
        <option value="Montserrat"<?php if($country=='Montserrat') echo "selected='selected'";?>>Montserrat</option>
        <option value="Mozambique"<?php if($country=='Mozambique') echo "selected='selected'";?>>Mozambique</option>
        <option value="Myanmar"<?php if($country=='Myanmar') echo "selected='selected'";?>>Myanmar</option>
        <option value="México"<?php if($country=='México') echo "selected='selected'";?>>México</option>
        <option value="Mónaco"<?php if($country=='Mónaco') echo "selected='selected'";?>>Mónaco</option>
        <option value="Namibia"<?php if($country=='Namibia') echo "selected='selected'";?>>Namibia</option>
        <option value="Nepal" <?php if($country=='Nepal') echo "selected='selected'";?>>Nepal </option>
        <option value="Nicaragua"<?php if($country=='Nicaragua') echo "selected='selected'";?>>Nicaragua</option>
        <option value="Nigeria"<?php if($country=='Nigeria') echo "selected='selected'";?>>Nigeria</option>
        <option value="Noruega"<?php if($country=='Noruega') echo "selected='selected'";?>>Noruega</option>
        <option value="Nueva Caledonia"<?php if($country=='Nueva Caledonia') echo "selected='selected'";?>>Nueva Caledonia</option>
        <option value="Nueva Zelandia"<?php if($country=='Nueva Zelandia') echo "selected='selected'";?>>Nueva Zelandia</option>
        <option value="Níger"<?php if($country=='Níger') echo "selected='selected'";?>>Níger</option>
        <option value="Omán"<?php if($country=='Omán') echo "selected='selected'";?>>Omán</option>
        <option value="Pakistán"<?php if($country=='Pakistán') echo "selected='selected'";?>>Pakistán</option>
        <option value="Paláu"<?php if($country=='Paláu') echo "selected='selected'";?>>Paláu</option>
        <option value="Panamá"<?php if($country=='Panamá') echo "selected='selected'";?>>Panamá</option>
        <option value="Papúa Nueva Guinea"<?php if($country=='Papúa Nueva Guinea') echo "selected='selected'";?>>Papúa Nueva Guinea</option>
        
        <option value="Paraguay" <?php if($country=='Paraguay') echo "selected='selected'";?>>Paraguay</option>
        <option value="Perú"<?php if($country=='Perú') echo "selected='selected'";?>>Perú</option>
        <option value="Polinesia Francesa"<?php if($country=='Polinesia Francesa') echo "selected='selected'";?>>Polinesia Francesa</option>
        <option value="Polonia"<?php if($country=='Polonia') echo "selected='selected'";?>>Polonia</option>
        <option value="Portugal"<?php if($country=='Portugal') echo "selected='selected'";?>>Portugal</option>
        <option value="Puerto Rico"<?php if($country=='Puerto Rico') echo "selected='selected'";?>>Puerto Rico</option>
        <option value="Qatar"<?php if($country=='Qatar') echo "selected='selected'";?>>Qatar</option>
        <option value="Reino Unido"<?php if($country=='Reino Unido') echo "selected='selected'";?>>Reino Unido</option>
        <option value="República Centroafricana"<?php if($country=='República Centroafricana') echo "selected='selected'";?>>República Centroafricana</option>
        <option value="República Checa"<?php if($country=='República Checa') echo "selected='selected'";?>>República Checa</option>
        <option value="República Dominicana"<?php if($country=='República Dominicana') echo "selected='selected'";?>>República Dominicana</option>
        <option value="Ruanda"<?php if($country=='Ruanda') echo "selected='selected'";?>>Ruanda</option>
        <option value="Rumania"<?php if($country=='Rumania') echo "selected='selected'";?>>Rumania</option>
        <option value="Rusia"<?php if($country=='Rusia') echo "selected='selected'";?>>Rusia</option>
        <option value="Saba"<?php if($country=='Saba') echo "selected='selected'";?>>Saba</option>
        <option value="Saint Barthelemy"<?php if($country=='Saint Barthelemy') echo "selected='selected'";?>>Saint Barthelemy</option>
        <option value="Saint Barts"<?php if($country=='Saint Barts') echo "selected='selected'";?>>Saint Barts</option>
        <option value="Saint Eustatius" <?php if($country=='Saint Eustatius') echo "selected='selected'";?>>Saint Eustatius</option>
        <option value="Saipan"<?php if($country=='Saipan') echo "selected='selected'";?>>Saipan</option>
        <option value="Samoa"<?php if($country=='Samoa') echo "selected='selected'";?>>Samoa</option>
        <option value="San Marino"<?php if($country=='San Marino') echo "selected='selected'";?>>San Marino</option>
        <option value="Santa Lucía"<?php if($country=='Santa Lucía') echo "selected='selected'";?>>Santa Lucía</option>
        <option value="Senegal"<?php if($country=='Senegal') echo "selected='selected'";?>>Senegal</option>
        <option value="Seychelles"<?php if($country=='Seychelles') echo "selected='selected'";?>>Seychelles</option>
        <option value="Sierra Leona"<?php if($country=='Sierra Leona') echo "selected='selected'";?>>Sierra Leona</option>
        
        <option value="Singapur"<?php if($country=='Singapur') echo "selected='selected'";?>>Singapur</option>
        <option value="Siria"<?php if($country=='Siria') echo "selected='selected'";?>>Siria</option>
        <option value="Sri Lanka"<?php if($country=='Sri Lanka') echo "selected='selected'";?>>Sri Lanka</option>
        <option value="St. Kitts & Nevis"<?php if($country=='St. Kitts & Nevis') echo "selected='selected'";?>>St. Kitts & Nevis</option>
        <option value="St. Martin"<?php if($country=='St.Martin') echo "selected='selected'";?>>St. Martin</option>
        <option value="St. Vincent"<?php if($country=='St. Vincent') echo "selected='selected'";?>>St. Vincent</option>
        <option value="Suazilandia"<?php if($country=='Suazilandia') echo "selected='selected'";?>>Suazilandia</option>
        <option value="Sudáfrica"<?php if($country=='Sudáfrica') echo "selected='selected'";?>>Sudáfrica</option>
        <option value="Sudán"<?php if($country=='Sudán') echo "selected='selected'";?>>Sudán</option>
        <option value="Suecia"<?php if($country=='Suecia') echo "selected='selected'";?>>Suecia</option>
        <option value="Suiza"<?php if($country=='Suiza') echo "selected='selected'";?>>Suiza</option>
        <option value="Suriname"<?php if($country=='Suriname') echo "selected='selected'";?>>Suriname</option>
        <option value="Tailandia"<?php if($country=='Tailandia') echo "selected='selected'";?>>Tailandia</option>
        <option value="Taiwán"<?php if($country=='Taiwán') echo "selected='selected'";?>>Taiwán</option>
        <option value="Tanzania"<?php if($country=='Tanzania') echo "selected='selected'";?>>Tanzania</option>
        <option value="Togo"<?php if($country=='Togo') echo "selected='selected'";?>>Togo</option>
        <option value="Trinidad y Tobago"<?php if($country=='Trinidad y Tobago') echo "selected='selected'";?>>Trinidad y Tobago</option>
        <option value="Turkmenistán"<?php if($country=='Turkmenistán') echo "selected='selected'";?>>Turkmenistán</option>
        <option value="Turks and Caicos"<?php if($country=='Turks and Caicos') echo "selected='selected'";?>>Turks and Caicos</option>
        <option value="Turquía"<?php if($country=='Turquía') echo "selected='selected'";?>>Turquía</option>
        
        <option value="Túnez"<?php if($country=='Túnez') echo "selected='selected'";?>>Túnez</option>
        <option value="Ucrania"<?php if($country=='Ucrania') echo "selected='selected'";?>>Ucrania</option>
        <option value="Uganda"<?php if($country=='Uganda') echo "selected='selected'";?>>Uganda</option>
        <option value="Uruguay"<?php if($country=='Uruguay') echo "selected='selected'";?>>Uruguay</option>
        <option value="Uzbekistán"<?php if($country=='Uzbekistán') echo "selected='selected'";?>>Uzbekistán</option>
        <option value="Vanuatu"<?php if($country=='Vanuatu') echo "selected='selected'";?>>Vanuatu</option>
        <option value="Vaticano"<?php if($country=='Vaticano') echo "selected='selected'";?>>Vaticano</option>
        <option value="Venezuela"<?php if($country=='Venezuela') echo "selected='selected'";?>>Venezuela</option>
        <option value="Vietnam"<?php if($country=='Vietnam') echo "selected='selected'";?>>Vietnam</option>
        <option value="Yemen"<?php if($country=='Yemen') echo "selected='selected'";?>>Yemen</option>
        <option value="Yugoslavia"<?php if($country=='Yugoslavia') echo "selected='selected'";?>>Yugoslavia</option>
        <option value="Zaire"<?php if($country=='Zaire') echo "selected='selected'";?>>Zaire</option>
        <option value="Zambia"<?php if($country=='Zambia') echo "selected='selected'";?>>Zambia</option>
        <option value="Zimbabwe"<?php if($country=='Zimbabwe') echo "selected='selected'";?>>Zimbabwe</option>


      </select>
       <span class="err"><?php echo $error["country"];?></span>
       </td>
    </tr>


<tr>
      <td>Dirección*</td>
      <td><textarea name="dir" class="fieldsize"></textarea>
    <span class="err"><?php echo $error["direccion"];?></span>

      </td>
      
    </tr>

<tr>
      <td>Descripción*</td>
      <td><textarea name="des" class="fieldsize"></textarea>
       <span class="err"><?php echo $error["descripcion"];?></span></td>
     
    </tr>





<tr>
      <td width="21%">RFC*</td>
      <td width="79%"><input type="text" name="rfc" id="n" class="fieldsize" value="" />
      <span class="err"><?php echo $error["rfc"];?></span>
       </td>
    </tr>

<tr> 
      <td width="21%">Usuario*</td>
      <td width="79%"><input type="text" name="usr" id="n" class="fieldsize" value="" />
      <span class="err"><?php echo $error["usr"];?></span>
       </td>
    </tr>


<tr> 
      <td width="21%">Contraseña*</td>
      <td width="79%"><input type="password" name="pw" id="n" class="fieldsize" value="" />
      <span class="err"><?php echo $error["pw"];?></span>
       </td>
    </tr>
<tr> 
      <td width="21%">Confirma Contraseña*</td>
      <td width="79%"><input type="password" name="cpw" id="n" class="fieldsize" value="" />
      <span class="err"><?php echo $error["cpw"];?></span>
       </td>
    </tr>    

<tr> 
      <td width="21%">Logo*</td>
      <td width="79%"><input type="file" name="file" id="n" />
      <span class="err"><?php echo $error["file"];?></span>
       </td>
    </tr>

    <tr>
      <td colspan="2" align="left" ><input type="submit" name="aceptar" value="Aceptar" />
                                    <input type="button" value="Cancel" onclick="window.location='index.php';" />
    
      </td>
    </tr>

    <tr>
    	<td colspan="2"></td>
    </tr>
  </table>
  
  
</form>
</body>
</html>