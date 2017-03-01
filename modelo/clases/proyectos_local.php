<?php
	class proyectos_local
	{

		public function __construct($cubiculo,$ano,$archivo,$id_asignacion)
		{

			$this->cubiculo=$cubiculo;
			$this->ano=$ano;
			$this->archivo=$archivo;
			$this->id_asignacion=$id_asignacion;

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

	public function add_data()
		{
			$this->sql="SELECT * FROM asignacion,localizacion WHERE id_asignacion=cod_trabajo AND tipo_asignacion='proyecto'";
			$this->ejecutar=pg_query($this->sql);

			if(!$this->ejecutar)
			{
				echo"<script>alert('Error en la Consulta')</script>
				<meta http-equiv='refresh' content='0;../../vista/html/proyectos_add_data.php'>";
			}
			else
			{
				$this->cantidad=pg_fetch_array($this->ejecutar);
				if($this->cantidad>0)
				{
					echo"<script>alert('Codigo ya registrado. Verifique los datos.')</script>
					<meta http-equiv='refresh' content='0;../../vista/html/proyectos_add_data.php'>";
				}
				else
				{
					$this->sql="INSERT INTO localizacion (cubiculo,ano,archivo,cod_trabajo) VALUES ('$this->cubiculo','$this->ano','$this->archivo','$this->id_asignacion');";
					$this->ejecutar=pg_query($this->sql);
					if($this->ejecutar)
					{
						echo"<script>alert('Localizacion añadida exitosamente')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/proyectos.php'>";
					}
					else
					{
						echo"<script>alert('Error al registrar')</script>
						<meta http-equiv='refresh' content='0;../../vista/html/proyectos_add_data.php'>";
					}
				}
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
	    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz,.-ÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
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