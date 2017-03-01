<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Comité de Gestión del PNF.</title><!--Título de la Página-->

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
					<h2 class='h2'>Comité de Gestión del PNF.</h2>
					<hr>
					<br><br>
					<p class='p_text'>Es la instancia encargada de promover y articular el trabajo conjunto y funcionamiento 
						de las diferentes coordinaciones que lo integran, atendiendo las orientaciones que involucran las 
						actividades planificadas a fin de ejecutarlas en las distintas áreas de trabajo. Está conformado por 
						los coordinadores de Currículo, Comité de PNF, Comité de Carreras Técnicas, Comité de Atención al 
						Estudiante del Departamento, y sus principales funciones son las siguientes:
					</p>
					<br><br>
					<p class='p_text'>•	Ejecutar las decisiones aprobadas en Consejo Académico.
					</p>
					<br><br>
					<p class='p_text'>•	Ejecutar el Plan Departamental de Gestión Participativa.
					</p>
					<br><br>
					<p class='p_text'>•	Coordinar acciones con los distintos comités que  integran el Colectivo de Gestión 
						Académica Gestión.
					</p>
					<br><br>
					<p class='p_text'>•	Presentar propuestas ante la Unidad de Planificación y Evaluación Académica - 
						Administrativa.
					</p>
					<br><br>
					<p class='p_text'>•	Garantizar información permanente y oportuna sobre las actuaciones de los Comités a 
						la Unidad de Planificación y Evaluación Académica - Administrativa.
					</p>
					<br><br>
					<p class='p_text'>•	Convocar para los asuntos de interés común a los demás comités.
					</p>
					<br><br>
					<p class='p_text'>•	Coordinar acciones con los distintos Colectivos de Gestión.
					</p>
					<br><br>
					<p class='p_text'>•	Las demás que sean asignadas por los reglamentos o estatutos de la institución, y las 
						que sean aprobadas por el Concejo Académico.
					</p>
					<br><br>
					
				</section>
<div id="fecha"	<div id="fecha" style="margin-top:-633px; margin-left:760px;color:#797979;float:left;">	
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