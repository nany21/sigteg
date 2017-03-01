<?php
	include ("../../modelo/clases/trabajos.php");
	
	$cod_asignacion=$_GET['codigo'];

	$clase=new trabajos("",$cod_asignacion,"","","","","","","","","","","","");
	$clase->cambiar("Fase I");
?>