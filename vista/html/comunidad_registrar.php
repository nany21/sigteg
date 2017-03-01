<!DOCTYPE HTML>
<html>
<!--Módulo de Registrar Institucións-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Registrar Institución</title><!--Título de la Página-->
		
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

			<div class="iconos_principales">

				<a href="comunidad_buscar.php"><span class="icon-magnifier" title="Buscar Institución"></span></a>
				<?php 
					if($_SESSION['tipo']=="Administrador")
					{?>
						<a href="comunidad_bloqueada.php"><span class="icon-lock-rounded2" title="Lista de Instituciones Desactivadas"></span></a>
						<a href="comunidad.php"><span class='icon-lock-rounded-open2' title="Lista de Instituciones Activas"></span></a>
				<?php }?>
				

			</div>

			<div class="form_reg_doc" style="margin-top:20px; height:470px; width:680px;">
				<form action="../../controlador/php/comunidad_registrar.php" method="POST">
					<table class="table2" style="width:700px;" border="0">
						
						<tr>
							<label><p class="titulo2" style="width:680px;">Registro de Institución<a href="comunidad.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>

						<tr>
							<br>
							<td class="td_titulo4">
								<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span>  Nombre:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="nombre" autofocus type="text" name="nombre_institucion" class="input4 placeholder2" placeholder="Ej. Comercial David, C.A." maxlength="50" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="entidad"><p class="p_left"><span class="icon-flag"></span>  Entidad Federal:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="entidad" type="text" name="entidad_federal" class="input4 placeholder2" placeholder="Ej. Sucre" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="municipio"><p class="p_left"><span class="icon-map-signs"></span> Municipio:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="municipio" type="text" name="municipio" class="input4 placeholder2" placeholder="Ej. Bermúdez" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="parroquia"><p class="p_left"><span class="icon-map"></span> Parróquia:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="parroquia" type="text" name="parroquia" class="input4 placeholder2" placeholder="Ej. Santa Rosa" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="codigo"><p class="p_left"><span class="icon-sort-numerically-outline"></span>  Código de Institución:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="codigo" type="text" name="cod_institucion" class="input4 placeholder2" placeholder="Ej. 1000" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr  style="margin-top:7px;">
							<td class="td_titulo4">
								<label><p class="p_left"><span class="icon-colours"></span> Tipo:</p></label>
							</td>
							<td class="td_caja_4"> 
								<select class="input5" name="tipo_institucion" required>
									<option value="0">
										<label>Seleccione</label>
									</option>
									<option value="Comunidad">
										<label>Comunidad</label>

									</option>
									<option value="Empresa">
										<label>Empresa</label>
									</option>
								</select>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="ubicacion"><p class="p_left"><span class="icon-map4"></span> Ubicación:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="ubicacion" type="text" name="ubicacion" class="input4 placeholder2" placeholder="Ej. Calle Independencia Nº 119" maxlength="200" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="rif"><p class="p_left"><span class="icon-sort-numerically-outline"></span>  R.I.F:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="rif" type="text" name="rif" class="input4 placeholder2" placeholder="Ej. J - 00000000 - 3" maxlength="15" required autocomplete="off"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						</table>
					
					<input class="a2" type="submit" value="Ingresar" style="margin-top:315px;">
					<input class="a3" type="reset" value="Borrar" style="margin-top:315px;">	
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
				 	//alert("Solo Debe Ingresar Numeros");
				  return false;
				 }
				}		 
			</script>

		<script>
		function soloLetras(e) 
			{
				    key = e.keyCode || e.which;
				    tecla = String.fromCharCode(key).toString();
				    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
				    especiales = [8, 37, 39, 46, 6];
				    tecla_especial = false
				    for(var i in especiales) 
				    {
				        if(key == especiales[i]) 
					        {
					           tecla_especial = true;
					           break;
					        }
				    }
				    if(letras.indexOf(tecla) == -1 && !tecla_especial){
				    	//alert('Sólo debe Ingresar Letras');
				        return false;
				    }
			}
		</script>
				</form>
				<br><br><br>
				<label><p class="p_red1" style="margin-top:0px;">(*) Campo Obligatorio</p></label>
				
			</div>
		
		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->