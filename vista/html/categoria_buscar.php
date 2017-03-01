<!DOCTYPE HTML>
<html>
<!--Módulo de Buscar Categoría-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<title>Buscar Categoría</title><!--Título de la Página-->
		
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

				<a href="categoria_registrar.php"><span class="icon-plus2" title="Registrar nueva Categoría"></span></a>
		
				<?php 
					if($_SESSION['tipo']=="Administrador")
					{?>
						<a href="categoria_bloqueada.php"><span class="icon-lock-rounded2" title="Lista de Categorías Desactivadas"></span></a>
						<a href="categoria.php"><span class='icon-lock-rounded-open2' title="Lista de Categorías Activas"></span></a>
				<?php }?>
				
			</div>

			<center>
			<div class="form_bus" style="margin-top:20px;width:650px;">
				<table class="table2" border="0">
					<th>
						<tr>
							<label><p class="titulo3" style="width:650px;">Buscar Categoría<a href="categoria.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>
						<tr>
							<form action="../../controlador/php/categoria_buscar.php" method="POST">
							<td class="td_titulo_2">
								<label><p class="p_right"><span class="icon-search"></span>Buscar:</p></label>
							</td>
							<td class="td_caja_2">
								<input type="text" name="codigo_categoria" class="input3 placeholder2" placeholder="Ingrese código" maxlength="8" required autofocus autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
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
			</div>
			</center>
		</div><!--Cierre de la división del #id="general"-->
	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->