<?php
	include ("../../modelo/clases/trabajos.php");
	if(isset($_POST['codigo_oculto']))
	{
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

		$codigo_oculto=$_POST['codigo_oculto'];
		$au_total=$_POST['au_total'];
		for($i=1;$i<=$au_total;$i++)
		{
			$ced_ocul[$i]=$_POST['ced_ocul'.$i];	
		}
		$clase=new trabajos($titulo_asignacion,$cod_asignacion,$id_especialista,$id_especialista2,$id_categoria,$id_institucion,$cedula,$nombre,$apellido,$total);
		$clase->modificar($codigo_oculto,$ced_ocul,$au_total);
	}
	else
	{
		$cod_asignacion=$_GET['codigo'];

		$clase=new trabajos("",$cod_asignacion,"","","","","","","","");
		$clase->modificar_form();
	}
	