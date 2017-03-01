<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Jefatura del Departamento de Mercadeo.</title><!--Título de la Página-->

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

			<div class="titulo_sencillo"><p>Departamento de Mercadeo.</p></div>

				<section>
					<h2 class='h2'>Jefatura.</h2>
					<hr>
					<br><br>
					<p class='p_text'>Es la unidad responsable de coordinar y dirigir todas las acciones que sirven de 
						base para el logro de los objetivos departamentales. Las funciones que desempeña la Jefatura 
						del Departamento son las siguientes:
					</p>
					<br><br>
					<p class='p_text'>1. Presidir el consejo de Departamento.
					</p>
					<br><br>
					<p class='p_text'>2. Cumplir y hacer cumplir al personal del departamento las leyes, reglamentos, 
						normativas, resoluciones, acuerdos, políticas y normas emanados del consejo directivo, académico 
						y división de docencia.
					</p>
					<br><br>
					<p class='p_text'>3. Planificar junto a los coordinadores académicos las actividades a desarrollar 
						en el departamento.
					</p>
					<br><br>
					<p class='p_text'>4. Estimular al personal docente a desarrollar actividades de investigación y extensión.
					</p>
					<br><br>
					<p class='p_text'>5. Coordinar el trabajo de las carreras a su cargo.
					</p>
					<br><br>
					<p class='p_text'>6. Supervisar la ejecución de las actividades de las coordinaciones académicas.
					</p>
					<br><br>
					<p class='p_text'>7. Canalizar ante instancias superiores las solicitudes académicas y apoyo del Departamento.
					</p>
					<br><br>
					<p class='p_text'>8. Convocar periódicamente al consejo de Departamento a objeto de difundir información 
						sobre aspectos académicos y administrativos.
					</p>
					<br><br>
					<p class='p_text'>9. Exigir al personal adscrito al Departamento la presentación de informes de actividades, el cumplimiento de horarios establecidos y todas aquellas funciones inherentes a su cargo.
					</p>
					<br><br>
					
				</section>
				
				<br>
					<a href="departamento.php" class='a_leer2' style="margin-left:400px;margin-top:-2px;">Atrás</a>
					<a href="departamento_10_2.php" class='a_leer2' style="margin-top:-2px;">Leer más</a>
<div id="fecha"	<div id="fecha" style="margin-top:-677px; margin-left:760px;color:#797979;float:left;">	
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