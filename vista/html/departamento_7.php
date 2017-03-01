<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Funciones.</title><!--Título de la Página-->

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
					<h2 class='h2'>Funciones.</h2>
					<hr>
					<br><br>
					<p class='p_text'>•	Implementar programas de docencia, investigación y extensión y producción en función 
						de un desarrollo integral.
					</p>
					<br><br>
					<p class='p_text'>•	Garantizar el desarrollo de procesos de formación de los egresados mediante la 
						conceptualización y establecimiento de una reglamentación adecuada.
					</p>
					<br><br>
					<p class='p_text'>•	Propiciar el establecimiento de planes estratégicos y operativos que proyecten el 
						departamento a nivel institucional, regional, nacional e internacional.
					</p>
					<br><br>
					<p class='p_text'>•	Establecer normas, políticas y procedimientos que contribuyan al logro de los 
						objetivos del departamento. 
					</p>
					<br><br>
					<p class='p_text'>•	Ejecutar los programas de docencia, investigación, extensión y producción en 
						función del desarrollo integral institucional. 
					</p>
					<br><br>
					<p class='p_text'>•	Promover la formación del personal adscrito al departamento.
					</p>
					<br><br>
					
				</section>
<div id="fecha"	<div id="fecha" style="margin-top:-445px; margin-left:760px;color:#797979;float:left;">	
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