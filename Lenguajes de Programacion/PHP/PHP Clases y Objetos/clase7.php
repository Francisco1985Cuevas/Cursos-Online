<?php
	//Definir una clase y darle un nombre.
	class nombreClase{
	
		//Declarar los Atributos o variables de la clase.
		var $atributo1;
		var $atributo2;
		
		//Metodos o Funciónes
		function operacion1(){
		
		}
		
		//Ejemplo de un metodo con paso de 2 parametros o argumentos.
		function operacion2($param1, $param2){
			
			$this->atributo1 = $param1;
			$this->atributo2 = $param2;
			
			echo $this->atributo1 . "<br />";
			echo $this->atributo2;
		}
	}
	
	//Instanciar o crear un objeto particular de esta clase.
	$a = new nombreClase();
	
	//Ahora para referirnos a alguna operacion o propiedad de esta clase
	$a->operacion1();
	$a-> operacion2(24,"probando");
	
?>