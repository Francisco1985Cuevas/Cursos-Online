<?php
	/*
		- Clases y Objetos
		-------------------
		
		-  Una clase se divide en dos partes: Atributos y Metodos 
		
		- Las clases funcionan como "molde" para lo que es un objeto, esto quiere decir que la clase 
		lo que le va es a otorgar a un objeto todos sus metodos y sus atributos para poder ser usados.
		
		- los atributos se definen con una "variable" y los metodos se definen como una "funcion" 
		es de esta manera la que trabaja la programacion orientada a objetos.
		Simplemente los "metodos" son funciones y los atributos son variables.
		
		- En este video se muestra como crear una clase.
	*/
	
	
	// Clase Persona
	class Persona{
		// Atributos
		public $nombre = "Pedro";	// Para este ejemplo se asigna un valor al atributo $nombre
		
		// Metodos
		public function hablar($mensaje)
		{
			echo $mensaje;
		}
	}
	
	// las clases funcionan como un molde para un objeto, entonces vamos a crear nuestro primer objeto. 
	// Los objetos tienden a estar guardados en "variables".
	$persona = new Persona();	// A la variable $persona se le asigna una clase llamada Persona(), 
								// new: lo que hace es indicar que estamos "instanciando", estamos 
								// "colocando" una clase en este objeto el cual es una 
								// variable($persona), pero ahora sera un objeto llamada persona.
	
	
	
	//echo $persona->nombre;	//quiero conocer lo que tiene el atributo nombre, llamamos a ver lo 
								// que tiene el "atributo" $nombre
	
	
	// Si queremos obtener un valor debemos primero crear el objeto para luego llamar sus atributos 
	// y sus metodos de esa clase, recordemos que la clase funciona como un "molde".
	
	// acceder al metodo hablar()
	$persona->hablar("Saludos desde CodigoFacilito");	// llamo a mi objeto($persona) y le indico que quiero
														// usar el metodo hablar()
	
?>