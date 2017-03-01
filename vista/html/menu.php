<!DOCTYPE HTML>
<html>
<!--Menú Principal del Sistema-->
	
	<head><!--Cabecera-->
		<!--Elementos que no visualizará el usuario de forma directa, sin embargo, permitirá darle
		estilos generales al sistema-->

		<meta charset="UTF-8"><!--Para que se puedan incorporar caracteres especiales y
							   acentos en las palabras del sistema-->

		<link rel="shortcut icon" type="image/x-icon" href="vista/imagenes/inicio.bmp">
		<!--Icono de la página, ubicado al lado del título-->

		<link rel="stylesheet" type="text/css" href="../../vista/css/estilos.css">
		<!--Archivo que permite darle estilos generales al sistema-->

		<link rel="stylesheet" type="text/css" href="../../vista/css/menu.css">
		<!--Archivo que permite dar estilos al menú principal del sistema-->

		<link rel="stylesheet" type="text/css" href="../../vista/css/fuentes.css">
		<!--Archivo que permite incorporar los íconos básicos al sistema-->

	</head>

	<body><!--Cuerpo del Documento-->
				
				<center><!--Para centrar todos los elementos después del banner-->

				<h1 class="titulo">Sistema de Gestión de Trabajos Especiales de Grado.</h1>
				<!--Título del sistema con una clase="titulo" que le dará las propiedades al
				mismo-->

				<ul id="menu">
				<!--División que le dará las propiedades al menú a través de una clase
				llamada menú-->

					<li>
						<a href="pagina_principal.php"><span class="icon-home2"></span>Inicio</a>
						<!--Primera pestaña del menú principal, al presionarla el sistema se direccionará a la Página Principal del mismo sin importar  el módulo
						en el que se encuentre-->
					</li>

					<li>
						<a href="#"><span class="icon-users2"></span>Personal</a>
						<!--Segunda pestaña del menú principal, al estar en estado de hover el sistema desplegará un submódulo con dos pestañas, las cuales son: Usuario y Docente-->
							<ul>
							<!--Submódulo de la segunda pestaña del menú principal del sistema-->
								<?php 
									if($_SESSION['tipo']=="Administrador")
									{?>
										<li>
											<a href="usuario.php"><span class="icon-user3"></span>Usuario</a>
										<!--Primera pestaña del submódulo "Personas"-->
										</li>
									<?php }?>
																
								<li>
									<a href="docente.php"><span class="icon-shopping-bag"></span>Docente</a>
										<!--Segunda pestaña del submódulo "Personas"-->
								</li>
							</ul>
					</li>

					<li>
						<a href="#"><span class="icon-menu3"></span>Servicios</a>
						<!--Tercera pestaña del menú principal, al estar en estado de hover el sistema  desplegará un  submódulo con  cuatro pestañas, las cuales son: Carrera, Mención, Categoría y Comunidad-->
							<ul>
							<!--Submódulo de la tercera pestaña del menú principal del sistema-->
								<li>
									<a href="carrera.php"><span class="icon-graduation-cap"></span>Carrera</a>
									<!--Primera pestaña del submódulo "Servicios"-->
								</li>
								<li>
									<a href="mencion.php"><span class="icon-graph"></span>Mención</a>
									<!--Segunda pestaña del submódulo "Servicios"-->
								</li>
								<li>
									<a href="categoria.php"><span class="icon-list-numbered"></span>Categoría</a>
									<!--Tercera pestaña del submódulo "Servicios"-->
								</li>
								<li>
									<a href="comunidad.php"><span class="icon-office"></span>Institución</a>
									<!--Cuarta pestaña del submódulo "Servicios"-->
								</li>
							</ul>
					</li>

					<li>
						<a href="#"><span class="icon-books"></span>Biblioteca</a>
						<!--Cuarta pestaña del menú principal, al estar en estado de hover el sistema  desplegará  un  submódulo con tres pestañas, las cuales son: Proyectos  Socio - Integradores, Trabajos Especiales de Grado y Otros Documentos-->
							<ul>
							<!--Submódulo de la cuarta pestaña del menú principal del sistema-->


								<!--<li><a href="#.html"><span class="icon-file-text">Temas en Revisión</a></li>-->


								<li>
									<a href="proyectos.php"><span class="icon-book"> Proyectos   Socio- Integradores</a>
									<!--Primera pestaña del submódulo "Biblioteca"-->
								</li>
								<li>
									<a href="trabajos.php"><span class="icon-book"> Trabajos Especiales de Grado</a>
									<!--Segunda pestaña del submódulo "Biblioteca"-->
								</li>
								<li>
									<a href="documentos.php"><span class="icon-book"> Otros Documentos</a>
									<!--Tercera pestaña del submódulo "Biblioteca"-->
								</li>

							</ul>
					</li>

					<li>
						<a href="#"><span class="icon-aid-kit"> Ayuda</a>
						<!--Sexta pestaña del menú principal, al estar en estado de hover el sistema  desplegará  un  submódulo con tres pestañas,las cuales son:
						Acerca de, Manual de Usuario y Contacto-->
							<ul>
							<!--Submódulo de la sexta pestaña del menú principal del sistema-->
								<li>
									<a href="acerca_de.php"><span class="icon-info2"> Acerca de</a>
									<!--Primera pestaña del submódulo "Ayuda"-->
								</li>
								<!--<li>
									<a href="manual.php"><span class="icon-book2"> Manual de Usuario</a>-->
									<!--Segunda pestaña del submódulo "Ayuda"-->
								<!--</li>-->
								<li>
									<a href="contacto.php"><span class="icon-envelop"> Contacto</a>
									<!--Tercera pestaña del submódulo "Ayuda"-->
								</li>
							</ul>
					</li>

					<?php 
						if($_SESSION['tipo']=="Administrador")
						{?>
							<li>
								<a href="reportes.php"><span class="icon-file-pdf"> Reportes</a>
								<!--Quinta pestaña del menú principal, al presionarla el sistema se direccionará  a  un  archivo  que  contendá una tabla con todas las
								opciones de reportes-->
								
							</li>
						<?php }?>
					
	
					<li>
						<a href="../../controlador/php/cerrar.php"><span class="icon-switch"></span>Salir</a>
						<!--Séptima pestaña del menú principal, al presionarla el sistema se direccionará a la Página de Iniciar Sesión del mismo sin importar el módulo en el que se encuentre-->
					</li>
				</ul>

				</center><!--Cierre del center, permitirá que se centren los elementos que están arriba del mismo-->

	</body><!--Cierre del Cuerpo del Documento-->
</html><!--Cierre del Documento HTML-->