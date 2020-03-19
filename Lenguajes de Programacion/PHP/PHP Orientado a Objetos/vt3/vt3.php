<?php
	/*
		- Como maneja php la programacion orientada a objetos
		- sintaxis
		- propiedades que tienen las clases, metodos, atributos, namespaces, 
		- En la poo "Todo se define como un objeto", que quiere decir esto?
		- las propiedades se definen como atributos, y las acciones como metodos.
		- el objetivo del tutorial es aprender la metodologia de la poo y la sintaxis particular de php5  para la poo.
		- existen 3 tipos de programacion en php, programacion lineal; programacion estructurada y programacion orientada a objetos.
		
	

		- Clases y Objetos
		-  Una clase se divide en Metodos y Atributos
		- Las clases funcionan como "molde" para lo que es un objeto, esto quiere decir que la clase lo que va a otorgar a un objeto todos sus metodos y sus atributos
		  para poder ser usados.
		
		- los atributos se definen con una variable y los metodos se definen como una funcion es de esta manera la que trabaja la programacion orientada a objetos.
		  simplemente los "metodos" son funciones y los atributos son variables.
		
		
		* Desde los metodos nosotros podemos acceder a los atritutos con la palabra reservada "this" o "self"
		
		
		
		* videotutorial 3
		 Atributos y metodos.
		 
		
	*/
	
	
	
	/*
	class Persona
	{
		// Atributos
		public $nombre = "Pedro";
		
		// Metodos
		public function hablar($mensaje)
		{
			echo $mensaje;
		}
	}
	
	// las clases funcionan como un molde para un objeto, entonces vamos a crear nuestro primer objeto. Los objetos tienden a estar guardados en variables.
	$persona = new Persona();	// A la variable $persona se le asigna una clase llamada Perosna(), new: lo que hace es indicar que estamos instanciando, estamos colocando una clase
								// en este objeto el cual es una variable($persona), pero ahora sera un objeto llamada persona.
	
	//echo $persona->nombre;	//quiero conocer lo que tiene el atributo nombre, llamamos a ver lo que tiene el atributo $nombre
	
	// Si queremos obtener un valor debemos primero crear el objeto para luego llamar sus atributos y sus metodos de esa clase, recordemos que la clase funciona como un "molde".
	
	//acceder al metodo hablar()
	$persona->hablar("Saludos desde CodigoFacilito");
	*/
	
	
	
	
	
	class Persona
	{
		// Atributos
		public $nombre = array();
		public $apellido = array();
		
		// Metodos
		public function guardar($nombre, $apellido)
		{
			$this->nombre[] = $nombre;
			$this->apellido[] = $apellido;
		}
		
		public function mostrar()
		{
			for($i = 0; $i < count($this->nombre); $i++)
			{
				//self::formato($this->nombre[$i], $this->apellido[$i]);
				//Persona::formato($this->nombre[$i], $this->apellido[$i]);
				$this->formato($this->nombre[$i], $this->apellido[$i]);
				
			}
		}
		
		public function formato($nombre, $apellido)
		{
			echo "Nombre: ".$nombre." Apellido: ".$apellido." <br>";
		}
		
	}
	
	$persona = new Persona();
	$persona->guardar("Carlos", "Fernandez");
	$persona->guardar("Uriel", "Hernandez");
	$persona->mostrar();
	
	
	
	
	
	
?>