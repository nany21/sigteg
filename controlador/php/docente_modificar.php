<?php
	include ("../../modelo/clases/docente.php");
	if(isset($_POST['cedula_oculta']))
	{
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

		$cedula_oculta=$_POST['cedula_oculta'];

		$clase=new docente($nombre_facilitador,$apellido_facilitador,$cedula_facilitador,$fecha_nacimiento,$sexo,$direccion,$telefono,$correo,$cargo,$dedicacion,$nombre2,$apellido2,$categoria,$postgrado);
		$clase->modificar($cedula_oculta);
	}
	else
	{
		$cedula_facilitador=$_GET['cedula'];

		$clase=new docente("","",$cedula_facilitador,"","","","","","","","","","","");
		$clase->modificar_form();
	}
	
?>