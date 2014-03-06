<?php
$fecha_actual = localtime(time(), 1);
$anyo_actual  = $fecha_actual["tm_year"] + 1900;
$mes_actual   = $fecha_actual["tm_mon"] + 1;
$dia_actual   = $fecha_actual["tm_mday"];
$fecha= $dia_actual."-".$mes_actual."-".$anyo_actual;

?>