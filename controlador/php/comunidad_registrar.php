<?php
	include ("../../modelo/clases/comunidad.php");

		$nombre_institucion=$_POST['nombre_institucion'];
		$entidad_federal=$_POST['entidad_federal'];
		$municipio=$_POST['municipio'];
		$parroquia=$_POST['parroquia'];
		$cod_institucion=$_POST['cod_institucion'];
		$tipo_institucion=$_POST['tipo_institucion'];
		$ubicacion=$_POST['ubicacion'];
		$rif=$_POST['rif'];

		$clase=new institucion($nombre_institucion,$entidad_federal,$municipio,$parroquia,$cod_institucion,$tipo_institucion,$ubicacion,$rif);
		$clase->registrar();

?>
