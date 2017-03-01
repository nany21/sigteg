<?php
	include ("../../modelo/clases/usuario.php");
	if(isset($_POST['cedula_oculta']))
	{
		$nombre_per=$_POST['nombre_per'];
		$apellido_per=$_POST['apellido_per'];
		$cedula_per=$_POST['cedula_per'];
		$telefono_per=$_POST['telefono_per'];
		$direccion=$_POST['direccion'];
		$usuario=$_POST['usuario'];
		$password=MD5($_POST['password']);
		$tipo=$_POST['tipo'];
		$correo=$_POST['correo'];
		$cargo=$_POST['cargo'];

		$cedula_oculta=$_POST['cedula_oculta'];

		$clase=new usuario($nombre_per,$apellido_per,$cedula_per,$telefono_per,$direccion,$usuario,$password,$tipo,$correo,$cargo);
		$clase->modificar($cedula_oculta);
	}
	else
	{
		$cedula_per=$_GET['cedula'];

		$clase=new usuario("","",$cedula_per,"","","","","","","");
		$clase->modificar_form();
	}
	
?>