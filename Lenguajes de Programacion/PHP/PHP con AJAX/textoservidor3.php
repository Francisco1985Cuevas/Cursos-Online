<?php
	$dias = array ('Lunes','Martes','Mi�rcoles','Jueves','Viernes','S�bado','Domingo');
	echo "<table border='2'>";
		echo utf8_encode ("<tr><th>N�mero D�a</th><th>Nombre D�a</th></tr>");
		for($i=0; $i<7; $i++){
			echo utf8_encode ("<tr><td>".$i."</td><td>".$dias[$i]."</td></tr>");
		}
	echo "</table>";
?>



