<!DOCTYPE HTML>
<html>
<!--Módulo de Registrar Usuario-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Registrar Usuario</title><!--Título de la Página-->
		
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

		<?php
			if(empty($_SESSION['acti']))
			{
				echo $_SESSION['nombre_per'];
			}
		?>

		<div id='general'>
		<!--División que posee un id que permite darle el estilo en general de la 
		página del sistema, sus atribulos se visualizan en el archivo vista/css/estilos.css-->

			<?php
				include("banner.php");
				include("menu.php");
			?>

			<div class="iconos_principales">

				<a href="usuario_buscar.php"><span class="icon-magnifier" title='Buscar Usuario'></span></a>
				<a href="usuario_bloqueado.php"><span class="icon-lock-rounded2" title='Mostrar Usuarios Bloqueados'></span></a>
				<a href="usuario.php"><span class='icon-lock-rounded-open2' title='Mostrar Usuarios Activos'></span></a>

			</div>


			<div class="form_reg_usu" style="margin-top:20px;width:670px;height:550px;">
				<form action="../../controlador/php/usuario_registrar.php" method="POST">
					<table class="table2" border="0">
						
						<tr>
							<label><p class="titulo2" style="width:670px;">Registro de Usuario<a href="usuario.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>

						<tr>
							<br>
							<td class="td_titulo">
								<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span> Nombre:</p></label>
							</td>
							<td class="td_caja">
								<input id="nombre" type="text" name="nombre_per" class="input1 placeholder2" placeholder="Ej. María" maxlength="20" required autocomplete="off" autofocus onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="apellido"><p class="p_left"><span class="icon-spell-check"></span> Apellido:</p></label>
							</td>
							<td class="td_caja">
								<input id="apellido" type="text" name="apellido_per" class="input1 placeholder2" placeholder="Ej. Pérez" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="cedula"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Cédula:</p></label>
							</td>
							<td class="td_caja">
								<input id="cedula" type="text" name="cedula_per" class="input1 placeholder2" placeholder="Ej. 5444333" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="telefono"><p class="p_left"><span class="icon-phone"></span> Teléfono:</p></label>
							</td>
							<td class="td_caja">
								<input id="telefono" type="text" name="telefono_per" class="input1 placeholder2" placeholder="Ej. 04120001122" maxlength="11" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="direccion"><p class="p_left"><span class="icon-map4"></span> Dirección:</p></label>
							</td>
							<td class="td_caja">
								<input id="direccion" type="text" name="direccion" class="input1 placeholder2" placeholder="Ej. Calle Independencia Nº 119" maxlength="150" required autocomplete="off"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="usuario"><p class="p_left"><span class="icon-user"></span> Usuario:</p></label>
							</td>
							<td class="td_caja">
								<input id="usuario" type="text" name="usuario" class="input1 placeholder2" placeholder="Nombre de Usuario" maxlength="16" required autocomplete="off"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="contraseña"><p class="p_left"><span class="icon-key"></span> Contraseña:</p></label>
							</td>
							<td class="td_caja">
								<input id="contraseña" type="password" name="password" class="input1 placeholder2" placeholder="Máximo 16 caracteres" maxlength="16" minlength="8"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label><p class="p_left"><span class="icon-users"></span> Tipo:</p></label>
							</td>
							<td class="td_caja"> 
								<select class="input2" name="tipo">
									<option value="0">
										<label>Seleccione</label>
									</option>
									<option value="Usuario">
										<label>Usuario</label>

									</option>
									<option value="Administrador">
										<label>Administrador</label>
									</option>
								</select>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="correo"><p class="p_left"><span class="icon-envelope"></span> Correo:</p></label>
							</td>
							<td class="td_caja">
								<input id="correo" type="email" name="correo" class="input1 placeholder2" placeholder="Ej. ejemplo@gmail.com" maxlength="50" autocomplete="off"><br>
							</td>
							<td class="td_corto">
							</td>
								<label><p class="p_red">(*)</p></label>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="cargo"><p class="p_left"><span class="icon-user-tie"></span> Cargo:</p></label>
							</td>
							<td class="td_caja">
								<input id="cargo" type="text" name="cargo" class="input1 placeholder2" placeholder="Ej. Coordinador de Publicidad" maxlength="50" required autocomplete="off"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red">(*)</p></label>
							</td>
						</tr>
						</table>
					
								<input class="a2" type="submit" value="Ingresar" style="margin-top:400px;">
								<input class="a3" type="reset" value="Borrar" style="margin-top:400px;">	
								<br><br><br>
				<label><p class="p_red1">(*) Campo Obligatorio</p></label>
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

		<div id="fecha" style="margin-top:-950px;">	
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
		
</div>

				</form>
				
				
			</div>
		
		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->