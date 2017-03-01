<?php
	class mencion
	{

		public function __construct($nombre_mencion,$cod_mencion,$creditos_mencion,$id_carrera)
		{
			$nombre_mencion=strtolower($nombre_mencion);
			$nombre_mencion=ucwords($nombre_mencion);

			$this->nombre_mencion=$nombre_mencion;
			$this->cod_mencion=$cod_mencion;
			$this->creditos_mencion=$creditos_mencion;
			$this->id_carrera=$id_carrera;

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
			
			$this->sql="SELECT * FROM carrera,mencion WHERE cod_carrera=id_carrera AND cod_mencion='$this->cod_mencion';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Mencion no encontrada / Dato Incorrecto')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/mencion.php'>";
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
							Créditos
						</th>
						<th style='width:200px;'>
							Carrera
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
							<td>".$this->datos['nombre_mencion']."</td>
							<td>".$this->datos['cod_mencion']."</td>
							<td>".$this->datos['creditos_mencion']."</td>
							<td>".$this->datos['nombre_carrera']."</td>
							<td>
								<a href='../../vista/html/mencion_visualizar.php?codigo=".$this->datos['cod_mencion']."'><span class='icon-eye' title='Visualizar datos de Mención'></span></a>
								<a href='../../vista/html/mencion_modificar.php?codigo=".$this->datos['cod_mencion']."'><span class='icon-pencil' title='Modificar Mención'></span></a>";
								
								if($_SESSION['tipo']=="Administrador")
									{
									if($this->datos['status_mencion']=="Activo")
										echo"<a href='../../vista/html/mencion_bloquear.php?codigo=".$this->datos['cod_mencion']."'><span class='icon-lock' title='Desactivar Mención'></span></a>";
									else
										echo"<a href='../../vista/html/mencion_desbloquear.php?codigo=".$this->datos['cod_mencion']."'><span class='icon-unlocked' title='Activar Mención'></span></a>";
									}
							echo"
							</td>
						</tr>";
						$this->n++;
					}
				echo "</table>";
			}
		}

		public function cambiar($status_mencion)
		{
			$this->sql="UPDATE mencion SET status_mencion='$status_mencion' WHERE cod_mencion='$this->cod_mencion' ";
			$this->ejecutar=pg_query($this->sql);
			if($this->ejecutar)
			{
				echo"<script>alert('Estatus cambiado exitosamente')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/mencion.php'>";
			}
			else
			{
				echo"<script>alert('Error al cambiar el Estatus')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/mencion.php'>";
			}
		}

		public function modificar($codigo_oculto)
		{
			$this->sql="SELECT * FROM mencion WHERE cod_mencion='$this->cod_mencion' AND cod_mencion<>'$codigo_oculto'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/mencion.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Mencion ya registrada. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/mencion_modificar.php?codigo=$codigo_oculto'>";
				}
				else
				{
					$this->sql="SELECT * FROM mencion,carrera WHERE cod_carrera=id_carrera AND nombre_mencion='$this->nombre_mencion' AND cod_mencion<>'$codigo_oculto'";
					$this->ejecutar=pg_query($this->sql);
					if(!$this->ejecutar)
					{
						echo"<script>alert('Error en la Consulta')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/mencion.php'>";
					}
					else
					{
						$this->cantidad=pg_fetch_array($this->ejecutar);
						if($this->cantidad>0)
						{
							echo"<script>alert('Mencion ya registrada. Elegir otra.')</script>
							<meta http-equiv='refresh' content='0;../../vista/html/mencion_modificar.php?codigo=$codigo_oculto'>";
						}
						else
						{
							$this->sql="UPDATE mencion SET nombre_mencion='$this->nombre_mencion',cod_mencion='$this->cod_mencion',creditos_mencion='$this->creditos_mencion' WHERE cod_mencion='$codigo_oculto';";
							$this->ejecutar=pg_query($this->sql);
							if($this->ejecutar)
							{
								echo"<script>alert('Mencion Modificada exitosamente')</script> 
								<meta http-equiv='refresh' content='0;../../vista/html/mencion.php'>";
							}
							else
							{
								echo"<script>alert('Error al Modificar')</script>
								<meta http-equiv='refresh' content='0;../../vista/html/mencion_modificar.php?codigo=$codigo_oculto'>";
							}
						}
					}
				}
			}
		}

		public function modificar_form()
		{

			$this->sql="SELECT * FROM mencion,carrera WHERE cod_carrera=id_carrera AND cod_mencion='$this->cod_mencion';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Mencion no Registrada')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/mencion.php'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<div class="form_reg_doc" style="margin-top:20px; height:350px; width:660px;">
				<form action="../../controlador/php/mencion_modificar.php" method="POST">
					<table class="table2" style="width:700px;" border="0">
						
						<tr>
							<label><p class="titulo2" style="width:660px;">Modificar Mención<a href="mencion.php"><span class="icon-cancel-circle"></span></a></p></label>
						</tr>

						<tr>
							<br>
							<td class="td_titulo3">
								<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span> Nombre:</p></label>
							</td>
							<td class="td_caja_3">
								<input id="nombre" autofocus value="'.$this->datos['nombre_mencion'].'" type="text" name="nombre_mencion" class="input4 placeholder2" placeholder="Ej. Comercio Exterior" maxlength="30" required autocomplete="off" onkeypress="return soloLetras(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo3">
								<label for="codigo"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Código de Mención:</p></label>
							</td>
							<td class="td_caja_3">
								<input id="codigo"  value="'.$this->datos['cod_mencion'].'" type="text" name="cod_mencion" class="input4 placeholder2" placeholder="Ej. 1300" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo3">
								<label for="creditos"><p class="p_left"><span class="icon-done_all"></span> Créditos:</p></label>
							</td>
							<td class="td_caja_3">
								<input id="creditos"  value="'.$this->datos['creditos_mencion'].'" type="text" name="creditos_mencion" class="input4 placeholder2" placeholder="Ej. 120" maxlength="4" required autocomplete="off" onKeyPress="return SoloNumeros(event);"><br>
							</td>
							<td class="td_corto">
								<label><p class="p_red2"></p></label>
							</td>
						</tr>
						<tr>
							<td class="td_titulo3">
								<label><p class="p_left"><span class="icon-graduate"></span> Carrera:</p></label>
							</td>
							<td class="td_caja_3"> 
								<select class="input5" name="id_carrera" required >';
									$sql="SELECT * FROM carrera WHERE status_carrera='Activo' ";
									$ejecutar=pg_query($sql);
									while ($dato=pg_fetch_array($ejecutar))
									{
										echo'"<option value="'.$dato[0].'" ';if($this->datos['id_carrera']==$dato['id_carrera']){echo"selected='selected'";} echo'  >
												<label>'.$dato['nombre_carrera'].'</label>
											</option>';
									}
								echo'
								</select>
								</select>
							</td>
							<td class="td_corto">
								<label><p class="p_red"></p></label>
							</td>
						</tr>

						<tr>
							<td class="td_titulo3">
								<label><p class="p_left"><span class="icon-layers"></span> Estatus:</p></label>
							</td>
							<td class="td_caja_3">
								<input type="text" name="status_mencion" value="'.$this->datos['status_mencion'].'" disabled class="input4 placeholder2"  maxlength="16" required autocomplete="off"><br>
							</td>
						</tr>


					</table>
					<input type="hidden" name="codigo_oculto" value="'.$this->datos['cod_mencion'].'">
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
				$this->sql="SELECT * FROM mencion,carrera WHERE cod_carrera=id_carrera AND status_mencion='Activo' ORDER BY nombre_mencion ASC;";
			else
				$this->sql="SELECT * FROM mencion,carrera WHERE cod_carrera=id_carrera AND status_mencion<>'Activo' ORDER BY nombre_mencion ASC;";
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
							Créditos
						</th>
						<th style='width:200px;'>
							Carrera
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
							Código
						</th>
						<th style='width:100px;'>
							Créditos
						</th>
						<th style='width:200px;'>
							Carrera
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
								".$this->datos['nombre_mencion']."
							</td>
							<td>
								".$this->datos['cod_mencion']."
							</td>
							<td>
								".$this->datos['creditos_mencion']."
							</td>
							<td>
								".$this->datos['nombre_carrera']."
							</td>
							<td>
								<a href='../../vista/html/mencion_visualizar.php?codigo=".$this->datos['cod_mencion']."'><span class='icon-eye' title='Visualizar datos de Mención'></span></a>
								<a href='../../vista/html/mencion_modificar.php?codigo=".$this->datos['cod_mencion']."'><span class='icon-pencil' title='Modificar datos de Mención'></span></a>";
								if($_SESSION['tipo']=="Administrador")
								{
									if($this->datos['status_mencion']=="Activo")
										echo"<a href='../../vista/html/mencion_bloquear.php?codigo=".$this->datos['cod_mencion']."'><span class='icon-lock' title='Desactivar Mención'></span></a>";
									else
										echo"<a href='../../vista/html/mencion_desbloquear.php?codigo=".$this->datos['cod_mencion']."'><span class='icon-unlocked' title='Activar Mención'></span></a>";
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
			if ($this->nombre_mencion=="" OR $this->cod_mencion=="" OR $this->creditos_mencion=="" OR $this->id_carrera==0)
			{
				echo"<script>alert('Datos incompletos')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/mencion_registrar.php'>";	
			}

			$this->sql="SELECT * FROM mencion WHERE cod_mencion='$this->cod_mencion'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/mencion_registrar.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Mencion ya registrada. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/mencion_registrar.php'>";
				}
				else
				{
					$this->sql="INSERT INTO mencion (id_mencion,nombre_mencion,cod_mencion,creditos_mencion,status_mencion,cod_carrera) VALUES (default,'$this->nombre_mencion','$this->cod_mencion','$this->creditos_mencion','Activo','$this->id_carrera');";
					$this->ejecutar=pg_query($this->sql);
					if($this->ejecutar)
					{
						echo"<script>alert(Mención registrada exitosamente')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/mencion.php'>";
					}
					else
					{
						echo"<script>alert('Error al registrar')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/'mencion_registrar.php'>";
					}
				}
			}
		}

		public function visualizar()
		{

			$this->sql="SELECT * FROM mencion,carrera WHERE cod_carrera=id_carrera AND cod_mencion='$this->cod_mencion';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Mencion no Registrada')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/mencion.php'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<form action="../../controlador/php/mencion_visualizar.php" method="POST">
					<table align="center" border="1" class="table_mostrar2" style="width:500px;border-radius: 20px 20px 20px 20px;">
						<th class="table_titulo" colspan="2">
							<p class="titulo2">Datos de Mención<a href="mencion.php"><span class="icon-cancel-circle"></span></a></p>
						</th>
						<tr>
							<td style="width:250px;">
								<p class="p_left"><span class="icon-spell-check"></span> Nombre:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['nombre_mencion'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-sort-numerically-outline"></span> Código de Mención:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['cod_mencion'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-done_all"></span> Créditos:</p></p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['creditos_mencion'].'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p class="p_left"><span class="icon-graduate"></span> Carrera:</p>
							</td>
							<td>
								<p class="p_left" style="margin-left:20px;">'.$this->datos['nombre_carrera'].'</p>
							</td>
						</tr>
						<tr>
							<td style="border-radius: 0px 0px 0px 20px;">
								<p class="p_left"><span class="icon-layers"></span> Estatus:</p>
							</td>
							<td style="border-radius: 0px 0px 20px 0px;">
								<p class="p_left" style="margin-left:20px;">'.$this->datos['status_mencion'].'</p>
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