<?php
	class usuario
	{

/********************************************RECIBIR VARIABLES******************************************/
		
		public function __construct($nombre_per,$apellido_per,$cedula_per,$telefono_per,$direccion,$usuario,$password,$tipo,$correo,$cargo)
		{
			$nombre_per=strtolower($nombre_per);
			$nombre_per=ucwords($nombre_per);
			$apellido_per=strtolower($apellido_per);
			$apellido_per=ucwords($apellido_per);
			$direccion=strtolower($direccion);
			$direccion=ucwords($direccion);
			$cargo=strtolower($cargo);
			$cargo=ucwords($cargo);

			$this->nombre_per=$nombre_per;
			$this->apellido_per=$apellido_per;
			$this->cedula_per=$cedula_per;
			$this->telefono_per=$telefono_per;
			$this->direccion=$direccion;
			$this->usuario=$usuario;
			$this->password=$password;
			$this->tipo=$tipo;
			$this->correo=$correo;
			$this->cargo=$cargo;

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

/*********************************************BUSCAR USUARIO******************************************/
		
		public function buscar()
		{
			
			$this->sql="SELECT * FROM personal,usuario WHERE id_personal=cod_personal AND cedula_per='$this->cedula_per';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Usuario no encontrado / Dato Incorrecto')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/usuario.php'>";
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
								".$this->datos['nombre_per']."
							</td>
							<td>
								".$this->datos[2]."
							</td>
							<td>
								".$this->datos[3]."
							</td>
							<td>
								0".$this->datos[4]."
							</td>
							<td>
								<a href='../../vista/html/usuario_visualizar.php?cedula=".$this->datos[3]."'><span class='icon-eye' title='Visualizar Usuario'></span></a>
								<a href='../../vista/html/usuario_modificar.php?cedula=".$this->datos[3]."'><span class='icon-pencil' title='Modificar Usuario'></span></a>";
								if($this->datos['status']=="Activo")
									echo"<a href='../../vista/html/usuario_bloquear.php?cedula=".$this->datos[3]."'><span class='icon-lock' title='Desactivar Usuario'></span></a>";
								else
									echo"<a href='../../vista/html/usuario_desbloquear.php?cedula=".$this->datos[3]."'><span class='icon-unlocked' Activar Usuario></span></a>";
							echo"
							</td>
						</tr>";
						$this->n++;
					}
				echo "</table>";

				//SELECT * FROM personal,historial WHERE codigo_perso=id_personal AND cedula_per='$this->cedula_per'";
				//$this->sql="INSERT INTO historial (fecha,hora,accion,codigo_perso) SELECT '$this->fecha','$this->total','Buscar $this->cedula_per',id_personal FROM personal WHERE id_personal=codigo_perso;";
				//$this->ejecutar=pg_query($this->sql);

				//$this->sql="SELECT * FROM usuario,historial WHERE id_usuario=codigo_usuario";
				//$this->sql="INSERT INTO historial (fecha,hora,nombre_usuario,tipo_usuario,accion,codigo_usuario) VALUES ('$this->fecha','$this->total','$this->usuario','$this->tipo','Buscar $this->cedula_per',id_usuario); ";
				//$this->eje=pg_query($this->sql);
			}
		}

/**************************************BLOQUEAR O DESBLOQUEAR USUARIOS*******************************/
		
		public function cambiar($status)
		{
			$this->sql="UPDATE usuario SET status='$status' FROM personal WHERE id_personal=cod_personal AND cedula_per='$this->cedula_per' ";
			$this->ejecutar=pg_query($this->sql);
			if($this->ejecutar)
			{
				echo"<script>alert('Estatus cambiado exitosamente')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/usuario.php'>";
			}
			else
			{
				echo"<script>alert('Error al cambiar el Estatus')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/usuario.php'>";
			}
		}

/**************************************MODIFICAR USUARIO************************************************/
		
		public function modificar($cedula_oculta)
		{
			$this->sql="SELECT * FROM personal WHERE cedula_per='$this->cedula_per' AND cedula_per<>'$cedula_oculta'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/usuario.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Persona ya registrada. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/usuario_modificar.php?cedula=$cedula_oculta'>";
				}
				else
				{
					$this->sql="SELECT * FROM usuario,personal WHERE id_personal=cod_personal AND usuario='$this->usuario' AND cedula_per<>'$cedula_oculta'";
					$this->ejecutar=pg_query($this->sql);
					if(!$this->ejecutar)
					{
						echo"<script>alert('Error en la Consulta')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/usuario.php'>";
					}
					else
					{
						$this->cantidad=pg_fetch_array($this->ejecutar);
						if($this->cantidad>0)
						{
							echo"<script>alert('Usuario en uso. Elegir otro.')</script>
							<meta http-equiv='refresh' content='0;../../vista/html/usuario_modificar.php?cedula=$cedula_oculta'>";
						}
						else
						{
							$this->sql="UPDATE personal SET nombre_per='$this->nombre_per',apellido_per='$this->apellido_per',cedula_per='$this->cedula_per',telefono_per='$this->telefono_per',direccion='$this->direccion' WHERE cedula_per='$cedula_oculta';
							UPDATE usuario SET usuario='$this->usuario',password='$this->password',tipo='$this->tipo' FROM personal WHERE id_personal=cod_personal AND cedula_per='$cedula_oculta' ;  ";
							$this->ejecutar=pg_query($this->sql);
							if($this->ejecutar)
							{
								echo"<script>alert('Usuario Modificado exitosamente')</script> 
								<meta http-equiv='refresh' content='0;../../vista/html/usuario.php'>";
							}
							else
							{
								echo"<script>alert('Error al Modificar')</script>
								<meta http-equiv='refresh' content='0;../../vista/html/usuario_modificar.php?cedula=$cedula_oculta'>";
							}
						}
					}
				}
			}
		}

		public function modificar_form()
		{

			$this->sql="SELECT * FROM personal,usuario WHERE id_personal=cod_personal AND cedula_per='$this->cedula_per';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Usuario no Registrado')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/usuario.php'>";
			}
			else

/**************************************FORMULARIO PARA MODIFICAR USUARIO*********************************/
			
			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<div class="form_reg_usu" style="margin-top:20px;height:590px;">
					<form action="../../controlador/php/usuario_modificar.php" method="POST">
						<table class="table2" border="0">
							
							<tr>
								<label><p class="titulo2">Modificar Usuario<a href="usuario.php"><span class="icon-cancel-circle"></span></a></p></label>
							</tr>

							<tr>
								<br>
								<td class="td_titulo">
									<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span> Nombre:</p></label>
								</td>
								<td class="td_caja">
									<input id="nombre" value="'.$this->datos['nombre_per'].'"  type="text" name="nombre_per" class="input1 placeholder2" placeholder="Ej. María" maxlength="20" required autocomplete="off" autofocus onkeypress="return soloLetras(event);"><br>
								</td>
								<td class="td_corto">
									<label><p class="p_red"></p></label>
								</td>
							</tr>

							<tr>
								<td class="td_titulo">
									<label for="apellido"><p class="p_left"><span class="icon-spell-check"></span> Apellido:</p></label>
								</td>
								<td class="td_caja">
									<input id="apellido" type="text" value="'.$this->datos['apellido_per'].'"  name="apellido_per" class="input1 placeholder2" placeholder="Ej. Pérez" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
								</td>
								<td class="td_corto">
									<label><p class="p_red"></p></label>
								</td>
							</tr>

							<tr>
								<td class="td_titulo">
									<label for="cedula"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Cédula:</p></label>
								</td>
								<td class="td_caja">
									<input id="cedula" type="text" value="'.$this->datos['cedula_per'].'"  name="cedula_per" class="input1 placeholder2" placeholder="Ej. 5444333" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
								</td>
								<td class="td_corto">
									<label><p class="p_red"></p></label>
								</td>
							</tr>

							<tr>
								<td class="td_titulo">
									<label for="telefono"><p class="p_left"><span class="icon-phone"></span> Teléfono:</p></label>
								</td>
								<td class="td_caja">
									<input id="telefono" type="text" value="0'.$this->datos['telefono_per'].'" name="telefono_per" class="input1 placeholder2" placeholder="Ej. 04120001122" maxlength="11" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
								</td>
								<td class="td_corto">
									<label><p class="p_red"></p></label>
								</td>
							</tr>

							<tr>
								<td class="td_titulo">
									<label for="direccion"><p class="p_left"><span class="icon-map4"></span> Dirección:</p></label>
								</td>
								<td class="td_caja">
									<input id="direccion" type="text" value="'.$this->datos['direccion'].'" name="direccion" class="input1 placeholder2" placeholder="Ej. Calle Independencia Nº 119" maxlength="150" required autocomplete="off"><br>
								</td>
								<td class="td_corto">
									<label><p class="p_red"></p></label>
								</td>
							</tr>

							<tr>
								<td class="td_titulo">
									<label for="usuario"><p class="p_left"><span class="icon-user"></span> Usuario:</p></label>
								</td>
								<td class="td_caja">
									<input id="usuario" type="text" name="usuario" value="'.$this->datos['usuario'].'" class="input1 placeholder2" placeholder="Nombre de Usuario" maxlength="16" required autocomplete="off"><br>
								</td>
								<td class="td_corto">
									<label><p class="p_red"></p></label>
								</td>
							</tr>

							<tr>
								<td class="td_titulo">
									<label for="contraseña"><p class="p_left"><span class="icon-key"></span> Contraseña:</p></label>
								</td>
								<td class="td_caja">
									<input id="contraseña" type="password" name="password" value="'.$this->datos['password'].'"  class="input1 placeholder2" placeholder="Nombre de Usuario" maxlength="16" minlength="8" required autocomplete="off"><br>
								</td>
								<td class="td_corto">
									<label><p class="p_red"></p></label>
								</td>
							</tr>

							<tr>
								<td class="td_titulo">
									<label><p class="p_left"><span class="icon-users"></span> Tipo:</p></label>
								</td>
								<td class="td_caja">
									<select class="input2" name="tipo">
										<option value="Usuario" '; if($this->datos['tipo']=="Usuario"){echo"selected='selected'";} echo'>
											<label>Usuario</label>

										</option>
										<option value="Administrador" '; if($this->datos['tipo']=="Administrador"){echo"selected='selected'";} echo'>
											<label>Administrador</label>
										</option>
									</select>
								</td>
								<td class="td_corto">
									<label><p class="p_red"></p></label>
								</td>
							</tr>
							<tr>
								<td class="td_titulo">
									<label for="correo"><p class="p_left"><span class="icon-envelope"></span> Correo:</p></label>
								</td>
								<td class="td_caja">
									<input id="correo" type="email" name="correo" value="'.$this->datos['correo'].'" class="input1 placeholder2" placeholder="Ej. ejemplo@gmail.com" maxlength="50" autocomplete="off"><br>
								</td>
								<td class="td_corto">
									<label><p class="p_red"></p></label>
								</td>
							</tr>

							<tr>
								<td class="td_titulo">
									<label for="cargo"><p class="p_left"><span class="icon-user-tie"></span> Cargo:</p></label>
								</td>
								<td class="td_caja">
									<input id="cargo" type="text" name="cargo" value="'.$this->datos['cargo'].'" class="input1 placeholder2" placeholder="Ej. Coordinador de Publicidad" maxlength="50" required autocomplete="off"><br>
								</td>
								<td class="td_corto">
									<label><p class="p_red"></p></label>
								</td>
							</tr>
							<tr>
								<td class="td_titulo">
									<label for=""><p class="p_left"><span class="icon-layers"></span> Estatus:</p></label>
								</td>
								<td class="td_caja">
									<input id="estatus" type="text" name="status" value="'.$this->datos['status'].'" disabled  class="input1 placeholder2"  maxlength="16" required autocomplete="off"><br>
								</td>
								<td class="td_corto">
								<label><p class="p_red"></p></label>
							</td>
							</tr>
						</table>
						<input type="hidden" name="cedula_oculta" value="'.$this->datos['cedula_per'].'">
						<input class="a2" style="margin-top:440px;margin-left:250px;" type="submit" value="Modificar">
						<input class="a3" style="margin-top:440px;" type="reset" value="Resetear">	
					</form>				
				</div>';
			}
		}

/**************************************MOSTRAR USUARIOS ACTIVOS E INACTIVOS*****************************/
		
		public function mostrar($mos)
		{
			$lim=12;
			$off=0;
			$total_pagina=(ceil($mos/$lim));
			$c=0;
			date_default_timezone_set('America/Caracas');
			$fecha=date("d/m/Y");
			if($mos==1)
				$this->sql="SELECT * FROM personal,usuario WHERE id_personal=cod_personal AND id_personal!='1' AND status='Activo' ORDER BY nombre_per ASC LIMIT $lim OFFSET $off;";
			else
				$this->sql="SELECT * FROM personal,usuario WHERE id_personal=cod_personal AND status<>'Activo' ORDER BY nombre_per ASC LIMIT $lim OFFSET $off;";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			$off=$lim+$off;
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
						<th style='width:130px;'>
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
								".$this->datos['nombre_per']."
							</td>
							<td>
								".$this->datos[2]."
							</td>
							<td>
								".$this->datos[3]."
							</td>
							<td>
								0".$this->datos[4]."
							</td>
							<td>
								<a href='../../vista/html/usuario_visualizar.php?cedula=".$this->datos[3]."'><span class='icon-eye' title='Visualizar Usuario'></span></a>
								<a href='../../vista/html/usuario_modificar.php?cedula=".$this->datos[3]."'><span class='icon-pencil' title='Modificar Usuario'></span></a>";
								if($this->datos['status']=="Activo")
									echo"<a href='../../vista/html/usuario_bloquear.php?cedula=".$this->datos[3]."'><span class='icon-lock' title='Desactivar Usuario'></span></a>";
								else
									echo"<a href='../../vista/html/usuario_desbloquear.php?cedula=".$this->datos[3]."'><span class='icon-unlocked' title='Activar Usuario'></span></a>";
							echo"
							</td>
						</tr>";
						$this->n++;
					}
				echo "</table>";
			}
		}

/******************************************REGISTRAR USUARIO********************************************/
		
		public function registrar()
		{
			$this->sql="SELECT * FROM personal WHERE cedula_per='$this->cedula_per'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/usuario_registrar.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Persona ya registrada. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/usuario_registrar.php'>";
				}
				else
				{
					$this->sql="SELECT * FROM usuario WHERE usuario='$this->usuario'";
					$this->ejecutar=pg_query($this->sql);
					if(!$this->ejecutar)
					{
						echo"<script>alert('Error en la Consulta')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/usuario_registrar.php'>";
					}
					else
					{
						$this->cantidad=pg_fetch_array($this->ejecutar);
						if($this->cantidad>0)
						{
							echo"<script>alert('Usuario en uso. Elegir otro.')</script>
							<meta http-equiv='refresh' content='0;../../vista/html/usuario_registrar.php'>";
						}
						else
						{
							$this->sql="INSERT INTO personal VALUES (default,'$this->nombre_per','$this->apellido_per','$this->cedula_per','$this->telefono_per','$this->direccion');
							INSERT INTO usuario (cod_personal,usuario,password,status,tipo,correo,cargo) SELECT id_personal,'$this->usuario','$this->password','Activo','$this->tipo','$this->correo','$this->cargo' FROM personal WHERE cedula_per='$this->cedula_per' ;";
							$this->ejecutar=pg_query($this->sql);
							if($this->ejecutar)
							{
								echo"<script>alert('Usuario registrado exitosamente')</script>
								<meta http-equiv='refresh' content='0;../../vista/html/usuario.php'>";
							}
							else
							{
								echo"<script>alert('Error al registrar')</script>
								<meta http-equiv='refresh' content='0;../../vista/html/usuario_registrar.php'>";
							}
						}
					}
				}
			}
		}

/***************************************MOSTRAR DATOS DE USUARIOS**************************************/
		
		public function visualizar()
		{

			$this->sql="SELECT * FROM personal,usuario WHERE id_personal=cod_personal AND cedula_per='$this->cedula_per';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Usuario no Registrado')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/usuario.php'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->ejecutar);

				echo'<form action="../../controlador/php/usuario_visualizar.php" method="POST">
					<table align="center" border="1" class="table_mostrar2" style="width:500px;border-radius: 20px 20px 20px 20px;">
						<th class="table_titulo" colspan="2">
							<p class="titulo2">Datos Personales<a href="usuario.php"><span class="icon-cancel-circle"></span></a></p>
						</th>
						<tr>
							<td style="width:200px;">
								<p class="p_left"><span class="icon-spell-check"></span> Nombre:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['nombre_per'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-spell-check"></span> Apellido:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['apellido_per'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-sort-numerically-outline"></span>  Cédula:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['cedula_per'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-phone"></span> Teléfono:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">0'.$this->datos['telefono_per'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-map4"></span>Dirección:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['direccion'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-user"></span> Usuario:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['usuario'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-users"></span> Tipo:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['tipo'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-envelope"></span> Correo:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['correo'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-user-tie"></span> Cargo:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['cargo'].'</p>
							</td>
						</tr>					
						<tr>
							<td style="border-radius: 0px 0px 0px 20px;">
								<p class="p_left"><span class="icon-layers"></span> Estatus:</p>
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
