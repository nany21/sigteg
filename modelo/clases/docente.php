<?php
	class docente
	{

/********************************************RECIBIR VARIABLES******************************************/
		
		public function __construct($nombre_facilitador,$apellido_facilitador,$cedula_facilitador,$fecha_nacimiento,$sexo,$direccion,$telefono,$correo,$cargo,$dedicacion,$nombre2,$apellido2,$categoria,$postgrado)
		{
			$nombre_facilitador=strtolower($nombre_facilitador);
			$nombre_facilitador=ucwords($nombre_facilitador);
			$apellido_facilitador=strtolower($apellido_facilitador);
			$apellido_facilitador=ucwords($apellido_facilitador);
			$direccion=strtolower($direccion);
			$direccion=ucwords($direccion);
			$cargo=strtolower($cargo);
			$cargo=ucwords($cargo);
			$dedicacion=strtolower($dedicacion);
			$dedicacion=ucwords($dedicacion);
			$nombre2=strtolower($nombre2);
			$nombre2=ucwords($nombre2);
			$apellido2=strtolower($apellido2);
			$apellido2=ucwords($apellido2);
			$categoria=strtolower($categoria);
			$categoria=ucwords($categoria);
			$postgrado=strtolower($postgrado);
			$postgrado=ucwords($postgrado);

			$this->nombre_facilitador=$nombre_facilitador;
			$this->apellido_facilitador=$apellido_facilitador;
			$this->cedula_facilitador=$cedula_facilitador;
			$this->fecha_nacimiento=$fecha_nacimiento;
			$this->sexo=$sexo;
			$this->direccion=$direccion;
			$this->telefono=$telefono;
			$this->correo=$correo;
			$this->cargo=$cargo;
			$this->dedicacion=$dedicacion;
			$this->nombre2=$nombre2;
			$this->apellido2=$apellido2;
			$this->categoria=$categoria;
			$this->postgrado=$postgrado;

			include ("conexion.php");
			$conectar=new conectar();

			date_default_timezone_set('America/Caracas');
			$this->fecha=date('Y-m-d');
			$this->hora=@date('H', time());
			$this->minutos=@date('i', time());
			$this->tiempo='AM';
			if($this->hora>12)
			{
				$this->tiempo='PM';
				$this->hora=$this->hora-12;
			}
			$this->total=$this->hora.":".$this->minutos." ".$this->tiempo;
		}

/*********************************************BUSCAR DOCENTE******************************************/
		
		public function buscar()
		{
			
			$this->sql="SELECT * FROM facilitador,datos_facilitador WHERE id_facilitador=cod_facilitador AND cedula_facilitador='$this->cedula_facilitador';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Docente no encontrado / Dato Incorrecto')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/docente.php'>";
			}
			else
			{
				echo"<table align='center' border='1' class='table_mostrar'>
					<tr class='table_titulo'>
						<th style='width:30px;'>
							N&deg;
						</th>
						<th>
							Nombre
						</th>
						<th>
							Apellido
						</th>
						<th style='width:150px;'>
							Cédula
						</th>
						<th style='width:150px;'>
							Teléfono
						</th>
						<th style='width:140px;'>
							Opciones
						</th>
					</tr>";
					$this->n=1;
					while ($this->datos=pg_fetch_array($this->ejecutar))
					{
						echo "
						<tr class='table_fila'>
							<td>$this->n</td>
							<td>".$this->datos['nombre_facilitador']."</td>
							<td>".$this->datos['apellido_facilitador']."</td>
							<td>".$this->datos['cedula_facilitador']."</td>
							<td>0".$this->datos['telefono']."</td>
							<td>
								<a href='../../vista/html/docente_visualizar.php?cedula=".$this->datos[3]."'><span class='icon-eye' title='Visualizar Docente'></span></a>
								<a href='../../vista/html/docente_modificar.php?cedula=".$this->datos[3]."'><span class='icon-pencil' title='Modificar Datos del Docente'></span></a>";
								
								if($_SESSION['tipo']=="Administrador")
								{
									if($this->datos['status']=="Activo")
										echo"<a href='../../vista/html/docente_bloquear.php?cedula=".$this->datos[3]."'><span class='icon-lock' title='Desactivar Docente'></span></a>";
									else
										echo"<a href='../../vista/html/docente_desbloquear.php?cedula=".$this->datos[3]."'><span class='icon-unlocked' title='Activar Docente'></span></a>";
								}
							echo"
							</td>
						</tr>";
						$this->n++;
					}
				echo "</table>";
			}
		}

/**************************************BLOQUEAR O DESBLOQUEAR DOCENTES*******************************/

		public function cambiar($status)
		{
			$this->sql="UPDATE facilitador SET status='$status' WHERE cedula_facilitador='$this->cedula_facilitador' ";
			$this->ejecutar=pg_query($this->sql);
			if($this->ejecutar)
			{
				echo"<script>alert('Estatus cambiado exitosamente')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/docente.php'>";
			}
			else
			{
				echo"<script>alert('Error al cambiar el Estatus')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/docente.php'>";
			}
		}

/************************************MODIFICAR DOCENTE************************************************/

		public function modificar($cedula_oculta)
		{
			$this->sql="SELECT * FROM facilitador WHERE cedula_facilitador='$this->cedula_facilitador' AND cedula_facilitador<>'$cedula_oculta'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/docente.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Persona ya registrada. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/docente_modificar.php?cedula=$cedula_oculta'>";
				}
				else
				{
					$this->sql="SELECT * FROM facilitador,datos_facilitador WHERE id_facilitador=cod_facilitador AND cedula_facilitador<>'$cedula_oculta'";
					$this->ejecutar=pg_query($this->sql);
					if(!$this->ejecutar)
					{
						echo"<script>alert('Error en la Consulta')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/docente.php'>";
					}
					else
					{
						
					$this->sql="UPDATE facilitador SET nombre_facilitador='$this->nombre_facilitador',apellido_facilitador='$this->apellido_facilitador',cedula_facilitador='$this->cedula_facilitador' WHERE cedula_facilitador='$cedula_oculta';
					UPDATE datos_facilitador SET fecha_nacimiento='$this->fecha_nacimiento',sexo='$this->sexo',direccion='$this->direccion',telefono='$this->telefono',correo='$this->correo',cargo='$this->cargo',dedicacion='$this->dedicacion',nombre2='$this->nombre2',apellido2='$this->apellido2',categoria='$this->categoria', postgrado='$this->postgrado' FROM facilitador WHERE id_facilitador=cod_facilitador AND cedula_facilitador='$cedula_oculta' ;  ";

							$this->ejecutar=pg_query($this->sql);
							if($this->ejecutar)
							{
								echo"<script>alert('Docente Modificado exitosamente')</script> 
								<meta http-equiv='refresh' content='0;../../vista/html/docente.php'>";
							}
							else
							{
								echo"<script>alert('Error al Modificar')</script>
								<meta http-equiv='refresh' content='0;../../vista/html/docente_modificar.php?cedula=$cedula_oculta'>";
							}
					}
				}
			}
		}

		public function modificar_form()
		{

			$this->sql="SELECT * FROM facilitador,datos_facilitador WHERE id_facilitador=cod_facilitador AND cedula_facilitador='$this->cedula_facilitador';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Docente no Registrado')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/docente.php'>";
			}
			else
/************************************FORMULARIO PARA MODIFICAR DOCENTE*********************************/

			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<div class="form_reg_doc" style="margin-top:20px; height:560px; width:720px;">
				<label><p class="titulo2" style="width:720px;">Modificar Docente<a href="docente.php"><span class="icon-cancel-circle"></span></a></p></label>
				<div style=" height:94%; width:100%;overflow-y:auto;overflow-x:hidden;">
					<form action="../../controlador/php/docente_modificar.php" method="POST">

						<div class="tr">
							<label for="primer"><p class="p_left"><span class="icon-spell-check"></span> Primer Nombre:</p></label>
							<div class="td">
								<input id="primer"  value="'.$this->datos['nombre_facilitador'].'" type="text" name="nombre_facilitador" class="input4 placeholder2" placeholder="Ej. Rafael" maxlength="20" autofocus required autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="segundo"><p class="p_left"><span class="icon-spell-check"></span> Segundo Nombre:</p></label>
							<div class="td">
								<input id="segundo"  value="'.$this->datos['nombre2'].'" type="text" name="nombre2" class="input4 placeholder2" placeholder="Ej. José" maxlength="20" autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="primer"><p class="p_left"><span class="icon-spell-check"></span> Primer Apellido:</p></label>
							<div class="td">
								<input id="primer"  value="'.$this->datos['apellido_facilitador'].'" type="text" name="apellido_facilitador" class="input4 placeholder2" placeholder="Ej. Malavé" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="segundo"><p class="p_left"><span class="icon-spell-check"></span> Segundo Apellido:</p></label>
							<div class="td">
								<input id="segundo" value="'.$this->datos['apellido2'].'"  type="text" name="apellido2" class="input4 placeholder2" placeholder="Ej. Garcia" maxlength="20" autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="cedula"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Cédula:</p></label>
							<div class="td">
								<input id="cedula"  value="'.$this->datos['cedula_facilitador'].'" type="text" name="cedula_facilitador" class="input4 placeholder2" placeholder="Ej. 12000000" maxlength="8" autocomplete="off" onKeyPress="return SoloNumeros(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-calendar"></span>  Fecha de Nacimiento:</p></label>
							<div class="td">
								<input type="date"  value="'.$this->datos['fecha_nacimiento'].'" name="fecha_nacimiento" class="input4 p_left" style="font-size:22px; margin-top:0px;" required max="15/04/2016" min="01/01/1930">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-man-woman"></span> Sexo:</p></label>
							<div class="td">
								<select class="input5" name="sexo" required>
									<option value="0">
										<label>Seleccione</label>
									</option>
									<option value="Masculino" '; if($this->datos['sexo']=="Masculino"){echo"selected='selected'";} echo'>
										<label>Masculino</label>
									</option>
									<option value="Femenino"'; if($this->datos['sexo']=="Femenino"){echo"selected='selected'";} echo'>
										<label>Femenino</label>
									</option>
								</select>
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="direccion"><p class="p_left"><span class="icon-map2"></span> Dirección:</p></label>
							<div class="td">
								<input id="direccion" value="'.$this->datos['direccion'].'" type="text" name="direccion" class="input4 placeholder2" placeholder="Ej. Urbanización Bello Monte" maxlength="200" required autocomplete="off">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="telefono"><p class="p_left"><span class="icon-phone"></span> Teléfono:</p></label>
							<div class="td">
								<input id="telefono" value="0'.$this->datos['telefono'].'"  type="text" name="telefono" class="input4 placeholder2" placeholder="Ej. 04240001122" maxlength="11" required autocomplete="off" onKeyPress="return SoloNumeros(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="correo"><p class="p_left"><span class="icon-envelope"></span> Correo:</p></label>
							<div class="td">
								<input id="correo"  value="'.$this->datos['correo'].'" type="email" name="correo" class="input4 placeholder2" placeholder="Ej. ejemplo@gmail.com" maxlength="50" autocomplete="off">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="cargo"><p class="p_left"><span class="icon-user-tie"></span> Profesión:</p></label>
							<div class="td">
								<input id="cargo"  value="'.$this->datos['cargo'].'" type="text" name="cargo" class="input4 placeholder2" placeholder="Ej. Licenciado en Administración" maxlength="50" required autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="dedicacion"><p class="p_left"><span class="icon-price-tags"></span> Dedicación:</p></label>
							<div class="td">
								<input id="dedicacion" value="'.$this->datos['dedicacion'].'" type="text" name="dedicacion" class="input4 placeholder2" placeholder="Ej. Facilitador" maxlength="100" required autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="categoria"><p class="p_left"><span class="icon-colours"></span> Categoría:</p></label>
							<div class="td">
								<input id="categoria"  value="'.$this->datos['categoria'].'" type="text" name="categoria" class="input4 placeholder2" placeholder="Ej. Contratado" maxlength="20" autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="titulo"><p class="p_left"><span class="icon-graduate"></span> Título de Postgrado:</p></label>
							<div class="td">
								<input id="titulo" value="'.$this->datos['postgrado'].'"  type="text" name="postgrado" class="input4 placeholder2" placeholder="Ingresar Postgrado" maxlength="50" autocomplete="off" onkeypress="return soloLetras(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-layers"></span> Estatus:</p></label>
							<div class="td">
								<input type="text" name="status" value="'.$this->datos['status'].'" disabled class="input4 placeholder2"  maxlength="16" required autocomplete="off">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class"tr" style="height:60px;margin-top:30px;" align="center">
							<input type="hidden" name="cedula_oculta" value="'.$this->datos[3].'">
							<input class="inp" type="submit" value="Modificar">
							<input class="inp" type="reset" value="Resetear">
						</div>	
				</form>
			</div>';
			}
		}
/**************************************MOSTRAR DOCENTES ACTIVOS E INACTIVOS*****************************/
		public function mostrar($mos)
		{
			$lim=12;
			$off=0;
			$total_pagina=(ceil($mos/$lim));
			$c=0;
			date_default_timezone_set('America/Caracas');
			$fecha=date("d/m/Y");
			if($mos==1)
				$this->sql="SELECT * FROM facilitador,datos_facilitador WHERE id_facilitador=cod_facilitador AND status='Activo' ORDER BY nombre_facilitador ASC;";
			else
				$this->sql="SELECT * FROM facilitador,datos_facilitador WHERE id_facilitador=cod_facilitador AND status<>'Activo' ORDER BY nombre_facilitador ASC;";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<table align='center' border='1' class='table_mostrar'>
					<tr class='table_titulo'>
						<th style='width:30px;'>
							N&deg;
						</th>
						<th>
							Nombre
						</th>
						<th>
							Apellido
						</th>
						<th style='width:150px;'>
							Cédula
						</th>
						<th style='width:150px;'>
							Teléfono
						</th>
						<th style='width:140px;'>
							Opciones
						</th>
					</tr>
					<tr class='table_fila'>
						<td colspan='6' align='center'>Registro vacío</td>
					</tr>
				</table>";
			}
			else
			{
				echo"<table align='center' border='1' class='table_mostrar'>
					<tr class='table_titulo'>
						<th style='width:30px;'>
							N&deg;
						</th>
						<th>
							Nombre
						</th>
						<th>
							Apellido
						</th>
						<th style='width:150px;'>
							Cédula
						</th>
						<th style='width:150px;'>
							Teléfono
						</th>
						<th style='width:140px;'>
							Opciones
						</th>
					</tr>";

					$this->n=1;
					while ($this->datos=pg_fetch_array($this->ejecutar))
					{
						echo "
						<tr class='table_fila'>
							<td>
								$this->n
							</td>
							<td>
								".$this->datos['nombre_facilitador']."
							</td>
							<td>
								".$this->datos['apellido_facilitador']."
							</td>
							<td>
								".$this->datos['cedula_facilitador']."
							</td>
							<td>
								0".$this->datos['telefono']."
							</td>
							<td>
								<a href='../../vista/html/docente_visualizar.php?cedula=".$this->datos['cedula_facilitador']."'><span class='icon-eye' title='Visualizar Docente'></span></a>
								<a href='../../vista/html/docente_modificar.php?cedula=".$this->datos['cedula_facilitador']."'><span class='icon-pencil' title='Modificar datos del Docente'></span></a>";
								if($_SESSION['tipo']=="Administrador")
								{
									if($this->datos['status']=="Activo")
										echo"<a href='../../vista/html/docente_bloquear.php?cedula=".$this->datos['cedula_facilitador']."'><span class='icon-lock' title='Desactivar Docente'></span></a>";
									else
										echo"<a href='../../vista/html/docente_desbloquear.php?cedula=".$this->datos['cedula_facilitador']."'><span class='icon-unlocked' title='Activar Docente'></span></a>";
								}
							echo"
							</td>
						</tr>";
						$this->n++;
					}
				echo "</table>";
			}
		}
		
/******************************************REGISTRAR REGISTRAR********************************************/

		public function registrar()
		{
			$this->sql="SELECT * FROM facilitador,datos_facilitador WHERE id_facilitador=cod_facilitador AND cedula_facilitador='$this->cedula_facilitador'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/docente_registrar.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Persona ya registrada. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/docente_registrar.php'>";
				}
				else
				{
					$this->sql="INSERT INTO facilitador (id_facilitador,nombre_facilitador,apellido_facilitador,cedula_facilitador,status) VALUES (default,'$this->nombre_facilitador','$this->apellido_facilitador','$this->cedula_facilitador','Activo');
					INSERT INTO datos_facilitador (id_datos,fecha_nacimiento,sexo,direccion,telefono, correo,cargo,dedicacion,cod_facilitador,nombre2,apellido2,categoria,postgrado) SELECT id_facilitador,'$this->fecha_nacimiento','$this->sexo','$this->direccion','$this->telefono','$this->correo','$this->cargo','$this->dedicacion',id_facilitador,'$this->nombre2','$this->apellido2','$this->categoria','$this->postgrado' FROM facilitador WHERE cedula_facilitador='$this->cedula_facilitador' ;";
					$this->ejecutar=pg_query($this->sql);
					if($this->ejecutar)
					{
						echo"<script>alert('Docente registrado exitosamente')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/docente.php'>";
					}
					else
					{
						echo"<script>alert('Error al registrar')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/docente_registrar.php'>";
					}
				}
			}
		}

/***************************************MOSTRAR DATOS DE DOCENTES**************************************/

		public function visualizar()
		{

			$this->sql="SELECT * FROM facilitador,datos_facilitador WHERE id_facilitador=cod_facilitador AND cedula_facilitador='$this->cedula_facilitador';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Docente no Registrado')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/docente.php'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<form action="../../controlador/php/docente_visualizar.php" method="POST">
					<table align="center" border="1" class="table_mostrar2" style="width:500px;border-radius: 20px 20px 20px 20px;">
						<th class="table_titulo" colspan="2">
							<p class="titulo2">Datos Laborales<a href="docente.php"><span class="icon-cancel-circle"></span></a></p>
						</th>
						<tr>
							<td style="width:250px;">
								<p class="p_left"><span class="icon-spell-check"></span> Primer Nombre:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['nombre_facilitador'].'</p>
							</td>
						</tr>
						<tr>
							<td style="width:250px;">
								<p class="p_left"><span class="icon-spell-check"></span> Segundo Nombre:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['nombre2'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-spell-check"></span> Apellido:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['apellido_facilitador'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-spell-check"></span> Segundo Apellido:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['apellido2'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-sort-numerically-outline"></span>  Cédula:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['cedula_facilitador'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-calendar"></span>  Fecha de Nacimiento:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['fecha_nacimiento'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-man-woman"></span>Sexo:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['sexo'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-map2"></span>Dirección:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['direccion'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-phone"></span>Teléfono:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">0'.$this->datos['telefono'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-envelope"></span>Correo:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['correo'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-user-tie"></span>Profesión:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['cargo'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-price-tags"></span>Dedicación:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['dedicacion'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-colours"></span>Categoría:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['categoria'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-graduate"></span>Título de Postgrado:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['postgrado'].'</p>
							</td>
						</tr>
						<tr>
							<td style="border-radius: 0px 0px 0px 20px;">
								<p class="p_left"><span class="icon-layers"></span>Estatus:</p>
							</td>
							<td style="border-radius: 0px 0px 20px 0px;">
								<p class="p_left" style="margin-left:20px;">'.$this->datos['status'].'</p>
							</td>';
						echo"</tr>";			
					echo "</table>";
				echo "</form>";
			}
		}
	}
?>

<!--VALIDACIONES DESDE JAVA SCRIPT-->

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
			letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ,./ªº\"'-";
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