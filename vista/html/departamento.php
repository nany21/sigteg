<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Departamento de Mercadeo</title><!--Título de la Página-->

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

			<div class="titulo_sencillo"><p>Departamento de Mercadeo</p></div>

				<ul class="p_mostrar" style="height:600px;">
					<br>
					<a href="departamento_1.php"><p class="p_fila">1) Definición.</p></a>
					<a href="departamento_2.php"><p class="p_fila">2) Reseña Histórica.</p></a>
					<a href="departamento_3.php"><p class="p_fila">3) Misión.</p></a>
					<a href="departamento_4.php"><p class="p_fila">4) Visión.</p></a>
					<a href="departamento_5.php"><p class="p_fila">5) Organigrama.</p></a>
					<a href="departamento_6.php"><p class="p_fila">6) Objetivos.</p></a>
					<a href="departamento_7.php"><p class="p_fila">7) Funciones.</p></a>
					<a href="departamento_8.php"><p class="p_fila">8) Estructura.</p></a>
					<a href="departamento_9.php"><p class="p_fila">9) Consejo Participativo.</p></a>
					<a href="departamento_10.php"><p class="p_fila">10) Jefatura.</p></a>
					<a href="departamento_11.php"><p class="p_fila">11) Coordinación de Planificación y Evaluación. (U.P.E.G)</p></a>
					<a href="departamento_12.php"><p class="p_fila">12) Comité de Gestión del PNF.</p></a>
					<a href="departamento_13.php"><p class="p_fila">13) Comité de Gestión Administrativa.</p></a>
					<a href="departamento_14.php"><p class="p_fila">14) Comité de Gestión para la Investigación e Innovación.</p></a>
					<a href="departamento_15.php"><p class="p_fila">15) Coordinaciones de Gestión.</p></a>

					<br>
				</ul>
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