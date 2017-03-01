<!DOCTYPE HTML>
<html>
<!--Módulo de Contacto-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Contacto</title><!--Título de la Página-->

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
		<?php include("../../controlador/php/validar_sesion.php"); ?>
		<div id='general'>
		<!--División que posee un id que permite darle el estilo en general de la 
		página del sistema, sus atribulos se visualizan en el archivo vista/css/estilos.css-->

			<?php
			include("banner.php");
			include("menu.php");
			?>
			
			<div class="contacto">
				<table class="table2" border="0">
					<th>
						<tr>
							<label><p class="titulo4">Contacto<a href="pagina_principal.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>
						<tr>
							<br><p class="p_italic">Sistema de información desarrollado por:</p>
							<td>
								<div class="img_contacto"></div>
							</td>
							<td>
								<p class="p_left2"><span class="icon-facebook2"></span> Danny De La Rosa</p>
								<p class="p_left2"><span class="icon-pencil"></span> 25.286.422</p>
								<p class="p_left2"><span class="icon-whatsapp"></span> (0424) 868-0256</p>
								<p class="p_left2"><span class="icon-mail"></span> dannydelarosa18@hotmail.com</p>	
							</td>
						</tr>
				</table>	
					
					</form>
			</div>
					<div id="fecha" style="margin-top:-870px; margin-left:760px;">	
		<script>
			var f = new Date();
			document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
		</script> 


		<div id="reloj">
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