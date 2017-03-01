<?php
	include ("../../modelo/clases/usuario.php");
	
	$nombre_per=$_POST['nombre_per'];
	$apellido_per=$_POST['apellido_per'];
	$cedula_per=$_POST['cedula_per'];
	$telefono_per=$_POST['telefono_per'];
	$direccion=$_POST['direccion'];
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$tipo=$_POST['tipo'];
	$correo=$_POST['correo'];
	$cargo=$_POST['cargo'];

	$clase=new usuario($nombre_per,$apellido_per,$cedula_per,$telefono_per,$direccion,$usuario,$password,$tipo,$correo,$cargo);
	$clase->registrar();
?>