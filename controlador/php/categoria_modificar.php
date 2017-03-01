<?php
	include ("../../modelo/clases/categoria.php");
	if(isset($_POST['codigo_oculto']))
	{
		$nombre_categoria=$_POST['nombre_categoria'];
		$codigo_categoria=$_POST['codigo_categoria'];
		$tipo_categoria=$_POST['tipo_categoria'];
		$id_mencion=$_POST['id_mencion'];

		$codigo_oculto=$_POST['codigo_oculto'];

		$clase=new categoria($nombre_categoria,$codigo_categoria,$tipo_categoria,$id_mencion);
		$clase->modificar($codigo_oculto);
	}
	else
	{
		$codigo_categoria=$_GET['codigo'];

		$clase=new categoria("",$codigo_categoria,"","");
		$clase->modificar_form();
	}
	
?>