<?php
	include ("../../modelo/clases/documentos.php");
	
	$cod_asignacion=$_GET['codigo'];

	$clase=new documentos("",$cod_asignacion,"","","","","","","","","","","","");
	$clase->cambiar("Reprobado");
?>