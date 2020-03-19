<?php
	/* ###Forma tradicional de incluir archivos sin usar namespaces### */
	// class PersonasControllers{
		// public static function Hola(){
			// echo "Hola soy la persona del controlador";
		// }
	// }
	/* ###Forma tradicional de incluir archivos sin usar namespaces### */
	//////////////////////////////////////////////////////////////////////
	
	
	/* ###Forma de incluir archivos usando namespace### */
	namespace Controllers;	// Controllers se llama mi namespace
	
	class PersonasControllers{
		public static function Hola(){
			// aquí se ve la importancia del uso de namespace, este metodo estatico llamado Hola()
			// es el mismisimo metodo Hola(), pero de la clase Persona... con el uso de namespace
			// no hace falta cambiarle el nombre a la clase PersonasControllers o al metodo...
			// Para invocarlo simplemente usamos: 
			// Nombre_namespace\Nombre_Clase::Metodo();
			echo "Hola soy la Persona del Controlador.";
		}
	}
	/* ###Forma de incluir archivos usando namespace### */
?>