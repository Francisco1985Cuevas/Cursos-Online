<?php
	/*
		- Modificadores de acceso
		--------------------------
		
		- Cuando hablamos del tipo de acceso "Public"  esto quiere decir que se puede realizar
		  de todo con el atributo del metodo.
		  Se coloca para atributos o métodos que pueden ser accesibles donde sea, cuando sea y
		  por quien sea.
		  Esto le da libertad total a ese atributo o a ese método.
		
		- ¿A que se refiere el metodo privado?
		Si nosotros instanciamos a un objeto y llamamos a un metodo que es "privado" NO va a funcionar.
		porque ese metodo solo es accesible desde otro metodo de la misma clase.
		
		- Se puede llamar a un metodo "protected" desde otro metodo y puede ser llamado tambien desde
		  sus clases.
		  No pueden ser accedidos desde el objeto.
	*/
	
	
	
	
	// Clase Facebook
	class Facebook
	{
		// Atributos
		public $nombre;	//atributo de tipo publico
		public $edad;
		private $pass;	//Contrasenha
		//protected $pass;	//Contrasenha
		
		// Métodos
		public function __construct($nombre, $edad, $pass)
		{	//método mágico constructor
			
			// El metodo constructor se inicia ni bien se instancia la clase, entonces se pide como 
			// parametros($nombre, $edad, $pass) y se modifican los atributos de esta clase 
			// asignando valores.
			$this->nombre = $nombre;	// el atributo $this->nombre = [lo que se recibe por parametro en esta funcion]
			$this->edad = $edad;
			$this->pass = $pass;
		}
		
		public function VerInformacion()
		{
			// echo "Nombre: ".$this->nombre."<br>";
			// echo "Edad: ".$this->edad."<br>";
			// echo "Password: ".$this->pass;	// los atributos de tipo private pueden ser accedidos por
												// metodos que esten en la misma clase.
			
			echo "Nombre: ".$this->nombre."<br>";
			echo "Edad: ".$this->edad."<br>";
			//self::cambiarPass("123456");
			$this->cambiarPass("123456");	//Cuando se define un metodo privado esta es la unica forma de acceder a el.. desde un metodo dentro de la propia clase, en este caso la clase Facebook
			echo "Password: ".$this->pass;
		}
		
		private function cambiarPass($pass)
		{
			// metodo de tipo privado
			$this->pass = $pass;
		}
		
		public function __destruct()
		{
			
		}
	}
	
	
	// Crear el objeto
	$facebook = new Facebook("Carlos Fernandes","20", "1234");
	$facebook->VerInformacion();
	
	//echo $facebook->nombre;	//Se accede directamente al atributo nombre y se muestra en pantalla
	//echo $facebook->pass;	//Da error ya que se definio como "private" el atributo pass y no se puede acceder directamente a el desde un objeto.
	// Si se define como protected tampoco puede ser accedido desde el objeto.
	
	
	// Intentar llamar al metodo cambiarPass y asignarle una nueva contraseña.
	//$facebook->cambiarPass("123456");	//Error: los metodos de tipo "private" no pueden ser accedidos a traves del objeto
	//$facebook->VerInformacion();
	
	//Si nosotros queremos cambiar la contrasenha usando el metodo cambiarPass() debemos llamarlo
	//desde otro metodo que este en la misma clase.
	
?>