<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>XML Demo</title>
	</head>
	<body>
		<h1>XML Demo</h1>
		<?php
			//Cargar main.xml y examinarlo
			$xml = simplexml_load_file("main.xml");
			
			print "<h3>XML original</h3>\n";
			$xmlText = $xml->asXML();	//Muestra el archivo xml como si fuera de texto
			$xmlText = htmlentities($xmlText);
			
			print "<pre>Extraer y mostrar los elementos</pre>\n";
			print $xml->title;	//Llamamos a la etiqueta del xml y nos va a devolver el contenido
			print "<br />";
			
			print $xml->css;
			print "<br />";
			
			print $xml->top;
			print "<br />";
			
			print $xml->menu;
			print "<br />";
			
			print $xml->content;
			print "<br />";
			
			
			print "<h3>Extraer como un array</h3>\n";
			foreach($xml->children() as $name=>$value){
				print "<b>$name:</b> $value<br />\n";
			}
		?>
	</body>
</html>
