<?php
	/*
		- Herencia
		-----------
		
		- PHP no permite herencia multiple.
		
		- Ejemplo: Podemos tener una clase "Padre" por ejemplo la clase "Persona", la cual puede
		  dar y "heredar" todas sus "propiedades/atributos" y "metodos" a nuevas "subclases" 
		  * Se podria crear una clase "Trabajador" que es una subclase de la clase "Persona"
		  y la clase Trabajador hereda todas las propiedades y métodos de la clase persona
		  y tambien se le pueden agregar/anhadir nuevas propiedades y metodos especificos para
		  esta clase.
		
		- Un trabajador y un estudiante son Personas pero a la vez cada uno tiene propiedades y 
		  métodos diferentes por ejemplo el trabajador puede tener propiedades/atributos basicos
		  de la clase persona como ser su nombre, direccion, CI, etc. y la subclase trabajador puede
		  tener métodos propios como ser cobrar_sueldo().
		  En cambio un estudiante tambien es una persona con todos los atributos y metodos en comun
		  de la clase persona, pero la subclase "Estudiante" puede tener metodos y atributos propios
		  como ser numero_matricula, ver_notas(), etc.
		
		- A TENER EN CUENTA: LOS METODOS DE TIPO "PRIVATE" NADA MAS PUEDE SER USADOS POR LA MISMA CLASE.
	*/
	
	
	
	
	// Clase Vehiculo
	class Vehiculo
	{
		// Atributos
		public $motor = false;
		public $marca;
		public $color;
		
		
		// Métodos
		/*public function __construct($nombre, $edad, $pass)
		{	//método mágico
		}*/
		
		public function estado(){
			//Verifica si el motor esta encendido/apagado
			if($this->motor)	//Si el atributo motor existe, es true
			{
				echo "El motor esta encendido<br>";
			}else{
				echo "El motor esta apagado<br>";
			}
		}
		
		// protected function estado(){
			// //Verifica si el motor esta encendido/apagado
			// if($this->motor)	//Si el atributo motor existe, es true
			// {
				// echo "El motor esta encendido<br>";
			// }else{
				// echo "El motor esta apagado<br>";
			// }
		// }
		
		
		public function encender()
		{
			if($this->motor)	//Si el atributo motor existe, es true
			{
				echo "Cuidado, el motor ya esta prendido<br>";
			}else{
				echo "El motor ahora esta encendido<br>";
				$this->motor = true;
			}
		}
		
		/*public function __destruct()
		{
		}*/
		
	}
	
	
	class Moto extends Vehiculo{
		// Esta clase hereda los atributos y metodos de la clase Padre Vehiculo
		public function estadoMoto()
		{
			$this->estado();
		}
	}
	
	
	class CuatriMoto extends Moto
	{
		// Esta clase hereda los atributos y metodos de la clase Padre Vehiculo y tambien los
		// atributos y metodos de la clase Moto.
		
	}
	
	// Crear el objeto vehiculo
	//$vehiculo = new Vehiculo();
	//$vehiculo->estado();
	//$vehiculo->encender();
	//$vehiculo->estado();
	
	
	// Crear el objeto $moto el cual heredará todas las propiedades/atributos y métodos de la clase vehiculo
	//$moto = new Moto();
	// $moto->estado();	//Esto se probo siendo estado() un metodo "Publico"
	//$moto->estadoMoto();

	
	// Crear el objeto $moto
	$moto = new CuatriMoto();
	$moto->estado();
?>