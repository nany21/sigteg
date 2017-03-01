<!DOCTYPE HTML>
<html>
<!--Módulo de Docente-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Proyectos Socio - Integradores en Fase II</title><!--Título de la Página-->

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

				<a href="proyectos_registrar.php"><span class="icon-plus2" title='Agregar Proyecto'></span></a>
				<a href="proyectos_buscar.php"><span class="icon-magnifier" title='Buscar Proyecto'></span></a>
				<?php 
					if($_SESSION['tipo']=="Administrador")
					{?>
						<a href="../../controlador/PDF/examples/proyectos_fase_2.php" target='_blank'><span class="icon-printer-text2" title='Imprimir lista de Proyectos'></span></a>
				<?php }?>
				<a href="proyectos_fase_1.php"><span class="icon-filter_1" title='Lista de Proyectos Fase 1'></span></a>
				<a href="proyectos_fase_3.php"><span class="icon-filter_3" title='Lista de Proyectos Fase 3'></span></a>
				<a href="proyectos_fase_4.php"><span class="icon-filter_4" title='Lista de Proyectos Fase 4'></span></a>
				<a href="proyectos.php"><span class="icon-checkmark" title='Lista de Proyectos Aprobados'></span></a>
				<a href="proyectos_reprobado.php"><span class="icon-cancel2" title='Lista de Proyectos Reprobados'></span></a>
				<a href="proyectos_suspendido.php"><span class="icon-cancel" title='Lista de Proyectos Suspendidos'></span></a>
			
			</div>

				<div class="titulo_sencillo"><p>Proyectos Socio - Integradores en Fase II.</p></div>
				
			<?php 
				include("../../controlador/php/proyectos_fase_2.php");
			?>

		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->