<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Coordinaciones de Gestión.</title><!--Título de la Página-->

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
					<h2 class='h2'>Coordinaciones de Gestión.</h2>
					<hr>
					<br><br>
					<p class='p_text'>Los Comités de Trabajo son el colectivo de personas organizadas para asumir y ejercer 
						las funciones específicas, atendiendo las exigencias del cumplimiento de los objetivos y metas 
						establecidas en el  Plan Participativo de Gestión Departamental.
					</p>
					<br><br>
					<p class='p_text'>Las Coordinaciones de Gestión establecidos son los siguientes:
					</p>
					<br><br>
					<p class='p_text'>1.	Coordinación de Currículo.
					</p>
					<br><br>
					<p class='p_text'>2.	Comité de PNF.
					</p>
					<br><br>
					<p class='p_text'>3.	Comité de Carreras Técnicas.
					</p>
					<br><br>
					<p class='p_text'>4.	Comité de Atención al Estudiante.
					</p>
					<br><br>
					<p class='p_text'>5.	Comité de Estadística.
					</p>
					<br><br>
					<p class='p_text'>6.	Comité de Soporte Técnico.
					</p>
					<br><br>
					<p class='p_text'>7.	Comité de Presupuesto.
					</p>
					<br><br>
					<p class='p_text'>8.	Comité de Supervisión Docente - Administrativo.
					</p>
					<br><br>
					<p class='p_text'>9.	Comité de Proyecto Socio - Integrador.
					</p>
					<br><br>
					
					
				</section>

				<br>
					<a href="departamento.php" class='a_leer2' style="margin-left:400px;margin-top:-2px;">Atrás</a>
					<a href="departamento_15_1.php" class='a_leer2' style="margin-top:-2px;">Leer más</a>

<div id="fecha"	<div id="fecha" style="margin-top:-673px; margin-left:760px;color:#797979;float:left;">	
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