<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Objetivos.</title><!--Título de la Página-->

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
					<h2 class='h2'>Objetivos.</h2>
					<hr>
					<br><br>
					<p class='p_text'>•	Desarrollar una formación integral de alto nivel, en estrecha relación con las 
						comunidades, vinculada a las necesidades, potenciales, retos y proyectos del contexto territorial, 
						a través de los valores de igualdad, justicia, libertad, solidaridad, cooperación, en la lucha por 
						la erradicación de todas las formas de opresión, explotación, dominación y discriminación.
					</p>
					<br><br>
					<p class='p_text'>•	Garantizar la universalización del derecho a una educación universitaria de calidad 
						en todo el territorio, mediante la articulación con la Misión Sucre y otras instituciones 
						universitarias, bajo los principios de cooperación, solidaridad y complementariedad.
					</p>
					<br><br>
					<p class='p_text'>•	Contribuir activamente a la soberanía tecnológica de la nación, a través del estudio, 
						la investigación y el trabajo creador en múltiples campos de estudio, enfocados en el abordaje de los 
						problemas en su contexto territorial de acuerdo con las necesidades del pueblo.
					</p>
					<br><br>
					<p class='p_text'>•	Fortalecer la participación popular en la dirección de la vida social, las 
						capacidades productivas en mano del pueblo y la gestión directa de la producción y distribución 
						de bienes y servicios por parte de las y los trabajadores, bajo criterios de sustentabilidad social 
						y ambiental.
					</p>
					<br><br>
					<p class='p_text'>•	Fortalecer la participación popular en la dirección de la vida social, las 
						capacidades productivas en mano del pueblo y la gestión directa de la producción y distribución de 
						bienes y servicios por parte de las y los trabajadores, bajo criterios de sustentabilidad social y 
						ambiental.
					</p>
					<br><br>
					<p class='p_text'>•	Desarrollar una gestión institucional participativa y transparente al servicio del 
						pueblo venezolano, promoviendo el protagonismo popular en la vida universitaria y la presencia 
						activa de la universidad en las comunidades.
					</p>
					
					
				</section>

		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->