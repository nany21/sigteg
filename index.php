<!DOCTYPE HTML>
<html>
<!--Página de Inicio de Sesión-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Iniciar Sesión.</title><!--Título de la Página-->

		<link rel="shortcut icon" type="image/x-icon" href="vista/imagenes/inicio.bmp">
		<!--Icono de la página, ubicado al lado del título-->

		<link rel="stylesheet" type="text/css" href="vista/css/estilos.css">
		<!--Archivo que permite darle estilos generales al sistema-->

		<link rel="stylesheet" type="text/css" href="vista/css/fuentes.css">
		<!--Archivo que permite incorporar los íconos básicos al sistema-->

	</head>

	<body><!--Cuerpo del Documento-->

		<div id='general'>
		<!--División que posee un id que permite darle el estilo en general de la 
		página del sistema, sus atribulos se visualizan en el archivo vista/css/estilos.css-->

			<?php
				include("vista/html/banner.php");
			?>
				
				<center><!--Para centrar todos los elementos después del banner-->

				<h1 class="titulo">Sistema de Gestión de Trabajos Especiales de Grado.</h1>
				<!--Título del sistema con una clase="titulo" que le dará las propiedades al
				mismo-->

				<div class="inicio"></div>
				<!--División que contiene la imagen que aparece al lado del formulario-->

					<div class="formulario">
					<!--División que le dará las propiedades al formulario a través de una clase
					llamada formulario-->

						<table class="table1" border="0">
						<!--Tabla con sus respectivas propiedades mediante una clase llamada
						"table1"-->

							<th>
								<tr><!--Columna-->
									<label><p class="titulo1" style="color:#fff;font-weight:bold;">Iniciar Sesión</p></label>
								</tr>
								<tr><!--Columna-->
									<form action="controlador/php/inicio.php" method="POST">
									<!--Formulario-->
									<td class="td"><!--Fila-->
										<label><p class="p4" style="color:#797979;font-weight:bold;"><span class="icon-user"></span>Usuario</p></label>
									</td>
								</tr>
								<tr><!--Columna-->
									<td><!--Fila-->
										<input type="text" name="usu" class="input placeholder2" 
										placeholder="Usuario" maxlength="16" required autocomplete="off" autofocus><br>
									</td>
								</tr>
								<tr><!--Columna-->
									<td><!--Fila-->
										<label><p class="p4" style="color:#797979;font-weight:bold;"><span class="icon-key2"></span>Contraseña</p></label>
									</td>
								</tr>
								<tr><!--Columna-->
									<td><!--Fila-->
										<input type="password" name="pass" class="input placeholder2" 
										 placeholder="Contraseña" maxlength="16" required><br>
									</td>
								</tr>
								<tr><!--Columna-->
									<td><!--Fila-->
										<input class="a4" type="submit" value="Ingresar">
										<!--Botón Ingresar-->
										<input class="a5" type="reset" value="Cancelar">
										<!--Botón Resetear-->
										</form><!--Cierre del formulario-->
									</td>
								</tr>		
							</th>
						</table>
					</div>

				<footer class='footer' style="bottom:-257px;float:left;"><!--Pie de Página-->
					<p>Sistema de Información desarrollado por: Danny De La Rosa. Sección I202.<br>
						| HTML 5 | CSS 3 | PHP 5 | JS | JQuery | PostgreSQL | Patrón MVC |</p>
				</footer><!--Cierre del pie de página-->

			</center><!--Cierre del center, permitirá que se centren los elementos que están arriba
			del mismo-->

		</div><!--Cierre de la división del #id="general"-->	
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->