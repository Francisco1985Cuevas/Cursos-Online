<?php
	//Herencias en PHP.
	
	//Clase Padre o SuperClase.
	class A{
		
		var $atributo = "VALOR POR DEFECTO";
		
		function operacion(){
			echo "Algo<br />";
			echo "El valor de \$atributo es $this->atributo<br />";
		}
		
	}
	
	//Clase Hijo o SubClase, Hereda su contenido de la clase Padre.
	class B extends A{
		
	}
	
	//Crear una Instancia.
	$b = new B();
	$b->operacion();
	
?>