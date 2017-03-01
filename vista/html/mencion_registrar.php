<!DOCTYPE HTML>
<html>
<!--Módulo de Registrar Mención-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Registrar Mención</title><!--Título de la Página-->
		
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

				<a href="mencion_buscar.php"><span class="icon-magnifier" title='Buscar Mención'></span></a>
				<?php 
					if($_SESSION['tipo']=="Administrador")
					{?>
						<a href="mencion_bloqueada.php"><span class="icon-lock-rounded2" title='Lista de Menciones Desactivadas'></span></a>
						<a href="mencion.php"><span class='icon-lock-rounded-open2' title='Lista de Menciones Activas'></span></a>
				<?php }?>
				

			</div>

			<div class="form_reg_doc" style="margin-top:20px; height:300px; width:660px;">
				<form action="../../controlador/php/mencion_registrar.php" method="POST">
					<table class="table2" style="width:700px;" border="0">
						
						<tr>
							<label><p class="titulo2" style="width:660px;">Registro de Mención<a href="mencion.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>

						<tr>
							<br>
							<td class="td_titulo3">
								<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span> Nombre:</p></label>
							</td>
							<td class="td_caja_3">
								<input id="nombre" type="text" autofocus name="nombre_mencion" class="input4 placeholder2" placeholder="Ej. Comercio Exterior" maxlength="30" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo3">
								<label for="codigo"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Código de Mención:</p></label>
							</td>
							<td class="td_caja_3">
								<input id="codigo" type="text" name="cod_mencion" class="input4 placeholder2" placeholder="Ej. 1300" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo3">
								<label for="creditos"><p class="p_left"><span class="icon-done_all"></span> Créditos:</p></label>
							</td>
							<td class="td_caja_3">
								<input id="creditos" type="text" name="creditos_mencion" class="input4 placeholder2" placeholder="Ej. 120" maxlength="4" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo3">
								<label><p class="p_left"><span class="icon-graduate"></span> Carrera:</p></label>
							</td>
							<td class="td_caja_3"> 
								<select class="input5" name="id_carrera" required>
									<option value="0">
										<label>Seleccione</label>
									</option>

									<?php
										include ("../../modelo/clases/conexion.php");
										$conectar=new conectar();

										$sql="SELECT id_carrera, nombre_carrera FROM carrera WHERE status_carrera='Activo'";
										$ejecutar=pg_query($sql);

										while ($dato=pg_fetch_array($ejecutar))
										{
											echo "<option value='".$dato[0]."'>
													<label>".$dato[1]."</label>
												</option>";
										}
									?>
									
								</select>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						</table>
					
								<input class="a2" type="submit" value="Ingresar" style="margin-top:145px;">
								<input class="a3" type="reset" value="Borrar" style="margin-top:145px;">	

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