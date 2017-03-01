<?php
	include ("../../modelo/clases/proyectos.php");
	
	$cod_asignacion=$_GET['codigo'];

	$clase=new proyectos("",$cod_asignacion,"","","","","","","","","","","","");
	$clase->cambiar("Fase III");
?>