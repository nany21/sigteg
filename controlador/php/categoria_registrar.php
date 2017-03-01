<?php
	include ("../../modelo/clases/categoria.php");

		$nombre_categoria=$_POST['nombre_categoria'];
		$codigo_categoria=$_POST['codigo_categoria'];
		$tipo_categoria=$_POST['tipo_categoria'];
		$id_mencion=$_POST['id_mencion'];

		$clase=new categoria($nombre_categoria,$codigo_categoria,$tipo_categoria,$id_mencion);
		$clase->registrar();
	
?>