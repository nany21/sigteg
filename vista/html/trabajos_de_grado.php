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
					<h2 class='h2'></h2>
					<p class='p_text' style="margin-left:70px;">1. Carátula.</p><br>
					<p class='p_text' style="margin-left:70px;">2. Dedicatoria.</p><br>
					<p class='p_text' style="margin-left:70px;">3. Agradecimiento.</p><br>
					<p class='p_text' style="margin-left:70px;">4. Índice  General.</p><br>
					<p class='p_text' style="margin-left:70px;">5. Índice de Cuadros (Opcional).</p><br>
					<p class='p_text' style="margin-left:70px;">6. Resumen (debe contener: el propósito, objetivo general, tipo de investigación,
										población,instrumento de recolección de datos, conclusiones resaltantes)</p><br><br>
					
					<h2 class='h2'>Introducción.</h2>

					<h2 class='h2'>Capítulo I: El Problema.</h2>
					<p class='p_text' style="margin-left:70px;"><span class="icon-layers"></span>Planteamiento del Problema.</p><br>
					<p class='p_text' style="margin-left:70px;"><span class="icon-layers"></span>Objetivos de la Investigación.</p><br><br>
					<p class='p_text' style="margin-left:110px;"><span class="icon-done"></span>General.</p><br>
					<p class='p_text' style="margin-left:110px;"><span class="icon-done"></span>Específicos.</p><br><br>
					<p class='p_text' style="margin-left:70px;"><span class="icon-layers"></span>Justificación.</p><br>
				</section>

				<br>
					<a href="acerca_de.php" class='a_leer2' style="margin-left:400px;">Atrás</a>
					<a href="trabajos_de_grado2.php" class='a_leer2'>Leer más</a>

<div id="fecha"	<div id="fecha" style="margin-top:-660px; margin-left:760px;color:#797979;float:left;">	
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