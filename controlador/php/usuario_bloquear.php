<?php
	include ("../../modelo/clases/usuario.php");
	
	$cedula_per=$_GET['cedula'];

	$clase=new usuario("","",$cedula_per,"","","","","","","");
	$clase->cambiar("Bloqueado");
?>