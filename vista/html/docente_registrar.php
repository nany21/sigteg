<!DOCTYPE HTML>
<html>
<!--Módulo de Registrar Docentes-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Registrar Docente</title><!--Título de la Página-->
		
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
				
				<a href="docente_buscar.php"><span class="icon-magnifier" title="Buscar Docente"></span></a>
				<?php 
					if($_SESSION['tipo']=="Administrador")
					{?>
						<a href="docente_bloqueado.php"><span class="icon-lock-rounded2" title="Lista de Docentes Desactivados"></span></a>
						<a href="docente.php"><span class='icon-lock-rounded-open2' title="Lista de Docentes Activos"></span></a>
				<?php }?>
				
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
				.inp:hover{
					text-decoration:none;
					background:rgba(0,0,0,.8);
					color:#fff;
				}
				.inp:active{
					text-decoration:none;
					background:rgba(0,0,0,.3);
					box-shadow:inset 0px 3px 2px rgba(0,0,0,1);
					color:#fff;
				}
			</style>

			<div class="form_reg_doc" style="margin-top:20px; height:560px; width:720px;">
				<label><p class="titulo2" style="width:720px;">Registro de Docente<a href="docente.php"><span class="icon-cancel-circle"></span></a></p></label>
				<div style=" height:94%; width:100%;overflow-y:auto;overflow-x:hidden;">
					<form action="../../controlador/php/docente_registrar.php" method="POST">

						<div class="tr">
							<label for="primer"><p class="p_left"><span class="icon-spell-check"></span> Primer Nombre:</p></label>
							<div class="td">
								<input id="primer" type="text" name="nombre_facilitador" class="input4 placeholder2" placeholder="Ej. Rafael" autofocus maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="segundo"><p class="p_left"><span class="icon-spell-check"></span> Segundo Nombre:</p></label>
							<div class="td">
								<input id="segundo" type="text" name="nombre2" class="input4 placeholder2" placeholder="Ej. José" maxlength="20" autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="primer"><p class="p_left"><span class="icon-spell-check"></span> Primer Apellido:</p></label>
							<div class="td">
								<input id="primer" type="text" name="apellido_facilitador" class="input4 placeholder2" placeholder="Ej. Malavé" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="segundo"><p class="p_left"><span class="icon-spell-check"></span> Segundo Apellido:</p></label>
							<div class="td">
								<input id="segundo" type="text" name="apellido2" class="input4 placeholder2" placeholder="Ej. Garcia" maxlength="20" autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="cedula"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Cédula:</p></label>
							<div class="td">
								<input id="cedula" type="text" name="cedula_facilitador" class="input4 placeholder2" placeholder="Ej. 12000000" maxlength="8" autocomplete="off" onKeyPress="return SoloNumeros(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-calendar"></span>  Fecha de Nacimiento:</p></label>
							<div class="td">
								<input type="date" name="fecha_nacimiento" class="input4 p_left" style="font-size:22px; margin-top:0px;" required max="15/04/2016" min="01/01/1930">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-man-woman"></span> Sexo:</p></label>
							<div class="td">
								<select class="input5" name="sexo" required>
									<option value="0">
										<label>Seleccione</label>
									</option>
									<option value="Masculino">
										<label>Masculino</label>

									</option>
									<option value="Femenino">
										<label>Femenino</label>
									</option>
								</select>
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="direccion"><p class="p_left"><span class="icon-map2"></span> Dirección:</p></label>
							<div class="td">
								<input id="direccion" type="text" name="direccion" class="input4 placeholder2" placeholder="Ej. Urbanización Bello Monte" maxlength="100" required autocomplete="off">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="telefono"><p class="p_left"><span class="icon-phone"></span> Teléfono:</p></label>
							<div class="td">
								<input id="telefono" type="text" name="telefono" class="input4 placeholder2" placeholder="Ej. 04240001122" maxlength="11" required autocomplete="off" onKeyPress="return SoloNumeros(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="correo"><p class="p_left"><span class="icon-envelope"></span> Correo:</p></label>
							<div class="td">
								<input id="correo" type="email" name="correo" class="input4 placeholder2" placeholder="Ej. ejemplo@gmail.com" maxlength="50" autocomplete="off">
							</div>
							<div class="td_2">
								<label><p style='color:red;'></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="cargo"><p class="p_left"><span class="icon-user-tie"></span> Profesión:</p></label>
							<div class="td">
								<input id="cargo" type="text" name="cargo" class="input4 placeholder2" placeholder="Ej. Licenciado en Administración" maxlength="50" required autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="dedicacion"><p class="p_left"><span class="icon-price-tags"></span> Dedicación:</p></label>
							<div class="td">
								<input id="dedicacion" type="text" name="dedicacion" class="input4 placeholder2" placeholder="Ej. Facilitador" maxlength="100" required autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="categoria"><p class="p_left"><span class="icon-colours"></span> Categoría:</p></label>
							<div class="td">
								<input id="categoria" type="text" name="categoria" class="input4 placeholder2" placeholder="Ej. Contratado" maxlength="20" autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="titulo"><p class="p_left"><span class="icon-graduate"></span> Título de Postgrado:</p></label>
							<div class="td">
								<input id="titulo" type="text" name="postgrado" class="input4 placeholder2" placeholder="Ingresar Postgrado" maxlength="50" autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style='color:red;'>(*)</p></label>
							</div>
						</div>

						<div class"tr" style="height:60px;margin-top:30px;" align="center">
							<input type="hidden" id="total" value="3" name="total">
							<input class="inp" type="submit" value="Ingresar">
							<input class="inp" type="reset" value="Borrar">
						</div>	

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
				    	alert('Sólo debe Ingresar Letras');
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
				

				<br><br><br>

				<label><p class="p_red1" style="margin-top:550px;margin-bottom:20px;">(*) Campo Obligatorio</p></label>
				
			</div>
		
		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->
