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
					<p class='p_text'>La Universidad Politécnica Territorial de Paria. “Luis Mariano Rivera” está ubicada en la 
						Avenida Universitaria vía El Pilar, en el Valle de Canchunchú Florido (Charallave) de Carúpano, 
						Estado Sucre; lugar que por su condición de área costera, con potencial turístico, pesquero, portuario 
						y comercial; de infraestructura urbana, servicios gubernamentales y dinámica educacional prefiguran 
						sus líneas de acción docente y de investigación, en donde se hacía imprescindible la creación de un 
						Instituto que brindara Educación Superior en la zona, para fomentar el desarrollo económico y social de 
						esta región del país.</p>
					<br><br>
					<p class='p_text'>Por tal razón, en el año 1955 se inicia un proceso de cambios a nivel educativo, mediante 
						el cual Cumaná es designada sede de la Universidad de Oriente y cuyos resultados produjeron en el año 
						1970 un Foro sobre el Desarrollo de la Ciudad de Carúpano, auspiciado por todos los sectores representativo 
						de la comunidad, en donde el objetivo fundamental fue discutir y determinar las causas de la depresión social 
						y económica de la región. Sus conclusiones sirvieron para que el Ministerio de Educación, en julio de ese mismo 
						año, aprobara la realización de un estudio de factibilidad que justificara la creación de un nuevo Instituto de 
						Educación Superior y el perfil que éste debía poseer.</p>
					<br><br>
					<p class='p_text'>En tal sentido fueron contratadas las organizaciones: Consultores Latinoamericanos en 
						Desarrollo y Educación Superior (C.L.A.D.E.S) y la Gobernación del Estado Sucre, quienes en 1972 
						presentaron el plan de desarrollo del Colegio Regional Universitario de Carúpano, identificado con el 
						Programa de Educación Superior diseñado por el Ministerio de Educación para el quinquenio de 1964-1969, 
						caracterizado fundamentalmente por los criterios de regionalización, diversificación y democratización.
					</p>
				</section>

				<br>
					<a href="uptp.php" class='a_leer2' style="margin-left:400px;">Atrás</a>
					<a href="historia2.php" class='a_leer2'>Leer más</a>

<div id="fecha" style="margin-top:-640px; margin-left:760px;color:#797979;float:left;">	
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