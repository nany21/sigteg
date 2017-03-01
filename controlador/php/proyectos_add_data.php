<?php
	include ("../../modelo/clases/proyectos_local.php");

	$cubiculo=$_POST['cubiculo'];
	$ano=$_POST['ano'];
	$archivo=$_POST['archivo'];
	$id_asignacion=$_POST['id_asignacion'];
	
	$clase=new proyectos_local($cubiculo,$ano,$archivo,$id_asignacion);
	$clase->add_data();

?>