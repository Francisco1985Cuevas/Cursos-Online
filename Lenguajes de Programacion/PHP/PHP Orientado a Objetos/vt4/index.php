<?php
	/*
		- Métodos __construct & __destruct
		-----------------------------------
		
		- ¿Que son este par de métodos?
		* El método constructor y el método destructor son un par de métodos mágicos pertenecientes 
		  a PHP, este par de métodos son muy usados en cuanto al desarrollo con la programacion 
		  orientada a objetos.
		  
		- El metodo constructor: Al instanciar la clase, el metodo constructor se ejecuta al comienzo 
		  de manera automatica.
		-- ¿Que quiere decir esto?
		** Cuando nosotros creemos una clase, y definamos un objeto con esa clase, ese metodo 
		   constructor se va a ejecutar como de manera "obligatoria"
		
		- El metodo constructor tiene una serie de normas, una de ellas es que el metodo debe ser 
		  publico, y la otra es que el metodo constructor no puede retornar nada.
		
		
		- El metodo destructor: Este metodo tambien se ejecuta de manera automatica, pero al final 
		  de la clase, tambien tiene las mismas condiciones tiene que ser un metodo publico y 
		  no debe retornar nada.
	*/
	
	
	// Clase Loteria
	class Loteria
	{
		// Atributos
		public $numero;	//numero que va a ingresar el usuario.
		public $intentos;
		public $resultado = false;
		
		
		// Metodos
		public function __construct($numero, $intentos)
		{	//método mágico constructor
			
			// El metodo constructor se inicia ni bien se instancia la clase, entonces se pide 
			// como parametros($numero, $intentos) y se modifican los atributos de esta clase 
			// asignando valores.
			$this->numero = $numero;	// el atributo $this->numero = [lo que se recibe por parametro en esta funcion]
			$this->intentos = $intentos;
		}
		
		
		public function sortear()
		{
			$minimo = $this->numero / 2;
			$maximo = $this->numero * 2;
			
			for($i = 0; $i < $this->intentos; $i++)
			{
				$int = rand($minimo, $maximo);
				//llamar al método intentos.
				self::intentos($int);
			}
		}
		
		public function intentos($int)
		{
			if($int == $this->numero){	//si el intento == al numero que coloque...
				echo "<b>".$int."==".$this->numero."</b><br><br>";
				$this->resultado = true;	//ya se cumplio el resultado
			}else{
				echo $int." != ".$this->numero."<br>";
			}
		}
		
		public function __destruct()
		{
			// El destructor es el ultimo metodo en ejecutarse.
			if($this->resultado){	//si $this->resultado es verdadero, quiere decir que si hubo ganador
				echo "Felicidades, has ganado en ".$this->intentos." intentos.";
			}else{
				echo "Que lastima, has perdido en ".$this->intentos." intentos.";
			}
		}
		
	}
	
	
	
	// Inicializar el objeto
	//$loteria = new Loteria(10, 10);	// El metodo constructor esta pidiendo dos(2) parametros, entonces 
										// cuando instanciamos la clase hacia el objeto.. hay que enviarle
										// los parametros que exige el constructor.
	$loteria = new Loteria(10, 5);
	$loteria->sortear();	//aplica el metodo sortear()
	
?>