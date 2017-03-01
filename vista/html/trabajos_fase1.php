<!DOCTYPE HTML>
<html>
<!--Módulo de Docente-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Trabajos Especiales de Grado - Capítulo I</title><!--Título de la Página-->

		<link rel="shortcut icon" type="image/x-icon" href="../imagenes/inicio.bmp">
		<!--Icono de la página, ubicado al lado del título-->

		<link rel="stylesheet" type="text/css" href="../../vista/css/estilos.css">
		<!--Archivo que permite darle estilos generales al sistema-->

		<link rel="stylesheet" type="text/css" href="../../vista/css/menu.css">
		<!--Archivo que permite dar estilos al menú principal del sistema-->

		<link rel="stylesheet" type="text/css" href="../../vista/css/fuentes.css">
		<!--Archivo que permite incorporar los íconos básicos al sistema-->

	</head>

	<body><!--Cuerpo del Documento-->

		<?php 
			include("../../controlador/php/validar_sesion.php"); 
		?>

		<div id='general'>
		<!--División que posee un id que permite darle el estilo en general de la 
		página del sistema, sus atribulos se visualizan en el archivo vista/css/estilos.css-->

			<?php
				include("banner.php");
				include("menu.php");
			?>

			<div class="iconos_principales">

				<a href="trabajos_registrar.php"><span class="icon-plus2" title='Agregar Trabajo'></span></a>
				<a href="trabajos_buscar.php"><span class="icon-magnifier" title='Buscar Trabajo'></span></a>
				<a href="trabajos_fase_1.php"><span class="icon-filter_1" title='Lista de Trabajos Capítulo 1'></span></a>
				<a href="trabajos_fase_2.php"><span class="icon-filter_2" title='Lista de Trabajos Capítulo 2'></span></a>
				<a href="trabajos_fase_3.php"><span class="icon-filter_3" title='Lista de Trabajos Capítulo 3'></span></a>
				<a href="trabajos_fase_4.php"><span class="icon-filter_4" title='Lista de Trabajos Capítulo 4'></span></a>
				<a href="trabajos_fase_5.php"><span class="icon-filter_5" title='Lista de Trabajos Capítulo 5'></span></a>
				<a href="trabajos.php"><span class="icon-checkmark" title='Lista de Trabajos Aprobados'></span></a>
				<a href="trabajos_reprobado.php"><span class="icon-cancel2" title='Lista de Trabajos Reprobados'></span></a>
				<a href="trabajos_suspendido.php"><span class="icon-cancel" title='Lista de Trabajos Suspendidos'></span></a>
			
			</div>
				
			<?php 
				include("../../controlador/php/trabajos_fase1.php");
			?>

		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->