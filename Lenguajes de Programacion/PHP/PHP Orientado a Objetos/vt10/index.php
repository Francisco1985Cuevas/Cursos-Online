<?php
	/*
		- Funcionamiento de un autoload
		--------------------------------
		
		- El autoload carga una clase automaticamente, con crear una clase el "autoload" buscara 
		  entre todos los archivos y buscara la clase a la cual corresponda
		
	*/
	
	
	//En este archivo se define el autoload
	
	function autoload($clase)
	{
		include "clases/".$clase.".php";
	}
	
	spl_autoload_register('autoload');	//Lo que hace spl_autoload_register() es tomar el nombre de la
										//clase que para este ejemplo son: Persona y Auto, y buscar 
										//dentro de la funcion autoload() el archivo el cual contenga 
										//la palabra Persona o Auto
										
										//Dicho de otra forma reemplaza la variable $clase:
										//function autoload(Persona)
										//function autoload(Auto)
										//function autoload(Articulo)
	
	//Persona::mostrar("Hola mundo");
	//Auto::mostrar("Hola mundo");
	//Persona::mostrar("CodigoFacilito");
	Articulo::mostrar("Soy un producto");
	
?>