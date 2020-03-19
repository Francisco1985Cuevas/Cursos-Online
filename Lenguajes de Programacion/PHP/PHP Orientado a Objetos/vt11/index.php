<?php
	/*
		- Uso de Traits
		----------------
		
		- En un trait una clase no se puede llamar de la misma manera.
		- Un trait le puede dar sus atributos y metodos a la clase que la esta usando.
	*/
	
	trait Persona2
	{
		// los trait pueden contener casi todo lo que tiene una clase
		// un trait puede contener Atributos, Métodos
		// tambien puede contener metodos de tipo estatico(static), protected, private, metodos abstractos y funciona igual que una interface..
		// En los trait existe algo llamado orden de presedencia, los cuales nos indica que los metodos de la clase siempre van a estar por encima de los trait
		
		public $nombre;
		
		public function mostrarNombre()
		{
			echo $this->nombre;
		}
		
		abstract function asignarNombre($nombre)
		{
			//
		}
		
	}
	
	
	trait Trabajador
	{
		protected function mensaje()
		{
			echo " Mi nombre es: ";
		}
	}
	
	
	class Persona
	{
		use Persona2, Trabajador;	//llamar al trait, como se ve podemos utilizar multiples trait.
		
		public function asignarNombre($nombre)
		{
			$this->nombre = self::mensaje().$nombre;
		}
	}
	
	$persona = new Persona();
	$persona->asignarNombre("Carolos");
	echo $persona->nombre;
	
?>