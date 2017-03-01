<!DOCTYPE HTML>
<html>
<!--Módulo de Registrar Trabajos-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Agregar Localización</title><!--Título de la Página-->
		
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

				<a href="trabajos_buscar.php"><span class="icon-magnifier" title="Buscar Trabajo"></span></a>
				<a href="trabajos_fase_1.php"><span class="icon-filter_1" title='Lista de Trabajos Fase 1'></span></a>
				<a href="trabajos_fase_2.php"><span class="icon-filter_2" title='Lista de Trabajos Fase 2'></span></a>
				<a href="trabajos_fase_3.php"><span class="icon-filter_3" title='Lista de Trabajos Fase 3'></span></a>
				<a href="trabajos_fase_4.php"><span class="icon-filter_4" title='Lista de Trabajos Fase 4'></span></a>
				<a href="trabajos_fase_5.php"><span class="icon-filter_5" title='Lista de Trabajos Fase 5'></span></a>
				<a href="trabajos.php"><span class="icon-checkmark" title='Lista de Trabajos Aprobados'></span></a>
				<a href="trabajos_reprobado.php"><span class="icon-cancel2" title='Lista de Trabajos Reprobados'></span></a>
				<a href="trabajos_suspendido.php"><span class="icon-cancel" title='Lista de Trabajos Suspendidos'></span></a>

			</div>

			<div class="form_reg_doc" style="margin-top:20px; height:300px; width:660px;">
				<form action="../../controlador/php/trabajos_add_data.php" method="POST">
					<table class="table2" style="width:700px;" border="0">
						
						<tr>
							<label><p class="titulo2" style="width:660px;">Añadir Localización a Trabajo Especial de Grado<a href="trabajos.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>

						<tr>
							<br>
							<td class="td_titulo3">
								<label for="cubiculo"><p class="p_left"><span class="icon-domain"></span> Cubículo:</p></label>
							</td>
							<td class="td_caja_3">
								<input id="cubiculo" type="text" name="cubiculo" class="input4 placeholder2" placeholder="Ej. Cubículo 1" maxlength="20" required autocomplete="off"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo3">
								<label for="año"><p class="p_left"><span class="icon-calendar"></span> Año:</p></label>
							</td>
							<td class="td_caja_3">
								<input id="año" type="text" name="ano" class="input4 placeholder2" placeholder="Ej. 2014" maxlength="4" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo3">
								<label for="archivo"><p class="p_left"><span class="icon-file-pdf" style="margin-left:10px;"></span> Trabajo en PDF:</p></label>
							</td>
							<td class="td_caja_3">
								<input id="archivo" type="file" name="archivo" style='width:350px;height:10px;padding:10px;border-radius:30px;border:2px solid #797979;text-align:justify;font-family:"Times New Roman';class="input4 placeholder2" placeholder="Ej. 2014" maxlength="4" required autocomplete="off"></file><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo3">
								<label><p class="p_left"><span class="icon-layers"></span>Título del Trabajo:</p></label>
							</td>
							<td class="td_caja_3"> 
								<select class="input5" name="id_asignacion" required>
									<option value="0">
										<label>Seleccione</label>
									</option>

									<?php
										include ("../../modelo/clases/conexion.php");
										$conectar=new conectar();

										$sql="SELECT id_asignacion, titulo_asignacion FROM asignacion WHERE status_asignacion='Aprobado' AND tipo_asignacion='trabajo'";
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
							    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ.,-/ªº\"";
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

