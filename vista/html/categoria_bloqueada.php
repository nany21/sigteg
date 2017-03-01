<!DOCTYPE HTML>
<html>
<!--Módulo de Categorías Desactivadas-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Categorías Desactivadas</title><!--Título de la Página-->
		
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
		<?php include("../../controlador/php/validar_sesion.php"); ?>
		<div id='general'>
		<!--División que posee un id que permite darle el estilo en general de la 
		página del sistema, sus atribulos se visualizan en el archivo vista/css/estilos.css-->

			<?php
				include("banner.php");
				include("menu.php");
			?>

			<div class="iconos_principales">

				<a href="categoria_registrar.php"><span class='icon-plus2' title='Registrar nueva Categoría'></span></a>
				<a href="categoria_buscar.php"><span class="icon-magnifier" title='Buscar Categoría'></span></a>
				<?php 
					if($_SESSION['tipo']=="Administrador")
					{?>
						<a href="../../controlador/PDF/examples/categoria_bloqueada.php" target='_blank'><span class="icon-printer-text2" title='Imprimir lista de Categorías Desactivadas'></span></a>
						<a href="categoria.php"><span class='icon-lock-rounded-open2' title="Lista de Categorías Activas"></span></a>
				<?php }?>
			
			</div>

				<div class="titulo_sencillo"><p>Categorías Desactivadas.</p></div>
			
			<?php 
				include("../../controlador/php/categoria_mostrar_blo.php");
			?>

		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->