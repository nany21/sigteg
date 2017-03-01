<?php
	class sesion
	{
		private $usu;
		private $pass;

		public function __construct($usu,$pass)
		{
			$this->usu=$usu;
			$this->pass=$pass;

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

		public function iniciar()
		{
			$this->sql="SELECT * FROM usuario,personal WHERE id_personal=cod_personal AND password='$this->pass' AND usuario='$this->usu' ";
			$this->eje=pg_query($this->sql);
			$this->can=pg_num_rows($this->eje);
			if($this->can<1)
			{
				echo"<script>alert('Usuario/Contraseña Invalida')</script>
				<meta http-equiv='refresh' content='1;../../#'>";
			}
			else
			{
				$this->datos=pg_fetch_array($this->eje);
				$this->status=$this->datos['status'];

				if($this->status!="Activo")
				{
					echo"<script>alert('Usuario Bloqueado')</script>
					<meta http-equiv='refresh' content='1;../../#'>";
				}
				else
				{
					session_start();
					$this->nombre=$this->datos['nombre_per'];
					$this->apellido=$this->datos['apellido_per'];
					$this->tipo=$this->datos['tipo'];
					$this->id=$this->datos['id_personal'];
					$_SESSION['acti']="true";
					$_SESSION['nombre']=$this->datos['nombre_per'];
					$_SESSION['apellido']=$this->datos['apellido_per'];
					$_SESSION['tipo']=$this->datos['tipo'];
					$_SESSION['id']=$this->datos['id_personal'];

					
					
					$this->sql="SELECT * FROM historial_sesion WHERE cod_usu='$this->id' AND status_se='1'; ";
					$this->eje=pg_query($this->sql);
					$this->can=pg_num_rows($this->eje);
					if($this->can>0)
					{
						$this->sql="UPDATE historial_sesion SET fecha_salida='$this->fecha',hora_salida='$this->total',status_se='0' WHERE cod_usu='$this->id' AND status_se='1';
						
						INSERT INTO historial_sesion (fecha_entrada,hora_entrada,cod_usu,status_se) VALUES ('$this->fecha','$this->total',$this->id,'1');";
						$this->ejecutar=pg_query($this->sql);
						if(!$this->ejecutar)
						{
							echo"<script>alert('Error en la CONSULTA')</script>
							<meta http-equiv='refresh' content='1;../../#'>";
						}
						else
						{
							echo"<script>alert('Bienvenido')</script>
							<meta http-equiv='refresh' content='1;../../vista/html/pagina_principal.php'>";
						}	
						
					}
					else
					{
						$this->sql="INSERT INTO historial_sesion (fecha_entrada,hora_entrada,cod_usu,status_se) VALUES ('$this->fecha','$this->total',$this->id,'1'); ";
					
						$this->ejecutar=pg_query($this->sql);
						if(!$this->ejecutar)
						{
							echo"<script>alert('Error en la CONSULTA')</script>
							<meta http-equiv='refresh' content='1;../../#'>";
						}
						else
						{
							echo"<script>alert('Bienvenido')</script>
							<meta http-equiv='refresh' content='0.5;../../vista/html/pagina_principal.php'>";
						}
					}
				}
			}
		}
	
		public function cerrar(){
			session_start();
			$this->id=$_SESSION['id'];
			$this->sql="UPDATE historial_sesion SET fecha_salida='$this->fecha',hora_salida='$this->total',status_se='0' WHERE cod_usu='$this->id' AND status_se='1';";
			$this->ejecutar=pg_query($this->sql);
			if($this->ejecutar)	{
				session_destroy();
				echo"<script>alert('Hasta luego')</script>
				<meta http-equiv='refresh' content='1;/sigteg/'>";
			}
		}
	}
?>
