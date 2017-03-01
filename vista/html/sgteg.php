<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Sistema de Gestión de Trabajos Especiales de Grado.</title><!--Título de la Página-->

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
			<div class="titulo_sencillo"><p>Sistema de Gestión de Trabajos Especiales de Grado.</p></div>

				<ul class="p_mostrar_text" style="height:470px;">
					<p class="p_text"><br>Es un Sistema de Gestión de Trabajos Especiales de Grado 
						<i>(S.G.T.E.G. versión 2.1)</i> desarrollado e implantado en el Departamento 
						de Mercadeo de la Universidad Politécnica Territorial de Paria. "Luis Mariano 
						Rivera", codificado bajo entorno web y estándares libres cuenta con las siguientes 
						herramientas utilizadas para su elaboración:
					</p>
					<p class="p_caracteristica">a) Arquitectura: Cliente - Servidor</p>
					<p class="p_caracteristica">b) Patrón: MVC <i>(Modelo - Vista - Controlador),</i> </p>
					<p class="p_caracteristica">c) Diseño de Páginas Web: HTML 5 y CSS 3.</p>
					<p class="p_caracteristica">d) Servidor: Apache 2.</p>
					<p class="p_caracteristica">e) Lenguajes de Programación: PHP 5.3.10, Java Script y JQuery.</p>
					<p class="p_caracteristica">f) Gestor de Bases de Datos: BITNAMI WAPPStack phpPgAdmin PostgreSQL 9.1.1</p>
					<p class="p_caracteristica">g) Librería para Reportes: HTML2PDF.</p>
					<p class="p_caracteristica">h) Íconos Fuentes: IcoMoon App.</p>
					<p class="p_caracteristica">i) Programadora: Danny De La Rosa. Sección I202</p>
				</ul>
<div id="fecha"	<div id="fecha" style="margin-top:-560px; margin-left:760px;color:#797979;float:left;">	
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