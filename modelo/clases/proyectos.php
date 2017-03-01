<?php
	class proyectos
	{

		public function __construct($titulo_asignacion,$cod_asignacion,$id_especialista,$id_especialista2,$id_categoria,$id_institucion,$cedula,$nombre,$apellido,$total)
		{
			$titulo_asignacion=strtoupper($titulo_asignacion);

			$this->titulo_asignacion=$titulo_asignacion;
			$this->cod_asignacion=$cod_asignacion;
			$this->id_especialista=$id_especialista;
			$this->id_especialista2=$id_especialista2;
			$this->id_categoria=$id_categoria;
			$this->id_institucion=$id_institucion;
			$this->cedula=$cedula;
			$this->nombre=$nombre;
			$this->apellido=$apellido;
			$this->total=$total;

			include ("conexion.php");
			$conectar=new conectar();

			date_default_timezone_set('America/Caracas');
			$this->fecha=date('Y-m-d');
			$this->ano=date('Y');
			$this->mes=date('m');
			$this->hora=@date('H', time());
			$this->minutos=@date('i', time());
			$this->tiempo='AM';
			if($this->hora>12)
			{
				$this->tiempo='PM';
				$this->hora=$this->hora-12;
			}
			$this->hora_total=$this->hora.":".$this->minutos." ".$this->tiempo;
		}

	public function buscar()
		{
			
			$this->sql="SELECT * FROM asignacion WHERE cod_asignacion='$this->cod_asignacion' AND tipo_asignacion='proyecto';";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Proyecto no encontrado / Dato Incorrecto')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/proyectos.php'>";
			}
			else
			{
				echo"<table align='center' border='1' class='table_mostrar'>
					<tr class='table_titulo'>
						<th style='width:30px;'>
							N&deg;
						</th>
						<th>
							Título
						</th>
						<th style='width:160px;'>
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
								".$this->datos['titulo_asignacion']."
							</td>
							<td>";
								
								if($this->datos['status_asignacion']=="Aprobado")
								{
									echo"
										<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
										<a href='../../vista/html/proyectos_add_data.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-redo2' title='Añadir datos'></span></a>";
								}
								else
								{
									if($this->datos['status_asignacion']=="Fase I")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_modificar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-pencil' title='Modificar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_fase2.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-looks_two' title='Cambiar a Fase II'></span></a>
											<a href='../../vista/html/proyectos_reprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-cross' title='Reprobar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_suspender.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-blocked' title='Suspender Proyecto'></span></a>";
									else
									if($this->datos['status_asignacion']=="Fase II")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_modificar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-pencil' title='Modificar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_fase3.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-looks_3' title='Cambiar a Fase III'></span></a>
											<a href='../../vista/html/proyectos_reprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-cross' title='Reprobar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_suspender.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-blocked' title='Suspender Proyecto'></span></a>";
									else
									if($this->datos['status_asignacion']=="Fase III")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_modificar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-pencil' title='Modificar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_fase4.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-looks_4' title='Cambiar a Fase IV'></span></a>
											<a href='../../vista/html/proyectos_reprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-cross' title='Reprobar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_suspender.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-blocked' title='Suspender Proyecto'></span></a>";
									else
									if($this->datos['status_asignacion']=="Fase IV")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_modificar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-pencil' title='Modificar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_aprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-checkmark2' title='Aprobar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_reprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-cross' title='Reprobar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_suspender.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-blocked' title='Suspender Proyecto'></span></a>";
									else
									if($this->datos['status_asignacion']=="Suspendido")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_modificar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-pencil' title='Modificar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_fase1.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-looks_one' title='Cambiar a Fase I'></span></a>
											<a href='../../vista/html/proyectos_reprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-cross' title='Reprobar Proyecto'></span></a>";
									else
									if($this->datos['status_asignacion']=="Reprobado")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_fase1.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-looks_one' title='Cambiar a Fase I'></span></a>";
								}
							echo"</td>
						</tr>";
						$this->n++;
					}
				echo "</table>";

				//$this->sql="SELECT * FROM usuario,historial WHERE id_usuario=codigo_usuario";
				//$this->sql="INSERT INTO historial (fecha,hora,nombre_usuario,tipo_usuario,accion,codigo_usuario) VALUES ('$this->fecha','$this->total','$this->usuario','$this->tipo','Buscar $this->cedula_per',id_usuario); ";
				//$this->eje=pg_query($this->sql);
			}
		}

		public function cambiar($status_asignacion)
		{
			$this->sql="UPDATE asignacion SET status_asignacion='$status_asignacion' WHERE cod_asignacion='$this->cod_asignacion' ";
			$this->ejecutar=pg_query($this->sql);
			if($this->ejecutar)
			{
				echo"<script>alert('Estatus cambiado exitosamente')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/proyectos.php'>";
			}
			else
			{
				echo"<script>alert('Error al cambiar el Estatus')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/proyectos.php'>";
			}
		}

		public function modificar($codigo_oculto,$ced_ocul,$au_total)
		{
			$this->sql="SELECT * FROM asignacion WHERE cod_asignacion='$this->cod_asignacion' AND cod_asignacion<>'$codigo_oculto'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/proyectos.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Proyecto ya registrado. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/proyectos_modificar.php?codigo=$codigo_oculto'>";
				}
				else
				{
					$this->sql="";
					$this->sql.="UPDATE asignacion SET titulo_asignacion='$this->titulo_asignacion',cod_asignacion='$this->cod_asignacion' WHERE cod_asignacion='$codigo_oculto';";
					$this->sql.="UPDATE especialista SET cod_facilitador='$this->id_especialista' WHERE codigo_asignacion='$this->cod_asignacion' AND tipo_especialista='Facilitador';";
					$this->sql.="UPDATE especialista SET cod_facilitador='$this->id_especialista2' WHERE codigo_asignacion='$this->cod_asignacion' AND tipo_especialista='Tutor';";
					if($au_total>($this->total-2))
					{
						for($this->i=$au_total;$this->i>$this->total-3;$this->i--)
						{
							$this->sql.="DELETE FROM muchos_autores WHERE cod_autor='(SELECT id_autor FROM autor WHERE cedula_autor='".$ced_ocul[$this->i]."')';";
						}
					}
					for($this->i=3;$this->i<=$this->total;$this->i++)
					{
						$this->sql_bus="SELECT * FROM autor WHERE cedula_autor='".$this->cedula[$this->i]."'";
						$this->ejecutar_bus=pg_query($this->sql_bus);
						$this->contar=pg_num_rows($this->ejecutar_bus);
						if($this->contar<1)
						{
							$this->nombre[$this->i]=strtolower($this->nombre[$this->i]);
							$this->nombre[$this->i]=ucwords($this->nombre[$this->i]);
							$this->apellido[$this->i]=strtolower($this->apellido[$this->i]);
							$this->apellido[$this->i]=ucwords($this->apellido[$this->i]);
							$this->sql.="INSERT INTO autor VALUES (default,'".$this->nombre[$this->i]."','".$this->apellido[$this->i]."','".$this->cedula[$this->i]."');";
							$this->sql.="UPDATE muchos_autores SET cod_autor='(SELECT id_autor FROM autor WHERE cedula_autor='".$this->cedula[$this->i]."')' WHERE cod_autor='(SELECT id_autor FROM autor WHERE cedula_autor='".$ced_ocul[$this->i-2].")' ; ";
						}
						else
						{
							$this->sql.="UPDATE autor SET nombre_autor='".$this->nombre[$this->i]."',apellido_autor='".$this->apellido[$this->i]."',cedula_autor='".$this->cedula[$this->i]."' WHERE cedula_autor='".$ced_ocul[$this->i-2]."';";
						}	
					}
					
					$this->ejecutar=pg_query($this->sql);
					//echo"<br>$this->sql<br>";
					if($this->ejecutar)
					{
						echo"<script>alert('Proyecto Modificado exitosamente')</script> 
						<meta http-equiv='refresh' content='0;../../vista/html/proyectos.php'>";
					}
					else
					{
						echo"<script>alert('Error al Modificar')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/proyectos_modificar.php?codigo=$codigo_oculto'>";
					}
				}
			}
		}

		public function modificar_form()
		{

			$this->sql="SELECT * FROM asignacion,categoria,institucion,facilitador,especialista WHERE cod_categoria=id_categoria AND codigo_institucion=id_institucion AND codigo_asignacion=id_asignacion AND cod_facilitador=id_facilitador AND tipo_asignacion='proyecto' AND cod_asignacion='$this->cod_asignacion'";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Proyecto no Registrado')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/proyectos.php'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<link rel="stylesheet" type="text/css" href="../../vista/css/estilos.css">
				<script type="text/javascript" src="../../controlador/js/jquery.js"></script>
				<script type="text/javascript" src="../../controlador/js/modi_proyecto.js"></script>

				<div class="form_reg_doc" style="margin-top:20px; height:560px; width:710px;">
				<label><p class="titulo2" style="width:710px;">Modificar Proyecto Socio - Integrador<a href="proyectos.php"><span class="icon-cancel-circle"></span></a></p></label>
				<div style=" height:94%; width:100%;overflow-y:auto;overflow-x:hidden;">
					<form action="../../controlador/php/proyectos_modificar.php" method="POST">

						<div class="tr">
							<label for="titulo"><p class="p_left"><span class="icon-spell-check"></span> Título del Proyecto:</p></label>
							<div class="td">
								<input id="titulo" value="'.$this->datos['titulo_asignacion'].'" type="text" name="titulo_asignacion" class="input4 placeholder2" placeholder="Ej. Diseño Instruccional." maxlength="1200" required autocomplete="off" onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label for="codigo"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Código de Proyecto:</p></label>
							<div class="td">
								<input id="codigo" value="'.$this->datos['cod_asignacion'].'" type="text" name="cod_asignacion" class="input4 placeholder2" placeholder="Ej. 1700" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-user-tie"></span> Facilitador:</p></label>
							<div class="td">
								<select class="input5" name="id_especialista" required >';
									$sql="SELECT * FROM facilitador WHERE status='Activo' ";
									$ejecutar=pg_query($sql);
									while ($dato=pg_fetch_array($ejecutar))
									{
										echo'"<option value="'.$dato[0].'" ';if($this->datos['id_especialista']==$dato['id_especialista']){echo"selected='selected'";} echo'  >
												<label>'.$dato['nombre_facilitador'].' '.$dato['apellido_facilitador'].' '.$dato['cedula_facilitador'].'</label>
											</option>';
									}
								echo'
								</select>
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-user-tie"></span> Tutor:</p></label>
							<div class="td">
								<select class="input5" name="id_especialista2" required >';
									$sql="SELECT * FROM facilitador WHERE status='Activo' ";
									$ejecutar=pg_query($sql);
									while ($dato=pg_fetch_array($ejecutar))
									{
										echo'"<option value="'.$dato[0].'" ';if($this->datos['id_especialista']==$dato['id_especialista']){echo"selected='selected'";} echo'  >
												<label>'.$dato['nombre_facilitador'].' '.$dato['apellido_facilitador'].' '.$dato['cedula_facilitador'].'</label>
											</option>';
									}
								echo'
								</select>
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-colours"></span> Categoría:</p></label>
							<div class="td">
								<select class="input5" name="id_categoria" required >';
									$sql="SELECT * FROM categoria WHERE status_categoria='Activo' ";
									$ejecutar=pg_query($sql);
									while ($dato=pg_fetch_array($ejecutar))
									{
										echo'"<option value="'.$dato[0].'" ';if($this->datos['id_categoria']==$dato['id_categoria']){echo"selected='selected'";} echo'  >
												<label>'.$dato['nombre_categoria'].'</label>
											</option>';
									}
								echo'
								</select>
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-library"></span> Institución:</p></label>
							<div class="td">
								<select class="input5" name="id_institucion" required >';
									$sql="SELECT * FROM institucion WHERE status_institucion='Activo' ";
									$ejecutar=pg_query($sql);
									while ($dato=pg_fetch_array($ejecutar))
									{
										echo'"<option value="'.$dato[0].'" ';if($this->datos['id_categoria']==$dato['id_categoria']){echo"selected='selected'";} echo'  >
												<label>'.$dato['nombre_institucion'].'</label>
											</option>';
									}
								echo'
								</select>
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>';

						$this->sql="SELECT * FROM muchos_autores,autor WHERE cod_autor=id_autor AND cod_asig='".$this->datos[0]."'";
						$this->ejecutar=pg_query($this->sql);
						$this->con=pg_num_rows($this->ejecutar);
						$this->contador=3;
						$this->au=0;
						while ($this->datos_par=pg_fetch_array($this->ejecutar))
						{
							$this->au++;
							echo'<input type="hidden" name="ced_ocul'.$this->au.'" value="'.$this->datos_par['cedula_autor'].'">';
							$this->c=$this->contador-2;
							echo'
							<div class="tr '; if($this->contador!=3){echo' parti'.$this->contador.' ';} echo'" style="margin-top:-5px;">
								<br><p class="p_center">Participante '.$this->c.'</p><br><br>
							</div>

							<br>
							<div class="tr '; if($this->contador!=3){echo' parti'.$this->contador.' ';} echo'">
								<label for="cedula"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Cédula de Participante:</p></label>
								<div class="td">
									<input value="'.$this->datos_par[6].'" id="cedula" type="text" name="cedula'.$this->contador.'" class="input4 placeholder2" placeholder="Ej. 16000000" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);">
								</div>
								<div class="td_2">
									<label><p style="color:red;"></p></label>
								</div><br>';
								if($this->contador==3)
								{
									echo'<div class="td_botom">
											<p style="color:red;width:50px;margin-top:8px;margin-left:-37px;" >
												<button type="button" id="input-plus" class="icon-plus"></button>
												<button type="button" id="remove-input" class="icon-minus"'; if($this->con==1){echo' style="display:none;" ';}else{echo' style="display:block;" ';} echo'></button>
											</p>	
										</div> 
									';
								}
								echo'
								</div>
							<div class="tr '; if($this->contador!=3){echo' parti'.$this->contador.' ';} echo'" style="margin-top:-5px;">
								<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span> Nombre de Participante:</p></label>
								<div class="td">
									<input value="'.$this->datos_par[4].'" id="nombre" type="text" name="nombre'.$this->contador.'" class="input4 placeholder2" placeholder="Ej. María" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);">
								</div>
								<div class="td_2">
									<label><p style="color:red;"></p></label>
								</div>
							</div>

							<div class="tr  '; if($this->contador!=3){echo' parti'.$this->contador.' ';} echo'" style="margin-top:-5px;">
								<label for="apellido"><p class="p_left"><span class="icon-spell-check"></span> Apellido de Participante:</p></label>
								<div class="td">
									<input value="'.$this->datos_par[5].'" id="apellido" type="text" name="apellido'.$this->contador.'" class="input4 placeholder2" placeholder="Ej. González" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);">
								</div>
								<div class="td_2">
									<label><p style="color:red;"></p></label>
								</div>
							</div>	

							';
						$this->contador++;
						}
						$this->contador--;
						echo '
						<div id="mas" ></div>
						<div class"tr" style="height:60px;margin-top:30px;" align="center">
							<input type="hidden" name="codigo_oculto" value="'.$this->datos['cod_asignacion'].'">
							<input type="hidden" name="total" id="total" value="'.$this->contador.'">
							<input type="hidden" name="au_total" value="'.$this->au.'">
							<input class="inp" type="submit" value="Modificar">
							<input class="inp" type="reset" value="Resetear">
						</div>	
						
					</form>
				</div>
				
			</div>';
			}
		}
	
		public function mostrar($mos)
		{
			$lim=5;
			$off=0;
			$total_pagina=(ceil($mos/$lim));
			$c=0;
			date_default_timezone_set('America/Caracas');
			$fecha=date("d/m/Y");
			if($mos==0)
				$this->sql="SELECT * FROM asignacion WHERE tipo_asignacion='proyecto' AND status_asignacion='Reprobado' ORDER BY titulo_asignacion ASC;";
			else
				if($mos==1)
				$this->sql="SELECT * FROM asignacion WHERE tipo_asignacion='proyecto' AND status_asignacion='Fase I' ORDER BY titulo_asignacion ASC;";
			else
				if($mos==2)
				$this->sql="SELECT * FROM asignacion WHERE tipo_asignacion='proyecto' AND status_asignacion='Fase II' ORDER BY titulo_asignacion ASC;";
			else
				if($mos==3)
				$this->sql="SELECT * FROM asignacion WHERE tipo_asignacion='proyecto' AND status_asignacion='Fase III' ORDER BY titulo_asignacion ASC;";
			else
				if($mos==4)
				$this->sql="SELECT * FROM asignacion WHERE tipo_asignacion='proyecto' AND status_asignacion='Fase IV' ORDER BY titulo_asignacion ASC;";
			else
				if($mos==5)
				$this->sql="SELECT * FROM asignacion WHERE tipo_asignacion='proyecto' AND status_asignacion='Aprobado' ORDER BY titulo_asignacion ASC;";
			else
				if($mos==6)
				$this->sql="SELECT * FROM asignacion WHERE tipo_asignacion='proyecto' AND status_asignacion='Suspendido' ORDER BY titulo_asignacion ASC;";
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
							Título
						</th>
						<th style='width:160px;'>
							Opciones
						</th>
					</tr>
					<tr class='table_fila'>
						<td colspan='3' align='center'>Registro vacío</td>
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
							Título
						</th>
						<th style='width:160px;'>
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
								".$this->datos['titulo_asignacion']."
							</td>
							<td>";
								
								if($this->datos['status_asignacion']=="Aprobado")
								{
									echo"
										<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
										<a href='../../vista/html/proyectos_add_data.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-redo2' title='Añadir datos'></span></a>";
								}
								else
								{
									if($this->datos['status_asignacion']=="Fase I")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_modificar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-pencil' title='Modificar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_fase2.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-looks_two' title='Cambiar a Fase II'></span></a>
											<a href='../../vista/html/proyectos_reprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-cross' title='Reprobar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_suspender.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-blocked' title='Suspender Proyecto'></span></a>";
									else
									if($this->datos['status_asignacion']=="Fase II")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_modificar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-pencil' title='Modificar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_fase3.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-looks_3' title='Cambiar a Fase III'></span></a>
											<a href='../../vista/html/proyectos_reprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-cross' title='Reprobar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_suspender.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-blocked' title='Suspender Proyecto'></span></a>";
									else
									if($this->datos['status_asignacion']=="Fase III")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_modificar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-pencil' title='Modificar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_fase4.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-looks_4' title='Cambiar a Fase IV'></span></a>
											<a href='../../vista/html/proyectos_reprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-cross' title='Reprobar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_suspender.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-blocked' title='Suspender Proyecto'></span></a>";
									else
									if($this->datos['status_asignacion']=="Fase IV")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_modificar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-pencil' title='Modificar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_aprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-checkmark2' title='Aprobar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_reprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-cross' title='Reprobar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_suspender.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-blocked' title='Suspender Proyecto'></span></a>";
									else
									if($this->datos['status_asignacion']=="Suspendido")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_modificar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-pencil' title='Modificar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_fase1.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-looks_one' title='Cambiar a Fase I'></span></a>
											<a href='../../vista/html/proyectos_reprobar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-cross' title='Reprobar Proyecto'></span></a>";
									else
									if($this->datos['status_asignacion']=="Reprobado")
										echo"<a href='../../vista/html/proyectos_visualizar.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-eye' title='Visualizar Proyecto'></span></a>
											<a href='../../vista/html/proyectos_fase1.php?codigo=".$this->datos['cod_asignacion']."'><span class='icon-looks_one' title='Cambiar a Fase I'></span></a>";
								}
							echo"</td>
						</tr>";
						$this->n++;
					}
				echo "</table>";
			}
		}
		
		public function registrar()
		{
			$this->sql="SELECT * FROM asignacion WHERE cod_asignacion='$this->cod_asignacion'";
			$this->ejecutar=pg_query($this->sql);
			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/proyectos_registrar.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Codigo en uso. Elegir otro.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/proyectos_registrar.php'>";
				}
				else
				{
					$this->sql="INSERT INTO asignacion (id_asignacion,titulo_asignacion,status_asignacion,tipo_asignacion,cod_asignacion,mes,ano,cod_categoria,codigo_institucion) VALUES (default,'$this->titulo_asignacion','Fase I','proyecto','$this->cod_asignacion','$this->mes','$this->ano',$this->id_categoria,$this->id_institucion);
					INSERT INTO especialista (codigo_asignacion,tipo_especialista,cod_facilitador) SELECT id_asignacion,'Facilitador','$this->id_especialista' FROM asignacion WHERE cod_asignacion='$this->cod_asignacion' ;
					INSERT INTO especialista (codigo_asignacion,tipo_especialista,cod_facilitador) SELECT id_asignacion,'Tutor','$this->id_especialista2' FROM asignacion WHERE cod_asignacion='$this->cod_asignacion' ;";
					
					for($this->i=3;$this->i<=$this->total;$this->i++)
					{
						$this->sql_bus="SELECT * FROM autor WHERE cedula_autor='".$this->cedula[$this->i]."'";
						$this->ejecutar_bus=pg_query($this->sql_bus);
						$this->contar=pg_num_rows($this->ejecutar_bus);
						if($this->contar<1)
						{
							$this->nombre[$this->i]=strtolower($this->nombre[$this->i]);
							$this->nombre[$this->i]=ucwords($this->nombre[$this->i]);
							$this->apellido[$this->i]=strtolower($this->apellido[$this->i]);
							$this->apellido[$this->i]=ucwords($this->apellido[$this->i]);
							$this->sql.="INSERT INTO autor VALUES (default,'".$this->nombre[$this->i]."','".$this->apellido[$this->i]."','".$this->cedula[$this->i]."');";				
						}
						$this->sql.="INSERT INTO muchos_autores (cod_autor,cod_asig) VALUES ((SELECT id_autor FROM autor WHERE cedula_autor='".$this->cedula[$this->i]."'),(SELECT id_asignacion FROM asignacion WHERE cod_asignacion='$this->cod_asignacion') ) ;";
					}
			
					$this->ejecutar=pg_query($this->sql);
					if($this->ejecutar)
					{
						echo"<script>alert('Registro Exitoso.')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/proyectos.php'>";
					}
					else
					{
						echo"<script>alert('Error al Registrar.')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/proyectos.php'>";
					}	
				}
			}
		}
			
		public function visualizar()
		{

			$this->sql="SELECT * FROM asignacion,categoria,institucion,facilitador,especialista WHERE cod_categoria=id_categoria AND codigo_institucion=id_institucion AND codigo_asignacion=id_asignacion AND cod_facilitador=id_facilitador AND cod_asignacion='$this->cod_asignacion' AND tipo_asignacion='proyecto'";
			$this->ejecutar=pg_query($this->sql);

			$this->cantidad=pg_num_rows($this->ejecutar);
			if($this->cantidad<1)
			{
				echo"<script>alert('Proyecto no Registrado')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/proyectos.php'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->ejecutar);
				echo'<link rel="stylesheet" type="text/css" href="../../vista/css/estilos.css">
				<script type="text/javascript" src="../../controlador/js/jquery.js"></script>
				<script type="text/javascript" src="../../controlador/js/modi_proyecto.js"></script>

				<div class="form_reg_doc" style="margin-top:20px; height:560px; width:690px;">
				<label><p class="titulo2" style="width:690px;">Visualizar Proyecto Socio - Integrador<a href="proyectos.php"><span class="icon-cancel-circle"></span></a></p></label>
				<div style=" height:94%; width:100%;overflow-y:auto;overflow-x:hidden;">
					<style>
						nav::-webkit-scrollbar
							{
							  width: 5px;
							  background: transparent;
							}
							nav::-webkit-scrollbar-button
							{
								height: 200px;
							}
							nav::-webkit-scrollbar-track
							{
								background: transparent;
							}
							nav::-webkit-scrollbar-thumb
							{
								background-color: rgba(0,0,0,0.5);
								-webkit-border-radius: 1px;
								border-radius: 1px;
							}
							nav::-webkit-scrollbar-thumb:hover
							{
									background-color: rgba(100,0,0,0.4);
}
					</style>
					<form>

						<div class="tr" style="height:90px;">
							<label for="titulo"><p class="p_left"><span class="icon-spell-check"></span> Título del Proyecto:</p></label>
							<div class="td">
								<textarea style="min-width:350px;max-width:350px;min-height:70px;max-height:70px;padding:10px;border-radius:30px;border:2px solid #797979;text-align:justify;font-family:"Times New Roman";" disabled>'.$this->datos['titulo_asignacion'].'</textarea>
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-3px;">
							<label for="codigo"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Código de Proyecto:</p></label>
							<div class="td">
								<input id="codigo" value="'.$this->datos['cod_asignacion'].'" disabled type="text" name="cod_asignacion" class="input4 placeholder2" placeholder="Ej. 1700" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);">
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-user-tie"></span> Facilitador:</p></label>
							<div class="td">
								<select class="input5" name="id_especialista" required disabled>';
									$sql="SELECT * FROM facilitador WHERE status='Activo' ";
									$ejecutar=pg_query($sql);
									while ($dato=pg_fetch_array($ejecutar))
									{
										echo'"<option value="'.$dato[0].'" ';if($this->datos['id_especialista']==$dato['id_especialista']){echo"selected='selected'";} echo'  >
												<label>'.$dato['nombre_facilitador'].' '.$dato['apellido_facilitador'].' '.$dato['cedula_facilitador'].' </label>
											</option>';
									}
								echo'
								</select>
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-user-tie"></span> Tutor:</p></label>
							<div class="td">
								<select class="input5" name="id_especialista2" required disabled>';
									$sql="SELECT * FROM facilitador WHERE status='Activo' ";
									$ejecutar=pg_query($sql);
									while ($dato=pg_fetch_array($ejecutar))
									{
										echo'"<option value="'.$dato[0].'" ';if($this->datos['id_especialista']==$dato['id_especialista']){echo"selected='selected'";} echo'  >
												<label>'.$dato['nombre_facilitador'].' '.$dato['apellido_facilitador'].' '.$dato['cedula_facilitador'].' </label>
											</option>';
									}
								echo'
								</select>
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-colours"></span> Categoría:</p></label>
							<div class="td">
								<select class="input5" name="id_categoria" required disabled>';
									$sql="SELECT * FROM categoria WHERE status_categoria='Activo' ";
									$ejecutar=pg_query($sql);
									while ($dato=pg_fetch_array($ejecutar))
									{
										echo'"<option value="'.$dato[0].'" ';if($this->datos['id_categoria']==$dato['id_categoria']){echo"selected='selected'";} echo'  >
												<label>'.$dato['nombre_categoria'].' </label>
											</option>';
									}
								echo'
								</select>
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>

						<div class="tr" style="margin-top:-5px;">
							<label><p class="p_left"><span class="icon-library"></span> Institución:</p></label>
							<div class="td">
								<select class="input5" name="id_institucion" required disabled>';
									$sql="SELECT * FROM institucion WHERE status_institucion='Activo' ";
									$ejecutar=pg_query($sql);
									while ($dato=pg_fetch_array($ejecutar))
									{
										echo'"<option value="'.$dato[0].'" ';if($this->datos['id_categoria']==$dato['id_categoria']){echo"selected='selected'";} echo'  >
												<label>'.$dato['nombre_institucion'].' </label>
											</option>';
									}
								echo'
								</select>
							</div>
							<div class="td_2">
								<label><p style="color:red;"></p></label>
							</div>
						</div>';

						$this->sql="SELECT * FROM muchos_autores,autor WHERE cod_autor=id_autor AND cod_asig='".$this->datos[0]."'";
						$this->ejecutar=pg_query($this->sql);
						$this->con=pg_num_rows($this->ejecutar);
						$this->contador=3;
						while ($this->datos_par=pg_fetch_array($this->ejecutar))
						{
							$this->c=$this->contador-2;
							echo'
							<div class="tr '; if($this->contador!=3){echo' parti'.$this->contador.' ';} echo'" style="margin-top:-5px;">
								<br><p class="p_center">Participante '.$this->c.'</p><br><br>
							</div>

							<br>
							<div class="tr '; if($this->contador!=3){echo' parti'.$this->contador.' ';} echo'">
								<label for="cedula"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Cédula de Participante:</p></label>
								<div class="td">
									<input disabled value="'.$this->datos_par[6].'" id="cedula" type="text" name="cedula'.$this->contador.'" class="input4 placeholder2" placeholder="Ej. 16000000" maxlength="8" required autocomplete="off" onKeyPress="return SoloNumeros(event);">
								</div>
								<div class="td_2">
									<label><p style="color:red;"></p></label>
								</div><br>';
								
								echo'
								</div>
							<div class="tr '; if($this->contador!=3){echo' parti'.$this->contador.' ';} echo'" style="margin-top:-5px;">
								<label for="nombre"><p class="p_left"><span class="icon-spell-check"></span> Nombre de Participante:</p></label>
								<div class="td">
									<input disabled value="'.$this->datos_par[4].'" id="nombre" type="text" name="nombre'.$this->contador.'" class="input4 placeholder2" placeholder="Ej. María" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);">
								</div>
								<div class="td_2">
									<label><p style="color:red;"></p></label>
								</div>
							</div>

							<div class="tr  '; if($this->contador!=3){echo' parti'.$this->contador.' ';} echo'" style="margin-top:-5px;">
								<label for="apellido"><p class="p_left"><span class="icon-spell-check"></span> Apellido de Participante:</p></label>
								<div class="td">
									<input disabled value="'.$this->datos_par[5].'" id="apellido" type="text" name="apellido'.$this->contador.'" class="input4 placeholder2" placeholder="Ej. González" maxlength="20" required autocomplete="off" onkeypress="return soloLetras(event);">
								</div>
								<div class="td_2">
									<label><p style="color:red;"></p></label>
								</div>
							</div>	

							';
						$this->contador++;
						}
						echo '
					</form>
				</div>
				
			</div>';
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
	    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ,-ªº.\"";
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