<?php
	
	/* ###Forma tradicional de incluir archivos sin usar namespaces### */
	// class Persona{
		// // Atributos
		
		// // Metodos
		// public static function Hola(){	// método estatico
			// echo "Hola soy la persona del modelo.";
		// }
	// }
	/* ###Forma tradicional de incluir archivos sin usar namespaces### */
	//////////////////////////////////////////////////////////////////////
	
	
	/* ###Forma de incluir archivos usando namespace### */
	
	// Se recomienda que el nombre de la clase se llame igual que el archivo.
	// Antes de todo codigo PHP o HTML debe ir el "Namespace"
	// Los nombres de codigo de espacio no pueden luego del codigo PHP o HTML.
	// El namespace debe ser lo "primero" en colocarse en este archivo.
	// Recomendacion: los namespace deben llamarse igual a la carpeta que los tiene contenidos.
	
	namespace Models;	// Models se llama mi namespace
	class Persona{
		// Atributos
		
		// Metodos
		public static function Hola(){	// método estatico
			echo "Hola soy la Persona del Modelo.";
		}
	}
	
	// Para poder llamar la clase persona primero se debe llamar a este namespace definido
	// en este archivo.. que para este caso es "Models"
	// La clase no se puede invocar a ella sola, tambien debemos indicar el namespace
	
	/* ###Forma de incluir archivos usando namespace### */
	
?>
