<?php
	/* Namespaces */
	
	/* ###Forma de incluir archivos usando namespace y autoload ### */
	spl_autoload_register(
		function($clase){
			// print $clase; // indica la ruta donde esta...
			$ruta = "api/".str_replace("\\", "/", $clase).".php";
			// print $ruta;
			if(is_readable($ruta)){	// si ese archivo en cuestion de verdad existe?...
				require_once $ruta; // hacer el require_once...
			}else{
				// sino imprimir mensaje de error
				echo "El Archivo No Existe";
			}
		}
	);
	
	//Para poder usar el metodo hola() de la clase Persona, primero debemos indicar el nombre del namespaces
	Models\Persona::Hola();	//llama al namespaces "Models" y dentro de ese namespaces a la clase "Persona" 
							// y al metodo Hola()
	echo "<br>";
	Controllers\PersonasControllers::Hola();
	/* ###Forma de incluir archivos usando namespace y autoload ### */
?>
