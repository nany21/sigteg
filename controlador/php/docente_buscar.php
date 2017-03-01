<!DOCTYPE HTML>
<html>
<!--Módulo de Docente-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Buscar Docente</title><!--Título de la Página-->
		
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

				<a href="../../vista/html/docente_registrar.php"><span class="icon-user-plus" title="Registrar nuevo Docente"></span></a>
				<a href="../../vista/html/docente_buscar.php"><span class="icon-magnifier" title="Buscar Docente"></span></a>
				<a href="../../vista/html/docente_bloqueado.php"><span class="icon-locked2" title="Lista de Docente Desactivados"></span></a>
				<a href="../../vista/html/docente.php"><span class='icon-unlocked2' title="Lista de Docente Activos"></span></a>

			</div>

			<div class="titulo_sencillo"><p>Resultado de la Búsqueda</p></div>

			<?php
				include ("../../modelo/clases/docente.php");

				$cedula_facilitador=$_POST['cedula_facilitador'];

				$clase=new docente("","",$cedula_facilitador,"","","","","","","","","","","");
				$clase->buscar();
			?>	

		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->
