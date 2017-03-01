<?php
	include ("../../modelo/clases/comunidad.php");
	if(isset($_POST['codigo_oculto']))
	{
		$nombre_institucion=$_POST['nombre_institucion'];
		$entidad_federal=$_POST['entidad_federal'];
		$municipio=$_POST['municipio'];
		$parroquia=$_POST['parroquia'];
		$cod_institucion=$_POST['cod_institucion'];
		$tipo_institucion=$_POST['tipo_institucion'];
		$ubicacion=$_POST['ubicacion'];
		$rif=$_POST['rif'];

		$codigo_oculto=$_POST['codigo_oculto'];

		$clase=new institucion($nombre_institucion,$entidad_federal,$municipio,$parroquia,$cod_institucion,$tipo_institucion,$ubicacion,$rif);
		$clase->modificar($codigo_oculto);
	}
	else
	{
		$cod_institucion=$_GET['codigo'];

		$clase=new institucion("","","","",$cod_institucion,"","","");
		$clase->modificar_form();
	}
	
?>