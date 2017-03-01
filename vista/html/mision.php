<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Misión.</title><!--Título de la Página-->

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
			<br>
			<div class="iconos_principales"></div>

			<div class="titulo_sencillo"><p>Universidad Politécnica Territorial de Paria. "Luis Mariano Rivera".</p></div>

				<section>
					<h2 class='h2'>Misión.</h2>
					<hr>
					<br><br>
					<p class='p_text'>La Universidad Politécnica Territorial De Paria “Luis Mariano Rivera” 
						(UPTPLMR) es una Institución Pública de Educación Universitaria con 
						corresponsabilidad social, comprometida con la generación y transformación del 
						conocimiento científico, tecnológico, social y cultural. Tiene la Misión de educar 
						y formar profesionales Universitarios, capacitados para contribuir con el desarrollo 
						económico y social de la región, y del resto del país, mediante la satisfacción de 
						necesidades referidas a la formación integral de ciudadanos comprometidos con su 
						entorno socio-cultural, gestores de sus propios conocimientos; es decir, egresados 
						capacitados en el manejo de tecnologías ajustadas a los tiempos modernos y a los 
						requerimientos de la comunidad, con ética socialista para el fortalecimiento del poder 
						popular (sobre la base de un talento humano multidisciplinario y tecnología de avanzada)	
						para el desarrollo endógeno sustentable y sostenible de la región de Paria, en 
						correspondencia con el Plan de Desarrollo Económico y Social de la Nación. Por consiguiente, 
						la Universidad promoverá la investigación científico-tecnológica, para asumir posiciones 
						de liderazgo en el contexto de la educación universitaria, tanto regional como nacional, 
						mediante un plan estratégico que garantice el trabajo y la participación colectiva.
					</p>
					
				</section>

		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->