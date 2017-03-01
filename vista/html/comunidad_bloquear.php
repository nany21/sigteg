<!DOCTYPE HTML>
<html>
<!--Módulo de Desactivar Institución-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Desactivar Institución</title><!--Título de la Página-->
		
		<!--Icono de la página, ubicado al lado del título-->
		<link rel="shortcut icon" type="image/x-icon" href="../imagenes/inicio.bmp">
		
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

				<a href="comunidad_registrar.php"><span class="icon-plus2" title="Registrar nueva Institución"></span></a>
				<a href="comunidad_buscar.php"><span class="icon-magnifier" title="Buscar Institución"></span></a>

				<?php 
					if($_SESSION['tipo']=="Administrador")
					{?>
						<a href="../../controlador/PDF/examples/comunidad.php" target='_blank'><span class="icon-printer-text2" title='Imprimir lista de Instituciones'></span></a>
						<a href="comunidad_bloqueada.php"><span class="icon-lock-rounded2" title="Lista de Instituciones Desactivadas"></span></a>
				<?php }?>			

			</div>
				
			<?php 
				include("../../controlador/php/comunidad_bloquear.php");
			?>

		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->