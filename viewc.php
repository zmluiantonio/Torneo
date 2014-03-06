<?php
  // @Luis codigo para ver imagen

include ("con.php");

	$strSQL = "SELECT * FROM competidor WHERE proveedor_id = '".$_GET["id"]."' ";
	

		 

if ($result = $conexion->query($strSQL)) {
    $conexion->query($strSQL);

   
    while ($row = $result->fetch_assoc()) {
    		echo $row["file"];
    	}
    }
?>