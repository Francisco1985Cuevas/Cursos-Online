<?php
	//Crear desde php mediante el uso de la API DOM un archivo xml
	$doc = new DomDocument("1.0");	//Abrir un nuevo documento DOM
	
	//Ahora manipular o crear nuevos elementos o nodos
	//Cuando hablamos de nodos, nos referimos a elementos.
	$root = $doc->createElement("html");	//Uso del metodo createElement()
	$root = $doc->appendChild($root);
	
	$body = $doc->createElement("body");
	$body = $root->appendChild($body);
	$body->setAttribute("bgcolor", "#87CEEB");
	
	$graff = $doc->createElement("p");
	$graff = $body->appendChild($graff);
	$text = $doc->createTextNode("Podemos escribir cualquier texto.");
	$text = $graff->appendChild($text);
	
	$graff = $doc->createElement("p");
	$graff = $body->appendChild($graff);
	$text = $doc->createTextNode("Podemos escribir cualquier texto.");
	$text = $graff->appendChild($text);
	
	$doc->save("prueba_dom.xml");
?>