<?php
	/*
		- Namespaces
		-------------
		
		- Namespaces: Nombres de espacio
	*/
	
	/* ###Forma tradicional de incluir archivos sin usar namespaces### */
	// require_once "api/Models/Persona.php";
	// require_once "api/Controllers/PersonasControllers.php";
	// Persona::Hola();
	// echo "<br>";
	// PersonasControllers::Hola();
	/* ###Forma tradicional de incluir archivos sin usar namespaces### */
	//////////////////////////////////////////////////////////////////////
	
	
	/* ###Forma de incluir archivos usando namespace### */
	require_once "api/Models/Persona.php";
	require_once "api/Controllers/PersonasControllers.php";
	
	// Para poder usar el metodo hola() de la clase Persona, primero debemos indicar el nombre 
	// del namespace
	Models\Persona::Hola();	// llama al namespace "Models" y dentro de ese namespace a la 
							// clase "Persona" y al metodo Hola()
	echo "<br>";
	Controllers\PersonasControllers::Hola();
	/* ###Forma de incluir archivos usando namespace### */
	
?>