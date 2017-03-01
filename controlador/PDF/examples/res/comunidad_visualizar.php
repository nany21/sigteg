<!--<img src="res/imagen/cintillo.png">-->
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
		padding: 10px 20px;
		text-align: justify;
		background-color: #9b9b9b;
		color: #000;
	}
	table td{
		padding: 10px 20px;
		text-align: justify;
	}
	table .tr{
		background-color: #C4C6BB;
	}
</style>

<?php
	ini_set("memory_limit",'256M');
	$conexion = pg_connect("host='localhost' dbname='sgteg' user='postgres' password='123456'");
	$sql="SELECT * FROM institucion WHERE cod_institucion=cod_institucion";
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
					<h4 class="titulo" id="titu">DATOS DE INSTITUCIÓN.</h4>
				</page_header>';
				$select= pg_query("SELECT * FROM institucion WHERE cod_institucion=cod_institucion LIMIT '1'");
				$mostrar=pg_num_rows($select);
				$off=$lim+$off;
				
				echo"<table border='1' style='margin-top:70px;margin-left:60px;'>";
					if($mostrar > 0)
					{
						while($fila=pg_fetch_array($select))
						{
							$c++;
							$nombre=$fila['nombre_institucion'];
							$rif=$fila['rif'];
							$tipo=$fila['tipo_institucion'];
							$codigo=$fila['cod_institucion'];
							$entidad=$fila['entidad_federal'];
							$municipio=$fila['municipio'];
							$parroquia=$fila['parroquia'];
							$ubicacion=$fila['ubicacion'];
							$status=$fila['status_institucion'];

							echo"<tr>
									<th style='width:20%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										Nombre:
									</th>
									<td style='width:60%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										$nombre
									</td>
								</tr>
								<tr>
									<th style='width:20%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										RIF:
									</th>
									<td style='width:60%; ";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										$rif
									</td>
								</tr>
								<tr>
									<th style='width:20%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										Tipo:
										</th>
									<td style='width:60%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										$tipo
									</td>
								</tr>
								<tr>
									<th style='width:20%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										Código:
									</th>
									<td style='width:60%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										$codigo
									</td>
								</tr>
								<tr>
									<th style='width:20%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										Entidad Federal:
									</th>
									<td style='width:60%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										$entidad
									</td>
								</tr>
								<tr>
									<th style='width:20%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										Municipio:
									</th>
									<td style='width:60%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										$municipio
									</td>
								</tr>
								<tr>
									<th style='width:20%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										Parróquia:
									</th>
									<td style='width:60%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										$parroquia
									</td>
								</tr>
								<tr>
									<th style='width:20%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										Ubicación:
									</th>
									<td style='width:60%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										$ubicacion
									</td>
								</tr>
								<tr>
									<th style='width:20%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										Estatus:
									</th>
									<td style='width:60%;";if($c!=$mostrar){echo"border-bottom:none;";} echo" '>
										$status
									</td>";
							echo"</tr>";
						}
					}
				echo"</table>	
			</div>	
		</page>";
	}
?>

