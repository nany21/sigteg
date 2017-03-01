<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Trabajos Especiales de Grado.</title><!--Título de la Página-->

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

			<div class="titulo_sencillo"><p>Normas para la Presentación de los Trabajos Finales.</p></div>

				<section>

					<h2 class='h2'>Elementos del Trabajo:</h2>
					<hr>

					<h2 class='h2'>Capítulo VI: Propuesta (Si la hay).</h2>

					<h2 class='h2'>Bibliografía.</h2>

					<h2 class='h2'>Anexos (Si los hay).</h2>

					<h2 class='h2'>Aspectos Formales:</h2>
					<p class='p_text' style="margin-left:70px;"><span class="icon-done"></span> Tipo de letra: Times New Roman o Arial.</p><br>
					<p class='p_text' style="margin-left:70px;"><span class="icon-done"></span> Tamaño de letra: 12 (en todo el desarrollo del trabajo)</p><br>
					<p class='p_text' style="margin-left:70px;"><span class="icon-done"></span> Interlineado: 1,5 entre líneas, 3 espacios entre párrafos, 3 espacios entre título y párrafo.</p><br>
					<p class='p_text' style="margin-left:70px;"><span class="icon-done"></span> Márgenes: 4 cm de margen izquierdo, 3 cm los márgenes superior, inferior y derecho.</p><br>

					<h2 class='h2'>Nota:</h2>
					<p class='p_text' style="margin-left:70px;">Entregar el trabajo en sobre de manila.</p><br>

					<h2 class='h2'>Manejo de Citas:</h2>
					<p class='p_text' style="margin-left:70px;"><span class="icon-done"></span> Citas con más de 40 palabras se 
						coloca fuera del texto con margen derecho e izquierdo de dos espacios e interlineado sencillo.</p><br>
					<p class='p_text' style="margin-left:70px;"><span class="icon-done"></span> Citas con menos de 40 palabras 
						se coloca contínua en el texto entre comillas.</p><br>
				
				</section>

				<br>
					<a href="trabajos_de_grado2.php" class='a_leer2' style="margin-left:400px;">Atrás</a>
<div id="fecha"	<div id="fecha" style="margin-top:-655px; margin-left:760px;color:#797979;float:left;">	
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