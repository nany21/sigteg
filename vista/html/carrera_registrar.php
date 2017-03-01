<!DOCTYPE HTML>
<html>
<!--Módulo de Registrar Carrera-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Registrar Carrera</title><!--Título de la Página-->
		
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

				<a href="carrera_buscar.php"><span class="icon-magnifier" title="Buscar Carrera"></span></a>
				<?php 
					if($_SESSION['tipo']=="Administrador")
					{?>
						<a href="carrera_bloqueada.php"><span class="icon-lock-rounded2" title="Lista de Carreras Desactivadas"></span></a>
						<a href="carrera.php"><span class='icon-lock-rounded-open2' title="Lista de Carreras Activas"></span></a>
				<?php }?>
				

			</div>

			<div class="form_reg_usu" style="margin-top:20px;height:305px; width:670px;">
				<form action="../../controlador/php/carrera_registrar.php" method="POST">
					<table class="table2" border="0">
						
						<tr>
							<label><p class="titulo2" style="width:670px;">Registro de Carrera<a href="carrera.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>

						<tr>
							<br>
							<td class="td_titulo">
								<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span> Nombre:</p></label>
							</td>
							<td class="td_caja">
								<input id="nombre" type="text" autofocus name="nombre_carrera" class="input1 placeholder2" placeholder="Ej. Mercadeo" maxlength="25" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label><p class="p_left"><span class="icon-colours"></span> Tipo:</p></label>
							</td>
							<td class="td_caja"> 
								<select class="input2" name="tipo_carrera" required>
									<option value="0">
										<label>Seleccione</label>
									</option>
									<option value="Técnica">
										<label>Técnica</label>

									</option>
									<option value="PNF">
										<label>PNF</label>
									</option>
								</select>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="codigo"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Código:</p></label>
							</td>
							<td class="td_caja">
								<input id="codigo" type="text" name="codigo_carrera" class="input1 placeholder2" placeholder="Ej. 1234" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="creditos"><p class="p_left"><span class="icon-done_all"></span> Créditos:</p></label>
							</td>
							<td class="td_caja">
								<input id="creditos" type="text" name="creditos_carrera" class="input1 placeholder2" placeholder="Ej. 90" maxlength="4" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						</table>
					
							<input class="a2" type="submit" value="Ingresar" style="margin-top:155px;">
							<input class="a3" type="reset" value="Borrar" style="margin-top:155px;">	

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
				<label><p class="p_red1">(*) Campo Obligatorio</p></label>
				
			</div>
		
		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->