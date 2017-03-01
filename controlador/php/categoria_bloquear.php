<?php
	include ("../../modelo/clases/categoria.php");
	
	$codigo_categoria=$_GET['codigo'];

	$clase=new categoria("",$codigo_categoria,"","");
	$clase->cambiar("Bloqueado");
?>