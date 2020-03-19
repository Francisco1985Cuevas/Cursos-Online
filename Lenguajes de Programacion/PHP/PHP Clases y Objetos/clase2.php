<?php
	//Clase
	class nombreClase{
		
		//Constructor
		function nombreClase($param){
			echo "Constructor llamado con el parámetro $param <br>";
		}
	}
	
	//Instancias
	$a = new nombreClase("Primero");
	$b = new nombreClase("Segundo");
	$c = new nombreClase();
	
?>