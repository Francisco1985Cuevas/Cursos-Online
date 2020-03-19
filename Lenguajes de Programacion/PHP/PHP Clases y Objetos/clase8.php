<?php
	//Herencias en PHP.
	
	//Clase Padre o SuperClase.
	class vehiculo{
		var $atributo1;
		function operacion1(){
		
		}
	}
	
	//Clase Hijo o SubClase, Hereda su contenido de la clase Padre.
	class coche extends vehiculo{
		var $atributo2;
		function operacion2(){
		
		}
	}
	
	//Si se crea una instancia de la "SubClase" se le pueden aplicar a este objeto las propiedades y metodos de la
	//Superclase y la SubClase.
	$seat = new coche();
	
	$seat->operacion1(1);
	$seat->atributo1=10;
	
	$seat->atributo2="cualquier texto";
	$seat->operacion2();
	
	//Si se crea una instancia de la SuperClase solo se pueden aplicar a este objeto o instancia de esta clase
	//los atributos y metodos de la "SuperClase", no así de la SubClase.
	$bicicleta = new vehiculo();
	
?>