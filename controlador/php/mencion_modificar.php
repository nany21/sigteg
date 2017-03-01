<?php
	include ("../../modelo/clases/mencion.php");
	if(isset($_POST['codigo_oculto']))
	{
		$nombre_mencion=$_POST['nombre_mencion'];
		$cod_mencion=$_POST['cod_mencion'];
		$creditos_mencion=$_POST['creditos_mencion'];
		$id_carrera=$_POST['id_carrera'];

		$codigo_oculto=$_POST['codigo_oculto'];

		$clase=new mencion($nombre_mencion,$cod_mencion,$creditos_mencion,$id_carrera);
		$clase->modificar($codigo_oculto);
	}
	else
	{
		$cod_mencion=$_GET['codigo'];

		$clase=new mencion("",$cod_mencion,"","");
		$clase->modificar_form();
	}
	
?>