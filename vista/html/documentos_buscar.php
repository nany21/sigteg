<!DOCTYPE HTML>
<html>
<!--Módulo de Buscar Proyectos Socio - Integradores.-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Buscar Documento.</title><!--Título de la Página-->
		
		<!--Icono de la página, ubicado al lado del título-->
		<link rel="shortcut icon" type="image/x-icon" href="../imagenes/inicio.bmp">
		
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
			<div class="iconos_principales">

				<a href="documentos_registrar.php"><span class="icon-plus2" title='Agregar Documento'></span></a>
				<a href="documentos_fase_1.php"><span class="icon-filter_1" title='Lista de Documentos Capítulo 1'></span></a>
				<a href="documentos_fase_2.php"><span class="icon-filter_2" title='Lista de Documentos Capítulo 2'></span></a>
				<a href="documentos_fase_3.php"><span class="icon-filter_3" title='Lista de Documentos Capítulo 3'></span></a>
				<a href="documentos_fase_4.php"><span class="icon-filter_4" title='Lista de Documentos Capítulo 4'></span></a>
				<a href="documentos_fase_5.php"><span class="icon-filter_5" title='Lista de Documentos Capítulo 5'></span></a>
				<a href="documentos.php"><span class="icon-checkmark" title='Lista de Documentos Aprobados'></span></a>
				<a href="documentos_reprobado.php"><span class="icon-cancel2" title='Lista de Documentos Reprobados'></span></a>
				<a href="documentos_suspendido.php"><span class="icon-cancel" title='Lista de Documentos Suspendidos'></span></a>

			</div>

			<center>
			<div class="form_bus4">
				<table class="table2" border="0">
					<th>
						<tr>
							<label><p class="titulo7">Buscar Documento.<a href="documentos.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>
						<tr>
							<form action="../../controlador/php/documentos_buscar.php" method="POST">
							<td class="td_titulo_2">
								<label><p class="p_right">Buscar:</p></label>
							</td>
							<td class="td_caja_2">
								<input type="text" name="cod_asignacion" class="input3 placeholder2" placeholder="Ingrese código" maxlength="8" required autofocus autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
						</tr>
				</table>	
					<input class="a6" type="submit" value="Ingresar">
					<input class="a7" type="reset" value="Borrar">
					
					<script>
						 function SoloNumeros(evt){
						 if(window.event){
						  keynum = evt.keyCode;
						 }
						 else{
						  keynum = evt.which;
						 }
						 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
						  return true;
						 }
						 else{
						 	alert("Solo Debe Ingresar Numeros");
						  return false;
						 }
						}		 
					</script>
					
				</form>
				</form>
			</div>
			</center>
		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->Proyectos Socio - Integradores.