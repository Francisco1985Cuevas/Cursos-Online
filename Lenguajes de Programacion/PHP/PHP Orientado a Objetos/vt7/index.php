<?php
	/*
		- Métodos y atributos estáticos
		--------------------------------
		
		- Se puede acceder a un método estatico sin haber creado una instancia u objeto de esa
		  clase, pero no se puede acceder a los atributos de esa clase donde se encuentra
		  dicho metodo estatico.
		
		- Un método estatico puede ser usado por un objeto, pero a la vez tambien puede ser 
		usado sin haber creado un objeto. En cambio las propiedades/atributos pueden ser usados
		sin ese objeto pero no pueden ser accedidos por el metodo ni por el mismo objeto.
	*/
	
	
	
	
	// Clase Pagina
	class Pagina
	{
		// Atributos
		public $nombre = "Codigo facilito";
		public static $url = "www.codigofacilito.com";
		
		
		// Métodos
		public function bienvenida()
		{
			//No podemos llamar a atributos o metodos con la palabra reservada "this"
			//pero podemos llamar a traves de self o nombrando directamente a la clase.
			//echo "Bienvenidos a <b>".$this->nombre."</b> la pagina es <b>".$this->url."</b><br>";
			
			//echo "Bienvenidos a <b>".$this->nombre."</b> la pagina es <b>".self::$url."</b><br>";
			echo "Bienvenidos a <b>".$this->nombre."</b> la pagina es <b>".Pagina::$url."</b><br>";
		}
		
		public static function bienvenida2()
		{
			//¿Que puede hacer un método estatico?
			// Los metodos estaticos no pueden acceder a atributos de esta clase.
			//echo "Bienvenidos a ".$this->nombre;
			
			//echo "Bienvenidos";
			
			
			//Desde los metodos estaticos podemos llamarlos a los atributos definidos como static,
			//siempre y cuando utilizemos la palabra reservada "self".
			//echo "Bienvenidos ".self::$url;
			
			
			//Esto no se puede hacer ya que desde un metodo estatico no se puede acceder a los atributos de esta clase.
			// tampoco podemos utilizar $this->nombre, tampoco funcionaría..
			echo "Bienvenidos ".self::$nombre;
		}
		
	}
	
	
	class Web extends Pagina
	{
		//Se pueden heredar metodos estaticos
	}
	
	
	
	// Crear el objeto pagina
	//$pagina = new Pagina();
	//$pagina->bienvenida();
	
	
	//llamar a la clase Pagina sin ser instanciada, ya que los metodos estaticos se pueden llamar sin ser instanciados
	//Pagina::$bienvenida2();
	
	
	Web::bienvenida2();
?>