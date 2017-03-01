<!--<img src="res/imagen/cintillo.png">-->
<style>
.banner
{
	height: 50px;
	width: 940px;
	padding: 0px;
	margin-top:10px;
	margin-left:40px;
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
	$sql="SELECT * FROM institucion WHERE tipo_institucion='Comunidad' ";
	$ejecutar= pg_query($sql);
	$mostrar=pg_num_rows($ejecutar);
	$lim=14;
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
					<h4 class="titulo" id="titu">LISTA DE COMUNIDADES O CONSEJOS COMUNALES.</h4>
				</page_header>';
				$select= pg_query("SELECT * FROM institucion WHERE tipo_institucion='Comunidad' ORDER BY nombre_institucion ASC LIMIT $lim OFFSET $off  ");
				$mostrar=pg_num_rows($select);
				$off=$lim+$off;
				
				echo"<table border='1' style='margin-top:50px;margin-left:10px;'>
					<tr >
						<th style='border-right:none;'>
							N&deg;<
						</th>
						<th style='border-right:none;'>
							NOMBRE
						</th>
						<th style='border-right:none;'>
							RIF
						</th>
						<th style='border-right:none;'>
							PARRÓQUIA
						</th>
						<th style='border-right:none;'>
							MUNICIPIO
						</th>
						<th >
							ENTIDAD FEDERAL
						</th>
					</tr>";
					if($mostrar > 0)
					{
						while($fila=pg_fetch_array($select))
						{
							$c++;
							$nombre_institucion=$fila['nombre_institucion'];
							$rif=$fila['rif'];
							$parroquia=$fila['parroquia'];
							$municipio=$fila['municipio'];
							$entidad_federal=$fila['entidad_federal'];
							echo"<tr>
								<td style='width:5%;border-right:none; ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$c	
								</td>
								<td style='width:25%;border-right:none; ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$nombre_institucion
								</td>
								<td style='width:13%;border-right:none; ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$rif
								</td>
								<td style='width:20%;border-right:none; ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$parroquia
								</td>
								<td style='width:15%;border-right:none; ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$municipio
								</td>
								<td style='width:15%;  ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
									$entidad_federal
								</td>";
							echo"</tr>";
						}
					}
				echo"</table>	
			</div>	
		</page>";
	}
?>

