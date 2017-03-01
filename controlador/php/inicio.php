<?php
	$usu=$_POST['usu'];
	$pass=$_POST['pass'];

	include ("../../modelo/clases/sesion.php");

	$clase=new sesion($usu,$pass);
	$clase->iniciar();
?>