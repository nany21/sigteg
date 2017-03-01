<?php
	include ("../../modelo/clases/comunidad.php");
	
	$cod_institucion=$_GET['codigo'];

	$clase=new institucion("","","","",$cod_institucion,"","","","");
	$clase->visualizar();
?>