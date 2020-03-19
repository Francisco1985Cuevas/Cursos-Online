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
	
	//Ejemplo de SobreEscritura.
	class B extends A{
		var $atributo = "OTRO VALOR DIFERENTE";
		
		function operacion(){
			echo "Cualquier Otra Cosa!<br />";
			echo "El valor de \$atributo es $this->atributo<br />";
		}
	}
	
	//Crear una Instancia.
	$b = new B();
	$b->operacion();
	
?>