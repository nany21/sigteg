<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Coordinación de Planificación y Evaluación de Gestión. (UPEG)</title><!--Título de la Página-->

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
					<h2 class='h2'>Coordinación de Planificación y Evaluación de Gestión. (U.P.E.G)</h2>
					<hr>
					<br><br>
					<p class='p_text'>Es la instancia de articulación, integración y participación, presidida por el 
						coodinador(a) de los Programas Nacionales de Formación (PNF), y conformada por el coordinador 
						del Comité de Gestión Administrativa, Comité de Gestión de la Investigación e Innovación, para 
						ejercer la elaboración, seguimiento y evaluación del Plan Participativo de Gestión Departamental, 
						así como la coordinación de los respectivos procesos de evaluación en todos los  ámbitos de gestión 
						que constituyan la Dependencia Académica. Las principales funciones que desempeña esta coordinación 
						son las siguientes:
					</p>
					<br><br>
					<p class='p_text'>1. Realizar seguimiento de las decisiones aprobadas en Consejo Académico.
					</p>
					<br><br>
					<p class='p_text'>2. Coordinar la elaboración, ejecución y evaluación del Plan Participativo de Gestión 
						Departamental en articulación con los planes y las líneas generales de la institución.
					</p>
					<br><br>
					<p class='p_text'>3. Presentar propuestas aprobadas por el Concejo de Departamento ante el Consejo Académico.
					</p>
					<br><br>
					<p class='p_text'>4. Garantizar información permanente y oportuna sobre las actuaciones de la Coordinación 
						de Planificación y Evaluación de Gestión al consejo de Departamento y al Consejo Académico.
					</p>
					<br><br>
					<p class='p_text'>5. Coordinar acciones con los distintos comités de que integran los Colectivos de 
						Gestión para el cumplimiento de sus fines.
					</p>
					<br><br>
					<p class='p_text'>6. Coordinar acciones con las distintas Coordinaciones de Planificación y Evaluación de 
						Gestión de las demás Dependencias Académicas para el cumplimiento de sus fines comunes e inherentes 
						en la gestión.
					</p>
					<br><br>
					<p class='p_text'>7. Elaborar las normas de convivencia del Departamento.
					</p>
					<br><br>
					
				</section>
<div id="fecha"	<div id="fecha" style="margin-top:-663px; margin-left:760px;color:#797979;float:left;">	
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