<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Visión.</title><!--Título de la Página-->

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
					<h2 class='h2'>Visión.</h2>
					<hr>
					<br><br>
					<p class='p_text'>La Universidad Politécnica Territorial de Paria “Luis Mariano Rivera” es una institución 
						que busca alcanzar la máxima eficiencia en el desempeño de las funciones de docencia, investigación, de 
						extensión y de producción, a fin de lograr la formación integral y excelente de sus egresados en los 
						distintos Programas Nacionales de Formación, para ser un referente promotor de pensamientos que generen 
						conocimientos innovadores para el desarrollo endógeno y sostenible de la región y el país. Todo ello 
						fundamentado en los valores y principios de una sociedad socialista, a fin de dar respuesta a los 
						requerimientos del proceso de transformación de la sociedad venezolana, en función de la soberanía 
						nacional, la construcción del Socialismo Bolivariano y la democracia participativa y protagónica.
					</p>
				</section>

		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->