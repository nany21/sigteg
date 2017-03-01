<?php
	include ("../../modelo/clases/carrera.php");
	
	$codigo_carrera=$_GET['codigo'];

	$clase=new carrera("","",$codigo_carrera,"");
	$clase->cambiar("Bloqueado");
?>