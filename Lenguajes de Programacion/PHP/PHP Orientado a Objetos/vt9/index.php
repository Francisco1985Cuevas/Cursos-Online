<?php
	/*
		- Clases y Métodos abstractos
		-----------------------------
		
		- Las clases abtractas sirven de "molde" para otras clases.
		
		- Los metodos de tipo abstracto deben ser definidas por la clase que lo este heredando.
		
		- En los metodos abstractos nosotros podemos pasar parametros el cual no pueden ser obligatorios.
		
		- Lo que hace la clase abstracta es "obligar" a las clases que las heredan a que usen los metodos que han sido definidos como abstractos.
		
	*/
	
	abstract class Molde{
		
		abstract public function IngresarNombre($nombre);	//Los metodos de tipo abstracto no pueden ser instanciados por ningun objeto.
		abstract public function ObtenerNombre();
		
		// public static function mensaje($mensaje)
		// {
			// print $mensaje;
		// }
		
	}
	
	
	class Persona extends Molde
	{
		private $mensaje = "Hola gente de codigofacilito<br>";
		private $nombre;
		
		public function mostrar()
		{
			print $this->mensaje;
		}
		
		
		//Se debe implementar obligatoriamente en esta clase el metodo ingresarNombre(), ya que se definio como abstracto.
		public function ingresarNombre($nombre, $username = "cf")	//Dentro de la clase "Se pueden" añadirle atributos opcionales.
		{
			$this->nombre = $nombre.$username;
		}
		
		//implementar el otro metodo "obligatoriamente" definido como abstracto.
		public function ObtenerNombre()
		{
			print $this->nombre;
		}
		
	}
	
	
	//Molde::mensaje("Hola mundo");	//Esto es valido ya que NO estamos instanciando nada, simplemente llamamos a un metodo estatico, y un metodo estatico se puede llamar sin haber
									// instanciado la clase
	// Las clases abstractas pueden tener otros tipos de atributos/metodos  los cuales no van a ser obligatorios
	
	$obj = new Persona();
	//$obj->mostrar();
	//$obj->ingresarNombre("Carlos");
	$obj->ingresarNombre("Carlos", "Fernandez");
	$obj->ObtenerNombre();
	
?>