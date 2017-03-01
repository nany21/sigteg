<?php
	include ("../../modelo/clases/mencion.php");
	
	$cod_mencion=$_GET['codigo'];

	$clase=new mencion("",$cod_mencion,"","");
	$clase->visualizar();
?>