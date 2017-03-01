<style>
.banner
{
	height: 50px;
	width: 640px;
	padding: 0px;
	margin-top:10px;
	margin-left:68px;
	background-image: url("res/imagen/cintillo.png");
	background-repeat: no-repeat;
	background-position: center;
	background-size:990px 170px;
}

	.titulo
	{
		text-align:center;
	}
	h4
	{
		padding:0px;
		margin:0px;
	}
	#titu
	{
		margin:20px auto ;
	}
	td
	{
		padding:3px;
	}
	.tabla{
		margin: auto;
		margin-top: 80px;		
		height: auto;
	}
	table{
		border-collapse: collapse;
		border: 1px solid #282828;
		margin: 0px auto;
		font-size: 12.5px;
		
	}
	table th{
		padding: 10px 0px;
		text-align: center;
		background-color: #797979;
		color: #000;
	}
	table td{
		padding: 10px 5px;
		text-align: center;
	}
	table .tr{
		background-color: #C4C6BB;
	}
</style>

<?php
	ini_set("memory_limit",'256M');
	$conexion = pg_connect("host='localhost' dbname='sgteg' user='postgres' password='123456'");
	$sql="SELECT * FROM mencion,carrera WHERE cod_carrera=id_carrera AND status_mencion='Activo' ";
	$ejecutar= pg_query($sql);
	$mostrar=pg_num_rows($ejecutar);
	$lim=20;
	$off=0;
	$total_pagina=(ceil($mostrar/$lim));
	$c=0;
	date_default_timezone_set('America/Caracas');
	$fecha=date("d/m/Y");
	
	for($i=1;$i<=$total_pagina;$i++)
	{
		echo'
		<page backleft="10mm" backtop="20mm" backright="10mm" backbottom="10mm" footer="page;heure;date">
			<div class="tabla">
				<page_header >
					<img src="res/imagen/cintillo.png" class="banner">
					<h4 class="titulo">Rep&uacute;blica Bolivariana de Venezuela.</h4>
					<h4 class="titulo">Ministerio del Poder Popular para la Educación Universitaria, Ciencia y Tecnología.</h4>
					<h4 class="titulo">Universidad Politecnica Territorial de Paria "Luis Mariano Rivera".</h4>
					<h4 class="titulo">Departamento de Mercadeo.</h4>
					<h4 class="titulo">Car&uacute;pano Edo - Sucre.</h4>
					<h4 class="titulo" id="titu">LISTA DE MENCIONES ACTIVAS.</h4>
				</page_header>';
				$select= pg_query("SELECT * FROM mencion,carrera WHERE cod_carrera=id_carrera AND status_mencion='Activo' ORDER BY nombre_mencion ASC LIMIT $lim OFFSET $off  ");
				$mostrar=pg_num_rows($select);
				$off=$lim+$off;
				
				echo"<table border='1' style='margin-top:50px;margin-left:30px;'>
					<tr >
						<th style='border-right:none;'>
							N&deg;<
						</th>
						<th style='border-right:none;'>
							MENCIÓN
						</th>
						<th style='border-right:none;'>
							C&Oacute;DIGO
						</th>
						<th style='border-right:none;'>
							CRÉDITOS
						</th>
						<th >
							CARRERA
						</th>
						
					</tr>";
					if($mostrar > 0)
					{
						while($fila=pg_fetch_array($select))
						{
							$c++;
							$nombre=$fila['nombre_mencion'];
							$codigo=$fila['cod_mencion'];
							$creditos=$fila['creditos_mencion'];
							$carrera=$fila['nombre_carrera'];
							echo"<tr>
								<td style='width:10%;border-right:none; ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$c	
								</td>
								<td style='width:20%;border-right:none; ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$nombre
								</td>
								<td style='width:20%;border-right:none; ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$codigo
								</td>
								<td style='width:20%;border-right:none; ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$creditos
								</td>						
								<td style='width:20%;  ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$carrera
								</td>";
							echo"</tr>";
						}
					}
				echo"</table>	
			</div>	
		</page>";
	}
?>

