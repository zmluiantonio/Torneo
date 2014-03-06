<?php

  // @Luis cerrar sesion

	require_once("sesion.class.php");
	
	$sesion = new sesion();
	
		$sesion->termina_sesion();	
		echo "<script>alert('Sesion Terminada');
            window.location='index.php';
            </script>";	
?>