<?php
	class conectar
	{
		private $usuario,$password,$host,$dbname;
		
		public function __construct()
		{
			$this->usuario="postgres";
			$this->password="123456";
			$this->host="localhost";
			$this->dbname="sgteg";

			$this->validar=pg_connect("user='$this->usuario' password='$this->password' host='$this->host' dbname='$this->dbname' ");

			if(!$this->validar){
				echo"<script>alert('Error al conectar a la BASE de DATOS')</script>";
			}
		}

	}
?>