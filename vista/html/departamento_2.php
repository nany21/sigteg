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

			<div class="titulo_sencillo"><p>Departamento de Mercadeo.</p></div>

				<section>
					<h2 class='h2'>Reseña Histórica.</h2>
					<hr>
					<br><br>
					<p class='p_text'>La creación del Departamento de Mercadeo perteneciente a la Universidad Politécnica 
						Territorial de Paria. “Luis Mariano Rivera” se remonta a finales de los años ochenta, cuando es 
						creada la carrera de Mercadeo Agrícola, como resultado del cambio de Colegio Universitario de 
						Carúpano a Instituto Universitario de Tecnología “Jacinto Navarro Vallenilla”, el día 30 de octubre 
						de 1986, por Resolución Ministerial (Decreto Nº 1.323), conservando su misma organización y 
						funcionamiento.
					</p>
					<br><br>
					<p class='p_text'>Posteriormente se convierte en Instituto Universitario de Tecnología “Jacinto Navarro 
						Vallenilla”, el día 30 de octubre de 1986, por Resolución Ministerial (Decreto Nº 1.323), conservando 
						su misma organización y funcionamiento. Así mismo, por Resolución del Ministerio de Educación N° 1.011 
						del 17 de Octubre de 1989, se designa una Comisión para la reestructuración organizativa, rediseño 
						curricular y creación de nuevas carreras a nivel de Técnico Superior, en las carreras de Tecnología 
						Naval, Administración, Mercadeo, Informática, Turismo, Tecnología Pesquera y Tecnología de Alimentos.
					</p>
					<br><br>
					<p class='p_text'>Con el advenimiento de la Revolución Bolivariana, y con ella el nuevo orden en Políticas 
						Educativas, es creada, en el marco de la Misión Alma Mater, la Universidad Politécnica Territorial de 
						Paria “Luis Mariano Rivera” como Universidad Nacional Experimental, con personalidad jurídica bajo 
						Decreto Presidencial y con Gaceta Oficial N° 392725 de fecha 13 de Abril de 2012, e inicia sus 
						actividades en la ciudad de Carúpano en las antiguas instalaciones donde funcionaba el antes llamado 
						Instituto Tecnológico “Jacinto Navarro Vallenilla”.
					</p>
					<br><br>
					<p class='p_text'>Actualmente, dentro del Programa Alma Mater y los Programas Nacionales de Formación 
						(PNF),  se está  brindando la oportunidad al estudiantado de formarse como Licenciados o  Técnicos 
						Superiores en Administración, Turismo, Distribución y Logística, Ingeniería en Informática, 
						Agroalimentaria, Mecánica, Mantenimiento, Procesamiento, Distribución de los Alimentos, Seguridad 
						Alimentaria y Cultura Nutricional.
					</p>
					
				</section>

				<br>
					<a href="departamento.php" class='a_leer2' style="margin-left:400px;margin-top:-2px;">Atrás</a>
					<a href="departamento_2_1.php" class='a_leer2' style="margin-top:-2px;">Leer más</a>
<div id="fecha" style="margin-top:-680px; margin-left:760px;color:#797979;float:left;">	
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