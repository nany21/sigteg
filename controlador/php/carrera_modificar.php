<?php
	include ("../../modelo/clases/carrera.php");
	if(isset($_POST['codigo_oculto']))
	{
		$nombre_carrera=$_POST['nombre_carrera'];
		$tipo_carrera=$_POST['tipo_carrera'];
		$codigo_carrera=$_POST['codigo_carrera'];
		$creditos_carrera=$_POST['creditos_carrera'];

		$codigo_oculto=$_POST['codigo_oculto'];

		$clase=new carrera($nombre_carrera,$tipo_carrera,$codigo_carrera,$creditos_carrera);
		$clase->modificar($codigo_oculto);
	}
	else
	{
		$codigo_carrera=$_GET['codigo'];

		$clase=new carrera("","",$codigo_carrera,"");
		$clase->modificar_form();
	}
	
?>