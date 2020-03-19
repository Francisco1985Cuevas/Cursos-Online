<?php 
	namespace Models;

	class Conexion{
		
		// Atributos
		private $datos = array("host"=>"localhost", "user"=>"root", "pass"=>"", "db"=>"vt13_db");
		private $conn; 	// el atributo que va a contener la conexion
		
		// Métodos
		public function __construct(){
			// Se le pone \ para indicarle que mysqli es una clase glogal de PHP
			$this->conn = new \mysqli($this->datos['host'], $this->datos['user'], $this->datos['pass'], $this->datos['db']);
		}
		
		public function consultaSimple($sql)
		{
			$this->con->query($sql);
		}
		
		public function consultaRetorno($sql)
		{
			$datos = $this->con->query($sql);
			return $datos;
		}
		
		
	}
	
?>