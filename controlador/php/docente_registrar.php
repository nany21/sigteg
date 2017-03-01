<?php
	include ("../../modelo/clases/docente.php");

		$nombre_facilitador=$_POST['nombre_facilitador'];
		$apellido_facilitador=$_POST['apellido_facilitador'];
		$cedula_facilitador=$_POST['cedula_facilitador'];
		$fecha_nacimiento=$_POST['fecha_nacimiento'];
		$sexo=$_POST['sexo'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$correo=$_POST['correo'];
		$cargo=$_POST['cargo'];
		$dedicacion=$_POST['dedicacion'];
		$nombre2=$_POST['nombre2'];
		$apellido2=$_POST['apellido2'];
		$categoria=$_POST['categoria'];
		$postgrado=$_POST['postgrado'];

		$clase=new docente($nombre_facilitador,$apellido_facilitador,$cedula_facilitador,$fecha_nacimiento,$sexo,$direccion,$telefono,$correo,$cargo,$dedicacion,$nombre2,$apellido2,$categoria,$postgrado);
		$clase->registrar();

?>