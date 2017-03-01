<!DOCTYPE HTML>
<html>
<!--Módulo de Acerca de-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Localización.</title><!--Título de la Página-->

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
					<h2 class='h2'>Localización geográfica.</h2>
					<hr>
					<p class='p_text'>La Universidad Politécnica Territorial de Paria “Luis Mariano Rivera” está situada en la Avenida Universitaria vía El Pilar, en el Valle de Canchunchú Florido (Charallave) de Carúpano, Estado Sucre, y tiene como límites poligonales:<br></p>
					<ul>
						<li class='p_caracteristica'>-En el norte: el Sector los Morenos.</li>
						<li class='p_caracteristica'>-Hacia el sur: Calle 1 de Charallave.</li>
						<li class='p_caracteristica'>-En el este: Sector Canchunchú Florido y el Río Quebrada de Piedra.</li>
						<li class='p_caracteristica'>-Por el oeste: con la Avenida Universitaria.</li>
					</ul>
					<p class='p_text'><br>En la siguiente imagen se puede apreciar la ubicación exacta de la Universidad Politécnica Territorial de Paria. "Luis Mariano Rivera":</p>
					<div class="img_localizacion"></div>
					<cite class='cite'>Fuente:Googlemaps(2016)</cite>
				</section>
<div id="fecha"	<div id="fecha" style="margin-top:-687px; margin-left:760px;color:#797979;float:left;">	
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