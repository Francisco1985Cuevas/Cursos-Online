<?php
	
	function busca_clases($clase){
		include "clases/".$clase.".php";
	}
	
	spl_autoload_register('busca_clases');	//Dicho de otra forma reemplaza la variable $clase:
											//function autoload(Persona)
											//function autoload(Auto)
											//function autoload(Articulo)
	
	//Persona::mostrar("Hola mundo");	// function busca_clases(Persona)
	//Auto::mostrar("Hola mundo2");		// function busca_clases(Auto)
	//Persona::mostrar("CodigoFacilito");	// function busca_clases(Persona)
	Articulo::mostrar("Soy un producto");	// function busca_clases(Articulo)
	
?>