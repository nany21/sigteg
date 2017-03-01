<?php
	include ("../../modelo/clases/carrera.php");
	
	$nombre_carrera=$_POST['nombre_carrera'];
	$tipo_carrera=$_POST['tipo_carrera'];
	$codigo_carrera=$_POST['codigo_carrera'];
	$creditos_carrera=$_POST['creditos_carrera'];

	$clase=new carrera($nombre_carrera,$tipo_carrera,$codigo_carrera,$creditos_carrera);
	$clase->registrar();
?>