<?php
	include ("../../modelo/clases/docente.php");
	
	$cedula_facilitador=$_GET['cedula'];

	$clase=new docente("","",$cedula_facilitador,"","","","","","","","","","","");
	$clase->visualizar();
?>