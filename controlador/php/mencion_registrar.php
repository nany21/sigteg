<?php
	include ("../../modelo/clases/mencion.php");

		$nombre_mencion=$_POST['nombre_mencion'];
		$cod_mencion=$_POST['cod_mencion'];
		$creditos_mencion=$_POST['creditos_mencion'];
		$id_carrera=$_POST['id_carrera'];

		$clase=new mencion($nombre_mencion,$cod_mencion,$creditos_mencion,$id_carrera);
		$clase->registrar();
?>