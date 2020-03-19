<?php
	//Ejemplo de la creación de una clase: POO.
	class nombreClase{
		var atributo1;
		var atributo2;
	}
	
	class nombreClase{
		function operacion1(){
			
		}
		function operacion2($par1, $par2){
		
		}
	}
	//Los constructores son llamados automaticamente cuando creamos un objeto
	//Uso: Ejemplo inicializar valores de variables...
	//Los constructores tienen el 'mismo nombre que la clase'.
	class nombreClase{
		function nombreClase($par){
			echo "constructor llamado con el parametro $par<br>";
		}
		function operacion2($par1, $par2){
		
		}
	}
?>