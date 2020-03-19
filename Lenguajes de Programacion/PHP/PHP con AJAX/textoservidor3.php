<?php
	$dias = array ('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo');
	echo "<table border='2'>";
		echo utf8_encode ("<tr><th>Número Día</th><th>Nombre Día</th></tr>");
		for($i=0; $i<7; $i++){
			echo utf8_encode ("<tr><td>".$i."</td><td>".$dias[$i]."</td></tr>");
		}
	echo "</table>";
?>



