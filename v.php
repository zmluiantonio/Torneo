<?php
require_once("sesion.class.php");
 $sesion = new sesion();
echo "sesion<br>";
				//  get($nombre)
$usuario = $sesion->get("empresa");

$id=$sesion->gete($usuario);
$nom=$sesion->getn($nom);

echo "variable usuario  ".$usuario."<br>";
echo "variable id  ".$id."<br>";
echo "variable usuario  ".$nom."<br>";

?>