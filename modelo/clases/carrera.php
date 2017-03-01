<?php
	class carrera
	{

		public function __construct($nombre_carrera,$tipo_carrera,$codigo_carrera,$creditos_carrera)
		{
			$nombre_carrera=strtolower($nombre_carrera);
			$nombre_carrera=ucwords($nombre_carrera);

			$this->nombre_carrera=$nombre_carrera;
			$this->tipo_carrera=$tipo_carrera;
			$this->codigo_carrera=$codigo_carrera;
			$this->creditos_carrera=$creditos_carrera;

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
			
			$this->sql="SELECT * FROM carrera WHERE codigo_carrera='$this->codigo_carrera';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Carrera no encontrada / Dato Incorrecto')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/carrera.php'>";
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
							Tipo
						</th>
						<th style='width:100px;'>
							Código
						</th>
						<th style='width:100px;'>
							Créditos
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
							<td>".$this->datos['nombre_carrera']."</td>
							<td>".$this->datos['tipo_carrera']."</td>
							<td>".$this->datos['codigo_carrera']."</td>
							<td>".$this->datos['creditos_carrera']."</td>
							<td>
								<a href='../../vista/html/carrera_visualizar.php?codigo=".$this->datos['codigo_carrera']."'><span class='icon-eye' title='Visualizar datos'></span></a>
								<a href='../../vista/html/carrera_modificar.php?codigo=".$this->datos['codigo_carrera']."'><span class='icon-pencil' title='Modificar datos'></span></a>";
								
								if($_SESSION['tipo']=="Administrador")
								{
									if($this->datos['status_carrera']=="Activo")
										echo"<a href='../../vista/html/carrera_bloquear.php?codigo=".$this->datos['codigo_carrera']."'><span class='icon-lock' title='Desactivar Carrera'></span></a>";
									else
										echo"<a href='../../vista/html/carrera_desbloquear.php?codigo=".$this->datos['codigo_carrera']."'><span class='icon-unlocked' title='Activar Carrera'></span></a>";
								}
							echo"
							</td>
						</tr>";
						$this->n++;
					}
				echo "</table>";
			}
		}

		public function cambiar($status_carrera)
		{
			$this->sql="UPDATE carrera SET status_carrera='$status_carrera' WHERE codigo_carrera='$this->codigo_carrera' ";
			$this->ejecutar=pg_query($this->sql);
			if($this->ejecutar)
			{
				echo"<script>alert('Estatus cambiado exitosamente')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/carrera.php'>";
			}
			else
			{
				echo"<script>alert('Error al cambiar el Estatus')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/carrera.php'>";
			}
		}

		public function modificar($codigo_oculto)
		{
			$this->sql="SELECT * FROM carrera WHERE codigo_carrera='$this->codigo_carrera' AND codigo_carrera<>'$codigo_oculto'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/carrera.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Carrera ya registrada. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/carrera_modificar.php?codigo=$codigo_oculto'>";
				}
				else
				{
					$this->sql="SELECT * FROM carrera WHERE nombre_carrera='$this->nombre_carrera' AND codigo_carrera<>'$codigo_oculto'";
					$this->ejecutar=pg_query($this->sql);
					if(!$this->ejecutar)
					{
						echo"<script>alert('Error en la Consulta')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/carrera.php'>";
					}
					else
					{
						$this->cantidad=pg_fetch_array($this->ejecutar);
						if($this->cantidad>0)
						{
							echo"<script>alert('Carrera ya registrada. Elegir otra.')</script>
							<meta http-equiv='refresh' content='0;../../vista/html/carrera_modificar.php?codigo=$codigo_oculto'>";
						}
						else
						{
							$this->sql="UPDATE carrera SET nombre_carrera='$this->nombre_carrera',tipo_carrera='$this->tipo_carrera',codigo_carrera='$this->codigo_carrera',creditos_carrera='$this->creditos_carrera' WHERE codigo_carrera='$codigo_oculto';";
							$this->ejecutar=pg_query($this->sql);
							if($this->ejecutar)
							{
								echo"<script>alert('Carrera Modificada exitosamente')</script> 
								<meta http-equiv='refresh' content='0;../../vista/html/carrera.php'>";
							}
							else
							{
								echo"<script>alert('Error al Modificar')</script>
								<meta http-equiv='refresh' content='0;../../vista/html/carrera_modificar.php?codigo=$codigo_oculto'>";
							}
						}
					}
				}
			}
		}

		public function modificar_form()
		{

			$this->sql="SELECT * FROM carrera WHERE codigo_carrera='$this->codigo_carrera';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Carrera no Registrada')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/carrera.php'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<div class="form_reg_usu" style="margin-top:20px;height:345px; width:670px;">
				<form action="../../controlador/php/carrera_modificar.php" method="POST">
					<table class="table2" border="0">
						
						<tr>
							<label><p class="titulo2" style="width:670px;">Modificar Carrera<a href="carrera.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>

						<tr>
							<br>
							<td class="td_titulo">
								<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span> Nombre:</p></label>
							</td>
							<td class="td_caja">
								<input id="nombre" autofocus value="'.$this->datos['nombre_carrera'].'" type="text" name="nombre_carrera" class="input1 placeholder2" placeholder="Ej. Mercadeo" maxlength="25" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label><p class="p_left"><span class="icon-colours"></span> Tipo:</p></label>
							</td>
							<td class="td_caja"> 
								<select class="input2" name="tipo_carrera">
									<option value="Técnica" '; if($this->datos['tipo_carrera']=="Técnica"){echo"selected='selected'";} echo'>
										<label>Técnica</label>

									</option>
									<option value="PNF" '; if($this->datos['tipo_carrera']=="PNF"){echo"selected='selected'";} echo'>
										<label>PNF</label>
									</option>
								</select>
							</td>
							<td class="td_corto">
								<label><p class="p_red"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="codigo"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Código:</p></label>
							</td>
							<td class="td_caja">
								<input id="codigo" value="'.$this->datos['codigo_carrera'].'" type="text" name="codigo_carrera" class="input1 placeholder2" placeholder="Ej. 1234" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo">
								<label for="creditos"><p class="p_left"><span class="icon-done_all"></span> Créditos:</p></label>
							</td>
							<td class="td_caja">
								<input id="creditos" value="'.$this->datos['creditos_carrera'].'" type="number" name="creditos_carrera" class="input1 placeholder2" placeholder="Ej. 90" maxlength="4" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red"></p></label>
							</td>
						</tr>
						<tr>
							<td class="td_titulo">
								<label><p class="p_left"><span class="icon-layers"></span> Estatus:</p></label>
							</td>
							<td class="td_caja">
								<input type="text" name="status" value="'.$this->datos['status_carrera'].'" disabled class="input1 placeholder2"  maxlength="16" required autocomplete="off"><br>
							</td>
						</tr>
						</table>
							<input type="hidden" name="codigo_oculto" value="'.$this->datos['codigo_carrera'].'">
							<input class="a2" type="submit" value="Modificar" style="margin-top:195px;">
							<input class="a3" type="reset" value="Resetear" style="margin-top:195px;">	
				</form>
			</div>';
			}
		}
		
		public function mostrar($mos)
		{
			$lim=12;
			$off=0;
			$total_pagina=(ceil($mos/$lim));
			$c=0;
			date_default_timezone_set('America/Caracas');
			$fecha=date("d/m/Y");
			if($mos==1)
				$this->sql="SELECT * FROM carrera WHERE status_carrera='Activo' ORDER BY nombre_carrera ASC;";
			else
				$this->sql="SELECT * FROM carrera WHERE status_carrera<>'Activo' ORDER BY nombre_carrera ASC;";
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
							Tipo
						</th>
						<th style='width:100px;'>
							Código
						</th>
						<th style='width:100px;'>
							Créditos
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
						<th style='width:100px;'>
							Tipo
						</th>
						<th style='width:100px;'>
							Código
						</th>
						<th style='width:100px;'>
							Créditos
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
								".$this->datos['nombre_carrera']."
							</td>
							<td>
								".$this->datos['tipo_carrera']."
							</td>
							<td>
								".$this->datos['codigo_carrera']."
							</td>
							<td>
								".$this->datos['creditos_carrera']."
							</td>
							<td>
								<a href='../../vista/html/carrera_visualizar.php?codigo=".$this->datos['codigo_carrera']."'><span class='icon-eye' title='Visualizar datos'></span></a>
								<a href='../../vista/html/carrera_modificar.php?codigo=".$this->datos['codigo_carrera']."'><span class='icon-pencil' title='Modificar datos'></span></a>";
								
								if($_SESSION['tipo']=="Administrador")
								{
									if($this->datos['status_carrera']=="Activo")
									echo"<a href='../../vista/html/carrera_bloquear.php?codigo=".$this->datos['codigo_carrera']."'><span class='icon-lock' title='Desactivar Carrera'></span></a>";
								else
									echo"<a href='../../vista/html/carrera_desbloquear.php?codigo=".$this->datos['codigo_carrera']."'><span class='icon-unlocked' title='Activar Carrera'></span></a>";
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
			$this->sql="SELECT * FROM carrera WHERE codigo_carrera='$this->codigo_carrera'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/carrera_registrar.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Carrera ya registrada. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/carrera_registrar.php'>";
				}
				else
				{
					$this->sql="INSERT INTO carrera (id_carrera,nombre_carrera,tipo_carrera,status_carrera,codigo_carrera,creditos_carrera) VALUES (default,'$this->nombre_carrera','$this->tipo_carrera','Activo','$this->codigo_carrera','$this->creditos_carrera');";
					$this->ejecutar=pg_query($this->sql);
					if($this->ejecutar)
					{
						echo"<script>alert('Carrera registrada exitosamente')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/carrera.php'>";
					}
					else
					{
						echo"<script>alert('Error al registrar')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/carrera_registrar.php'>";
					}
				}
			}
		}

		public function visualizar()
		{

			$this->sql="SELECT * FROM carrera WHERE codigo_carrera='$this->codigo_carrera';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Carrera no Registrada')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/carrera.php'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<form action="../../controlador/php/carrera_visualizar.php" method="POST">
					<table align="center" border="1" class="table_mostrar2" style="width:500px;border-radius: 20px 20px 20px 20px;">
						<th class="table_titulo" colspan="2">
							<p class="titulo2">Datos de Carrera<a href="carrera.php"><span class="icon-cancel-circle"></span></a></p>
						</th>
						<tr>
							<td style="width:200px;">
								<p class="p_left"><span class="icon-spell-check"></span> Nombre:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['nombre_carrera'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-colours"></span> Tipo:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['tipo_carrera'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-sort-numerically-outline"></span>  Código:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['codigo_carrera'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-done_all"></span>  Créditos:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['creditos_carrera'].'</p>
							</td>
						</tr>
						<tr>
							<td style="border-radius: 0px 0px 0px 20px;">
								<p class="p_left"><span class="icon-layers"></span> Estatus:</p>
							</td>
							<td style="border-radius: 0px 0px 20px 0px;">
								<p class="p_left" style="margin-left:20px;">'.$this->datos['status_carrera'].'</p>
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