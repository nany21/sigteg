<?php
	include ("../../modelo/clases/trabajos_local.php");

	$cubiculo=$_POST['cubiculo'];
	$ano=$_POST['ano'];
	$archivo=$_POST['archivo'];
	$id_asignacion=$_POST['id_asignacion'];
	
	$clase=new trabajos_local($cubiculo,$ano,$archivo,$id_asignacion);
	$clase->add_data();

?>