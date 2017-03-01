<!DOCTYPE HTML>
<html>
<!--Módulo de Categoría-->

	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Buscar Categoría</title><!--Título de la Página-->
		
		<!--Icono de la página, ubicado al lado del título-->
		<link rel="shortcut icon" type="image/x-icon" href="../../vista/imagenes/inicio.bmp">
		
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
				include("../../vista/html/banner.php");
				include("../../vista/html/menu_controlador.php");
			?>	

			<div class="iconos_principales">

				<a href="../../vista/html/categoria_registrar.php"><span class="icon-plus2" title="Registrar nueva Categoría"></span></a>
				<a href="../../vista/html/categoria_buscar.php"><span class="icon-magnifier" title="Buscar Categoría"></span></a>
				<a href="../../vista/html/categoria_bloqueada.php"><span class="icon-locked2" title="Lista de Categorías Desactivadas"></span></a>
				<a href="../../vista/html/categoria.php"><span class='icon-unlocked2' title="Lista de Categorías Activas"></span></a>

			</div>

			<div class="titulo_sencillo"><p>Resultado de la Búsqueda.</p></div>

			<?php
				include("../../modelo/clases/categoria.php");

				$codigo_categoria=$_POST['codigo_categoria'];

				$clase=new categoria("",$codigo_categoria,"","");
				$clase->buscar();
			?>	

		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->
