<!DOCTYPE HTML>
<html>
<!--Módulo de Registrar Trabajos-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Registrar Documentos</title><!--Título de la Página-->
		
		<!--Icono de la página, ubicado al lado del título-->
		<link rel="shortcut icon" type="image/x-icon" href="../imagenes/inicio.bmp">
		
		<link rel="stylesheet" type="text/css" href="../../vista/css/estilos.css">
		<!--Archivo que permite darle estilos generales al sistema-->

		<link rel="stylesheet" type="text/css" href="../../vista/css/menu.css">
		<!--Archivo que permite dar estilos al menú principal del sistema-->

		<link rel="stylesheet" type="text/css" href="../../vista/css/fuentes.css">
		<!--Archivo que permite incorporar los íconos básicos al sistema-->
		<script type="text/javascript" src='../../controlador/js/jquery.js'></script>
		<script type="text/javascript" src='../../controlador/js/formu_proyecto.js'></script>
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

				<a href="documentos_buscar.php"><span class="icon-magnifier" title="Buscar Documento"></span></a>
				<a href="documentos_fase_1.php"><span class="icon-filter_1" title='Lista de Documentos Capítulo 1'></span></a>
				<a href="documentos_fase_2.php"><span class="icon-filter_2" title='Lista de Documentos Capítulo 2'></span></a>
				<a href="documentos_fase_3.php"><span class="icon-filter_3" title='Lista de Documentos Capítulo 3'></span></a>
				<a href="documentos_fase_4.php"><span class="icon-filter_4" title='Lista de Documentos Capítulo 4'></span></a>
				<a href="documentos_fase_5.php"><span class="icon-filter_5" title='Lista de Documentos Capítulo 5'></span></a>
				<a href="documentos.php"><span class="icon-checkmark" title='Lista de Documentos Aprobados'></span></a>
				<a href="documentos_reprobado.php"><span class="icon-cancel2" title='Lista de Documentos Reprobados'></span></a>
				<a href="documentos_suspendido.php"><span class="icon-cancel" title='Lista de Documentos Suspendidos'></span></a>

			</div>
			<style type="text/css">
				p{margin-top:10px;}td{padding:2px;}
				#parti2,#parti21,#parti22,#parti23,#parti24,#parti25,#parti26,#parti27,#parti28,#parti29
				,.parti3{display: none;}
				.inp{
					width:80px;
					height: 40px;
					font-family:"Times New Roman",Helvetica, sans-serif;
					color:#fff;
					background: -moz-linear-gradient(top,  #8b8b8b 0%, #6a6a6a 50%, #5e5e5e 52%, #717171 100%); 
					background: -webkit-linear-gradient(top,  #8b8b8b 0%,#6a6a6a 50%,#5e5e5e 52%,#717171 100%); 
					background: linear-gradient(to bottom,  #8b8b8b 0%,#6a6a6a 50%,#5e5e5e 52%,#717171 100%); 
					font-size:17px;
					text-decoration:none;
					padding: 5px 7px;
					box-shadow: 1px 2px 1px rgba(0,0,0,.6);
					border-radius:50px;
					display:inline-block;
					outline: none;
				}
			</style>
			<div class="form_reg_doc" style="margin-top:20px; height:590px; width:760px;">
				<label><p class="titulo2" style="width:760px;">Registro de Documento<a href="documentos.php"><span class="icon-cancel-circle"></span></a></p></label>
				<div style=" height:94%; width:100%;overflow-y:auto;overflow-x:hidden;">
					<form action="../../controlador/php/documentos_registrar.php" method="POST">

						<div class="tr"  style="height:90px;">
							<label for="titulo"><p class="p_left"><span class="icon-spell-check"></span> Título del Documento:</p></label>
							<div class="td">
								<textarea autofocus name="titulo_asignacion" style="outline: none;min-width:350px;max-width:350px;min-height:70px;max-height:70px;padding:10px;border-radius:30px;border:2px solid #797979;text-align:justify;font-family:"Times New Roman"; onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();""></textarea>
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="codigo"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Código de Documento:</p></label>
							<div class="td">
								<input id="codigo" type="text" name="cod_asignacion" class="input4 placeholder2" placeholder="Ej. 1700" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-user-tie"></span> Facilitador:</p></label>
							<div class="td">
								<select class="input5" name="id_especialista" required>
									<option value="0">
										<label>Seleccione</label>
									</option>

									<?php
										include ("../../modelo/clases/conexion.php");
										$conectar=new conectar();

										$sql="SELECT * FROM facilitador WHERE status='Activo'";
										$ejecutar=pg_query($sql);

										while ($dato=pg_fetch_array($ejecutar))
										{
											echo "<option value='".$dato[0]."'>
													<label>".$dato[1]." ".$dato[2]." ".$dato[3]."</label>
												</option>";
										}
									?> 		
								</select>
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-user-tie"></span> Tutor:</p></label>
							<div class="td">
								<select class="input5" name="id_especialista2" required>
									<option value="0">
										<label>Seleccione</label>
									</option>

									<?php

										$sql="SELECT * FROM facilitador WHERE status='Activo'";
										$ejecutar=pg_query($sql);

										while ($dato=pg_fetch_array($ejecutar))
										{
											echo "<option value='".$dato[0]."'>
													<label>".$dato[1]." ".$dato[2]." ".$dato[3]."</label>
												</option>";
										}
									?> 
								</select>
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-colours"></span> Categoría:</p></label>
							<div class="td">
								<select class="input5" name="id_categoria" required>
									<option value="0">
										<label>Seleccione</label>
									</option>

									<?php
									
										$sql="SELECT id_categoria, nombre_categoria FROM categoria WHERE status_categoria='Activo'";
										$ejecutar=pg_query($sql);

										while ($dato=pg_fetch_array($ejecutar))
										{
											echo "<option value='".$dato[0]."'>
													<label>".$dato[1]."</label>
												</option>";
										}
									?> 
								</select>
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-library"></span> Institución:</p></label>
							<div class="td">
								<select class="input5" name="id_institucion" required>
									<option value="0">
										<label>Seleccione</label>
									</option>

									<?php
									
										$sql="SELECT id_institucion, nombre_institucion FROM institucion WHERE status_institucion='Activo'";
										$ejecutar=pg_query($sql);

										while ($dato=pg_fetch_array($ejecutar))
										{
											echo "<option value='".$dato[0]."'>
													<label>".$dato[1]."</label>
												</option>";
										}
									?> 
								</select>
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<br><p class="p_center">Participante 1</p><br><br>
						</div>

						<br>
						<div class="tr">
							<label for="cedula"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Cédula de Participante:</p></label>
							<div class="td">
								<input id="cedula" type="text" name="cedula3" class="input4 placeholder2" placeholder="Ej. 16000000" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div><br>

							<div class="td_botom">
								<p style='color:red;width:50px;margin-top:-44px;' >
									<button type="button" id="input-plus" class="icon-plus"></button>
									<button type="button" id="remove-input" class="icon-minus" style="display:none;"></button>
								</p>	
							</div> 
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span> Nombre de Participante:</p></label>
							<div class="td">
								<input id="nombre" type="text" name="nombre3" class="input4 placeholder2" placeholder="Ej. María" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="apellido"><p class="p_left"><span class="icon-spell-check"></span> Apellido de Participante:</p></label>
							<div class="td">
								<input id="apellido" type="text" name="apellido3" class="input4 placeholder2" placeholder="Ej. González" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>	

						<div id="mas" ></div>
						
						<div class"tr" style="height:60px;margin-top:30px;" align="center">
							<input type="hidden" id="total" value="3" name="total">
							<input class="inp" type="submit" value="Ingresar">
							<input class="inp" type="reset" value="Borrar">
						</div>

						<br><br><br>

				<label><p class="p_red1" style="margin-bottom:20px;">(*) Campo Obligatorio</p></label>

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
							    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ.,-'ºª\"";
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
						</div>		
					</form>
				</div>	
			</div>
		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->

