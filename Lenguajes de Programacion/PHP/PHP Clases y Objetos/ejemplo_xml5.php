<?php
	//Archivo de ejemplo para la API SAX
	/*
		Modo de usar SAX
		----------------
		
		1) Determinar que tipo de eventos quieres gestionar
		2) Escribir funciones gestoras para cada elemento: gestor de datos caracter, gestor de elemento inicio y elemento final
		3) Crear un analizador usando xml_parser_create() y luego llamarlo usando xml_parse.
		4) Liberar la memoria usada por el analizador  usando xml_parser_free().
	*/
	
	//Llamamos a un archivo xml y con el uso de la API SAX vamos a presentar los datos en un navegador web.
	
	$archivo = "ejemplo_xml3.xml";	//Llamamos a un archivo xml
	
	//Llama esto al comienzo de cada elemento
	function ElementoInicio($parser, $nombre, $atributos){
		//Muestra el elemento en negrita
		print "<b>$nombre => </b> ";
	}
	
	//Llama esto al final de cada elemento
	function ElementoFinal($parser, $nombre){
		//Salta una linea para cada elemento
		print "\n";
	}
	
	//Llama esto en todos los sitios donde aparezcan datos carácter
	function DatoCharacter($parser, $valor){
		//Cuando aparecen datos de caracteres
		print "$valor<br />";
	}
	
	//Define el analizador
	$simpleparser = xml_parser_create("ISO-8859-1");
	xml_set_element_handler($simpleparser, "ElementoInicio", "ElementoFinal");
	xml_set_character_data_handler($simpleparser, "DatoCharacter");
	
	//Abre el archivo XML para leer
	if(!($fp = fopen($archivo, "r"))){
		die("No se pudo abrir la entrada XML");
	}
	
	//Analizalo
	while($datos = fread($fp, filesize($archivo))){
		if(!xml_parse($simpleparser, $datos, feof($fp))){
			die(xml_error_string(xml_get_error_code($simpleparser)));
		}
	}
	
	//Libera memoria
	xml_parser_free($simpleparser);
?>
