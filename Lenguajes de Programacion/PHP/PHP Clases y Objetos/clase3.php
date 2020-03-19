<?php
	//Como usar los atributos de clase y como usar las operaciones de clase.
	
	//Clase
	class nombreClase{
		//Atributo
		var $atributo;
		
		//Metodo o Función
		function operacion($param){
			//this = Apuntador o indicador
			
			//Este es el modo en que uno hace referencia a un atributo para poder usarlo
			//en una funcion: "$this->Nombre del atributo sin el simbolo del dolar".
			
			//En este caso como ejemplo a este atributo se le asigna lo que viene en 
			//la variable $param.
			
			$this->atributo = $param;
			echo $this->atributo;
		}
	}
	
	//Instancia
	$ejemplo = new nombreClase();
	$ejemplo->operacion("valor");
	
?>