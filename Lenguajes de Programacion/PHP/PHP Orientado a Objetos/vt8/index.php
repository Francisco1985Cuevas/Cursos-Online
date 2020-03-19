<?php
	/*
		- Interfaces de Objetos
		------------------------
		
		- Las interfaces de objetos lo que hacen es especificar a una clase que métodos reglamentariamente
		deben tener.
		* Si estamos utilizando una interface de una Persona, y esa interface llamada Persona tiene metodos
		como hablar(), correr(), etc. La clase que hereda esa interface, osea que va a usar esa interface,
		obligatoriamente debe utilizar o debe crear dos metodos el cual ya estan definidos en la interface.
		los cuales eran para este ejemplo los metodos: hablar() y correr().
		
		
		- implements
		* Cuando usemos interface en una clase debemos usar "obligatoriamente" todos los metodos
		que estan en la interface.
		* Debemos usar todos los metodos que se declararon en esa interface
		
	*/
	
	
	// Interface
	interface Auto
	{
		//Los metodos de una interface siempre van a ser publicos, si son privados o protected
		//no van a poder usarse y dara un error fatal.
		public function encender();
		public function apagar();
	}
	
	interface Gasolina extends Auto	//interface gasolina que hereda de Automovil
	{
		public function vaciarTanque();
		public function llenarTanque($cant);
	}
	
	
	class Deportivo implements gasolina
	{
		//Atributos
		private $estado = false;
		private $tanque = 0;
		//public $km = 0;
		
		//Esta clase va a utilizar la interface gasolina, ya que gasolina ya hereda lo que tiene Auto.
		// public function ver()
		// {
			// echo "Hola";
		// }
		
		
		//Metodos
		public function estado()
		{
			if($this->estado)
			{
				print "El auto esta encendido y tiene ".$this->tanque." de litros en el tanque";
			}else
			{
				print "El auto esta apagado<br>";
			}
		}
		
		//Hemos implementado todos los metodos que estan en Gasolina, que tambien extiende de Auto
		public function encender()
		{
			if($this->estado)
			{
				print "No puedes encender el auto 2 veces<br>";
			}else
			{
				if($this->tanque <= 0)
				{
					print "Usted no puede encender el auto porque el tanque esta vacio<br>";
				}else{
					print "Auto encendido<br>";
					$this->estado = true;
				}
				
			}
		}
		
		public function apagar()
		{
			if($this->estado)
			{
				print "Auto apagado<br>";
				$this->estado = false;
			}else
			{
				print "El auto ya esta apagado<br>";
			}
		}
		
		
		public function vaciarTanque()
		{
			$this->tanque = 0;
		}
		
		public function llenarTanque($cant)
		{
			$this->tanque = $cant;
		}
		
		
		public function usar()
		{
			if($this->estado)
			{
				$reducir = $km / 3;
				$this->tanque = $this->tanque - $reducir;
				if($this->tanque <= 0)
				{
					$this->estado = false;
				}
			}else{
				print "El auto esta prendido y no se puede usar<br>";
			}
		}
	}
	
	// Crear el objeto 
	$obj = new Deportivo();
	$obj->llenarTanque(100);
	$obj->encender();
	//$obj->usar(20);
	//$obj->usar(120);
	//$obj->usar(190);
	//$obj->usar(250);
	//$obj->usar(290);
	$obj->usar(350);
	$obj->estado();
	
?>