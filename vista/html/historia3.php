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

			<div class="titulo_sencillo"><p>Universidad Politécnica Territorial de Paria. "Luis Mariano Rivera".</p></div>

				<section>
					<h2 class='h2'>Reseña Histórica.</h2>
					<hr>
					<br><br>
					<p class='p_text'>La Universidad Politécnica Territorial de Paria. “Luis Mariano Rivera” es una 
						institución oficial de Educación Superior y de Carácter Gratuito, que ofrece carreras cortas 
						de carácter terminal, orientadas a la obtención de una ocupación con formación teórico-práctica 
						de alto nivel (post-secundaria), reconociéndose de modo directo, los efectos legales de los títulos, 
						diplomas y certificados que otorga.
					</p>
					<br><br>
					<p class='p_text'>En el mes de febrero del año 2012, y luego de una serie de gestiones efectuadas por los 
						miembros de la Comisión de Modernización y Transformación de esta casa de estudios, ante instancias 
						del Ministerio del Poder Popular para la Educación Universitaria según el Decreto 8.805. En fecha 13 
						de Abril de 2012, se publica la Gaceta Oficial de la República Bolivariana de Venezuela N° 39.902. 
					</p>
					<br><br>
					<p class='p_text'>A partir de entonces, el Instituto Universitario de Tecnología “Jacinto Navarro 
						Vallenilla”, se convierte en Universidad Politécnica Territorial de Paria “Luís Mariano Rivera”. 
						La decisión marcó un hito en la historia de la región, pues por primera vez, la zona pasó a tener 
						una universidad propia, y además, consustanciada con los problemas y las aspiraciones de desarrollo 
						de esta parte del estado Sucre.  La UPTP es un legado palpable del Presidente Chávez, quien sabía 
						de la necesidad de dar pasó a una nueva estructura que llenara las expectativas académicas de la 
						región y se integrara al Plan Simón y al actualmente en ejecución Plan de la Patria.
					</p>
					<br><br>
					<p class='p_text'>Al día de hoy, en la UPTP se imparten los Programas Nacionales de Formación en las 
						ingenierías Informática, Agroalimentaria, Mecánica, de Procesamiento de Alimentos y las 
						licenciaturas en Turismo, Administración, Distribución y Logística, además de las carreras 
						técnicas en Mercadeo, Publicidad, Mantenimiento y Construcción Naval.
					</p>
				</section>

				<br>
					<a href="historia2.php" class='a_leer2' style="margin-left:400px;margin-top:15px;">Atrás</a>
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