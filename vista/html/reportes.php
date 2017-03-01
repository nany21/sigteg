<!DOCTYPE HTML>
<html>
<!--Módulo de Reportes-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Reportes</title><!--Título de la Página-->

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

			<div class="titulo_sencillo"><p>Reportes.</p></div>

				<ul class="p_mostrar" style="height:380px;">
					<br>
					<a href="../../controlador/PDF/examples/reporte1.php" target='_blank'><p class="p_fila"><span class="icon-layers"></span>Historial de Usuarios.</p></a>
					<a href="../../controlador/PDF/examples/reporte2.php" target='_blank'><p class="p_fila"><span class="icon-layers"></span>Lista de Carreras, Menciones y Categorías Activas.</p></a>
					<a href="../../controlador/PDF/examples/reporte3.php" target='_blank'><p class="p_fila"><span class="icon-layers"></span>Lista de Comunidades o Consejos Comunales.</p></a>
					<a href="../../controlador/PDF/examples/reporte4.php" target='_blank'><p class="p_fila"><span class="icon-layers"></span>Lista de Empresas o Instituciones.</p></a>
					<a href="../../controlador/PDF/examples/reporte5.php" target='_blank'><p class="p_fila"><span class="icon-layers"></span>Lista de Datos Laborales de los Facilitadores.</p></a>
					<a href="../../controlador/PDF/examples/reporte6.php" target='_blank'><p class="p_fila"><span class="icon-layers"></span>Lista de Datos de los Facilitadores con Postgrado.</p></a>
					<a href="../../controlador/PDF/examples/reporte7.php" target='_blank'><p class="p_fila"><span class="icon-layers"></span>Lista de Proyectos Socio - Integradores  por Carrera, Mención y Categoría.</p></a>
					<a href="../../controlador/PDF/examples/reporte8.php" target='_blank'><p class="p_fila"><span class="icon-layers"></span>Lista de Trabajos Especiales de Grado por Carrera, Mención y Categoría.</p></a>
					<a href="../../controlador/PDF/examples/reporte9.php" target='_blank'><p class="p_fila"><span class="icon-layers"></span>Lista de Documentos por Carrera, Mención y Categoría.</p></a>
					<br>
				</ul>
<div id="fecha"	<div id="fecha" style="margin-top:-470px; margin-left:760px;color:#797979;float:left;">	
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