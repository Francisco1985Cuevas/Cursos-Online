<?php
	namespace Controllers;
	
	class SeccionesController
	{
		
		public function index()
		{
			print "Hola soy el index de Secciones";
		}
		
		public function ver($num)
		{
			print "Eres el numero: ". $num;
		}
		
	}
?>