<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Reseña  Histórica.</title><!--Título de la Página-->

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
					<h2 class='h2'>Reseña Histórica.</h2>
					<hr>
					<br><br>
					<p class='p_text'>La Universidad Politécnica Territorial de Paria. “Luis Mariano Rivera” es una 
						Institución adscrita al otrora Ministerio de Educación, fue creado por el Presidente 
						Encargado de la República de Venezuela, Dr. Nectario Andrade Labarca, según Decreto 
						Presidencial Nº 1.222 de fecha de 07 de Febrero de 1973, e inaugurado oficialmente el 19 de 
						noviembre del mismo año, con el nombre de “Colegio Universitario de Carúpano”, dando inicio 
						sus actividades el 21 de Enero de 1974. Para ese entonces contaba con una nómina de 42 empleados 
						(08 obreros, 11 administrativos y 23 docentes), una población estudiantil de 823 bachilleres y, 
						era dirigida por el Dr. José Jacinto Vivas Escobar, quien la presidió desde el año 1973 hasta 1977.
					</p>
					<br><br>
					<p class='p_text'>El día 30 de octubre de 1986 por Resolución Ministerial (Decreto Nº 1.323), se 
						convierte en Instituto Universitario de Tecnología “Jacinto Navarro Vallenilla”, conservando su 
						misma organización y funcionamiento, considerándose un organismo dependiente del Ministerio de 
						Educación, Cultura y Deporte, de carácter gratuito, abierto a la comunidad de la región Nor-Oriental 
						y a toda Venezuela.</p>
					<br><br>
					<p class='p_text'>Así mismo, por Resolución del Ministerio de Educación N° 1.011 del 17 de Octubre de 1989 
						se designa una Comisión para la reestructuración organizativa, rediseño curricular y creación de nuevas 
						carreras, permitiendo el aprendizaje para la formación de recursos humanos, preparando profesionales de 
						alta capacitación a nivel Técnico Superior, en áreas claves para el desarrollo integral del país y en 
						especial de la región, tanto en la actividades científico-tecnológicas como en la rama de servicios, 
						cumpliendo las funciones de docencia, investigación, extensión e implantando nuevas orientaciones 
						educativas, modernos sistemas de aprendizajes y realizando nuevos trabajos de investigación 
						predominantemente aplicados a las exigencias de sus zonas de influencia.
					</p>
				</section>

				<br>
					<a href="historia.php" class='a_leer2' style="margin-left:400px;margin-top:15px;">Atrás</a>
					<a href="historia3.php" class='a_leer2' style="margin-top:15px;">Leer más</a>
<div id="fecha" style="margin-top:-650px; margin-left:760px;color:#797979;float:left;">	
		<script>
			var f = new Date();
			document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
		</script> 


		- <div id="reloj" style="color:#797979;float:right;margin-left:5px;margin-top:0px;">
		<script type="text/javascript">
			function startTime(){
			today=new Date();
			h=today.getHours();
			m=today.getMinutes();
			s=today.getSeconds();
			m=checkTime(m);
			s=checkTime(s);
			document.getElementById('reloj').innerHTML=h+":"+m+":"+s;
			t=setTimeout('startTime()',500);}
			function checkTime(i)
			{if (i<10) {i="0" + i;}return i;}
			window.onload=function(){startTime();}
		</script>
		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->