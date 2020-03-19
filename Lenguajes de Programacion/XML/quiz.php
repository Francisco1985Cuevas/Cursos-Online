<!doctyp html public "-//W3C//DTD HTML 4.0 //EN”>
<html>
	<head>
		<title>Lector de cuestionario</title>
	</head>
	<body>
		<?php
			//lector de cuestionario
			//muestra como trabajar con archivos XML más complejos
			//cargar un archivo cuestionario
			$xml = simplexml_load_file("python.xml");

			//moverse a través del cuestionario como un array asociativo
			foreach($xml->children() as $problem){
				//imprimir cada pregunta como una lista ordenada.
				echo 	"<h3>$problem->question</h3>
							<ol type='A'>
								<li>$problem->answerA</li>
								<li>$problem->answerB</li>
								<li>$problem->answerC</li>
								<li>$problem->answerD</li>
							</ol>";
			} //fin foreach
			
			//acceder directamente al nodo:
			print $xml->problem[0]->question;
		?>
	</body>
</html>
