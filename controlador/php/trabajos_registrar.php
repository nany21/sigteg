<?php
	include ("../../modelo/clases/trabajos.php");

	$titulo_asignacion=$_POST['titulo_asignacion'];
	$cod_asignacion=$_POST['cod_asignacion'];
	$id_especialista=$_POST['id_especialista'];
	$id_especialista2=$_POST['id_especialista2'];
	$id_categoria=$_POST['id_categoria'];
	$id_institucion=$_POST['id_institucion'];
	$total=$_POST['total'];
	
	for($i=3;$i<=$total;$i++)
	{
		$cedula[$i]=$_POST['cedula'.$i];
		$nombre[$i]=$_POST['nombre'.$i];
		$apellido[$i]=$_POST['apellido'.$i];
	}

	$clase=new trabajos($titulo_asignacion,$cod_asignacion,$id_especialista,$id_especialista2,$id_categoria,$id_institucion,$cedula,$nombre,$apellido,$total);
	$clase->registrar();

?>