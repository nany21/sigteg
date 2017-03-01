<?php
	class institucion
	{

		public function __construct($nombre_institucion,$entidad_federal,$municipio,$parroquia,$cod_institucion,$tipo_institucion,$ubicacion,$rif)
		{
			$nombre_institucion=strtolower($nombre_institucion);
			$nombre_institucion=ucwords($nombre_institucion);
			$entidad_federal=strtolower($entidad_federal);
			$entidad_federal=ucwords($entidad_federal);
			$municipio=strtolower($municipio);
			$municipio=ucwords($municipio);
			$parroquia=strtolower($parroquia);
			$parroquia=ucwords($parroquia);
			$ubicacion=strtolower($ubicacion);
			$ubicacion=ucwords($ubicacion);
			$rif=strtolower($rif);
			$rif=ucwords($rif);

			$this->nombre_institucion=$nombre_institucion;
			$this->entidad_federal=$entidad_federal;
			$this->municipio=$municipio;
			$this->parroquia=$parroquia;
			$this->cod_institucion=$cod_institucion;
			$this->tipo_institucion=$tipo_institucion;
			$this->ubicacion=$ubicacion;
			$this->rif=$rif;

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

		public function buscar()
		{
			$lim=12;
			$off=0;
			$total_pagina=(ceil($mos/$lim));
			$c=0;
			date_default_timezone_set('America/Caracas');
			$fecha=date("d/m/Y");
			$this->sql="SELECT * FROM institucion WHERE cod_institucion='$this->cod_institucion';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Institucion no encontrada / Dato Incorrecto')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/comunidad.php'>";
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
						<th style='width:100px;'>
							Código
						</th>
						<th style='width:100px;'>
							Tipo
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
							<td>".$this->datos['nombre_institucion']."</td>
							<td>".$this->datos['cod_institucion']."</td>
							<td>".$this->datos['tipo_institucion']."</td>
							<td>
								<a href='../../vista/html/comunidad_visualizar.php?codigo=".$this->datos['cod_institucion']."'><span class='icon-eye' title='Visualizar datos'></span></a>
								<a href='../../vista/html/comunidad_modificar.php?codigo=".$this->datos['cod_institucion']."'><span class='icon-pencil' title='Modificar datos'></span></a>";
								if($_SESSION['tipo']=="Administrador")
								{
									if($this->datos['status_institucion']=="Activo")
									echo"<a href='../../vista/html/comunidad_bloquear.php?codigo=".$this->datos['cod_institucion']."'><span class='icon-lock' title='Desactivar Institución'></span></a>";
								else
									echo"<a href='../../vista/html/comunidad_desbloquear.php?codigo=".$this->datos['cod_institucion']."'><span class='icon-unlocked' title='Activar Institución'></span></a>";
								}
							echo"
							</td>
						</tr>";
						$this->n++;
					}
				echo "</table>";
			}
		}

		public function cambiar($status_institucion)
		{
			$this->sql="UPDATE institucion SET status_institucion='$status_institucion' WHERE cod_institucion='$this->cod_institucion' ";
			$this->ejecutar=pg_query($this->sql);
			if($this->ejecutar)
			{
				echo"<script>alert('Estatus cambiado exitosamente')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/comunidad.php'>";
			}
			else
			{
				echo"<script>alert('Error al cambiar el Estatus')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/comunidad.php'>";
			}
		}

		public function modificar($codigo_oculto)
		{
			$this->sql="SELECT * FROM institucion WHERE cod_institucion='$this->cod_institucion' AND cod_institucion<>'$codigo_oculto'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/comunidad.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Institucion ya registrada. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/comunidad_modificar.php?codigo=$codigo_oculto'>";
				}
				else
				{
					$this->sql="SELECT * FROM institucion WHERE nombre_institucion='$this->nombre_institucion' AND cod_institucion<>'$codigo_oculto'";
					$this->ejecutar=pg_query($this->sql);
					if(!$this->ejecutar)
					{
						echo"<script>alert('Error en la Consulta')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/comunidad.php'>";
					}
					else
					{
						$this->cantidad=pg_fetch_array($this->ejecutar);
						if($this->cantidad>0)
						{
							echo"<script>alert('Institucion ya registrada. Elegir otra.')</script>
							<meta http-equiv='refresh' content='0;../../vista/html/comunidad_modificar.php?codigo=$codigo_oculto'>";
						}
						else
						{
							$this->sql="UPDATE institucion SET nombre_institucion='$this->nombre_institucion',entidad_federal='$this->entidad_federal',municipio='$this->municipio',parroquia='$this->parroquia',cod_institucion='$this->cod_institucion',tipo_institucion='$this->tipo_institucion',ubicacion='$this->ubicacion',rif='$this->rif' WHERE cod_institucion='$codigo_oculto';";

							$this->ejecutar=pg_query($this->sql);
							if($this->ejecutar)
							{
								echo"<script>alert('Institucion Modificada exitosamente')</script> 
								<meta http-equiv='refresh' content='0;../../vista/html/comunidad.php'>";
							}
							else
							{
								echo"<script>alert('Error al Modificar')</script>
								<meta http-equiv='refresh' content='0;../../vista/html/comunidad_modificar.php?codigo=$codigo_oculto'>";
							}
						}
					}
				}
			}
		}

		public function modificar_form()
		{

			$this->sql="SELECT * FROM institucion WHERE cod_institucion='$this->cod_institucion';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Institucion no Registrada')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/comunidad.php'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<div class="form_reg_doc" style="margin-top:20px; height:520px; width:680px;">
				<form action="../../controlador/php/comunidad_modificar.php" method="POST">
					<table class="table2" style="width:700px;" border="0">
						
						<tr>
							<label><p class="titulo2" style="width:680px;">Modificar Institución<a href="comunidad.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>

						<tr>
							<br>
							<td class="td_titulo4">
								<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span>  Nombre:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="nombre" autofocus value="'.$this->datos['nombre_institucion'].'" type="text" name="nombre_institucion" class="input4 placeholder2" placeholder="Ej. Comercial David, C.A." maxlength="50" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="entidad"><p class="p_left"><span class="icon-flag"></span>  Entidad Federal:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="entidad" value="'.$this->datos['entidad_federal'].'" type="text" name="entidad_federal" class="input4 placeholder2" placeholder="Ej. Sucre" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="municipio"><p class="p_left"><span class="icon-map-signs"></span> Municipio:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="municipio" value="'.$this->datos['municipio'].'" type="text" name="municipio" class="input4 placeholder2" placeholder="Ej. Bermúdez" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="parroquia"><p class="p_left"><span class="icon-map"></span> Parróquia:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="parroquia" value="'.$this->datos['parroquia'].'" type="text" name="parroquia" class="input4 placeholder2" placeholder="Ej. Santa Rosa" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="codigo"><p class="p_left"><span class="icon-sort-numerically-outline"></span>  Código de Institución:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="codigo" value="'.$this->datos['cod_institucion'].'" type="text" name="cod_institucion" class="input4 placeholder2" placeholder="Ej. 1000" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						<tr  style="margin-top:7px;">
							<td class="td_titulo4">
								<label><p class="p_left"><span class="icon-colours"></span> Tipo:</p></label>
							</td>
							<td class="td_caja_4"> 
								<select class="input5" name="tipo_institucion" required>
									<option value="Comunidad" '; if($this->datos['tipo_institucion']=="Comunidad"){echo"selected='selected'";} echo'>
										<label>Comunidad</label>

									</option>
									<option value="Empresa" '; if($this->datos['tipo_institucion']=="Empresa"){echo"selected='selected'";} echo'>
										<label>Empresa</label>
									</option>
								</select>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="ubicacion"><p class="p_left"><span class="icon-map4"></span> Ubicación:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="ubicacion" value="'.$this->datos['ubicacion'].'" type="text" name="ubicacion" class="input4 placeholder2" placeholder="Ej. Calle Independencia Nº 119" maxlength="200" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label for="rif"><p class="p_left"><span class="icon-sort-numerically-outline"></span>  R.I.F:</p></label>
							</td>
							<td class="td_caja_4">
								<input id="rif" value="'.$this->datos['rif'].'" type="text" name="rif" class="input4 placeholder2" placeholder="Ej. J - 00000000 - 3" maxlength="15" required autocomplete="off"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo4">
								<label><p class="p_left"><span class="icon-layers"></span> Estatus:</p></label>
							</td>
							<td class="td_caja_4">
								<input type="text" name="status_institucion" value="'.$this->datos['status_institucion'].'" disabled class="input4 placeholder2"  maxlength="16" required autocomplete="off"><br>
							</td>
						</tr>
						
					</table>
					<input type="hidden" name="codigo_oculto" value="'.$this->datos['cod_institucion'].'">
					<input class="a2" type="submit" value="Modificar" style="margin-top:365px;">
					<input class="a3" type="reset" value="Resetear" style="margin-top:365px;">	
				</form>	
			</div>';
			}
		}
		
		public function mostrar($mos)
		{
			if($mos==1)
				$this->sql="SELECT * FROM institucion WHERE status_institucion='Activo'ORDER BY nombre_institucion ASC;";
			else
				$this->sql="SELECT * FROM institucion WHERE status_institucion<>'Activo'ORDER BY nombre_institucion ASC;";
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
						<th style='width:100px;'>
							Código
						</th>
						<th style='width:100px;'>
							Tipo
						</th>
						<th style='width:140px;'>
							Opciones
						</th>
					</tr>
					<tr class='table_fila'>
						<td colspan='5' align='center'>Registro vacío</td>
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
						<th style='width:100px;'>
							Código
						</th>
						<th style='width:100px;'>
							Tipo
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
							<td>
								".$this->datos['nombre_institucion']."
							</td>
							<td>
								".$this->datos['cod_institucion']."
							</td>
							<td>
							".$this->datos['tipo_institucion']."
							</td>
							<td>
								<a href='../../vista/html/comunidad_visualizar.php?codigo=".$this->datos['cod_institucion']."'><span class='icon-eye' title='Visualizar datos'></span></a>
								<a href='../../vista/html/comunidad_modificar.php?codigo=".$this->datos['cod_institucion']."'><span class='icon-pencil' title='Modificar datos'></span></a>";
								if($_SESSION['tipo']=="Administrador")
								{
									if($this->datos['status_institucion']=="Activo")
									echo"<a href='../../vista/html/comunidad_bloquear.php?codigo=".$this->datos['cod_institucion']."'><span class='icon-lock' title='Desactivar Institución'></span></a>";
								else
									echo"<a href='../../vista/html/comunidad_desbloquear.php?codigo=".$this->datos['cod_institucion']."'><span class='icon-unlocked' title='Activar Institución'></span></a>";
								}
							echo"
							</td>
						</tr>";
						$this->n++;
					}
				echo "</table>";
			}
		}
		
		public function registrar()
		{
			$this->sql="SELECT * FROM institucion WHERE cod_institucion='$this->cod_institucion'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/comunidad_registrar.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Institucion ya registrada. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/comunidad_registrar.php'>";
				}
				else
				{
					$this->sql="INSERT INTO institucion (id_institucion,nombre_institucion,entidad_federal,municipio,parroquia,status_institucion,cod_institucion,tipo_institucion,ubicacion,rif) VALUES (default,'$this->nombre_institucion','$this->entidad_federal','$this->municipio','$this->parroquia','Activo','$this->cod_institucion','$this->tipo_institucion','$this->ubicacion','$this->rif');";
					$this->ejecutar=pg_query($this->sql);
					if($this->ejecutar)
					{
						echo"<script>alert('Institucion registrada exitosamente')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/comunidad.php'>";
					}
					else
					{
						echo"<script>alert('Error al registrar')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/comunidad_registrar.php'>";
					}
				}
			}
		}

		public function visualizar()
		{

			$this->sql="SELECT * FROM institucion WHERE cod_institucion='$this->cod_institucion';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Institucion no Registrada')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/comunidad.php'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<form action="../../controlador/php/comunidad_visualizar.php" method="POST">
					<table align="center" border="1" class="table_mostrar2" style="width:500px;border-radius: 20px 20px 20px 20px;">
						<th class="table_titulo" colspan="2">
							<p class="titulo2">Datos de Institución<a href="comunidad.php"><span class="icon-cancel-circle"></span></a></p>
						</th>
						<tr>
							<td style="width:255px;">
								<p class="p_left"><span class="icon-spell-check"></span> Nombre:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['nombre_institucion'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><p class="p_left"><span class="icon-flag"></span>  Entidad Federal:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['entidad_federal'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-map-signs"></span> Municipio:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['municipio'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-map"></span> Parróquia:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['parroquia'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-sort-numerically-outline"></span>  Código de Institución:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['cod_institucion'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-colours"></span> Tipo:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['tipo_institucion'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-map4"></span> Ubicación:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['ubicacion'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-sort-numerically-outline"></span>  R.I.F:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['rif'].'</p>
							</td>
						</tr>
						<tr>
							<td style="border-radius: 0px 0px 0px 20px;">
								<p class="p_left"><span class="icon-layers"></span> Estatus:</p>
							</td>
							<td style="border-radius: 0px 0px 20px 0px;">
								<p class="p_left" style="margin-left:20px;">'.$this->datos['status_institucion'].'</p>
							</td>';
						echo"</tr>";			
					echo "</table>";
				echo "</form>";
			}
		}
	}
?>

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
				    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ.,-'ª\"º";
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