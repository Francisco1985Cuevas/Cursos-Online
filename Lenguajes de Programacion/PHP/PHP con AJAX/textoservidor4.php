<?php
	$dias = array ('Lunes','Martes','Mi�rcoles','Jueves','Viernes','S�bado','Domingo');
	$numdias = sizeof($dias);
	
	for($i=0; $i<($numdias - 1); $i++){
		echo utf8_encode($dias[$i]."|");
	}
	
	echo utf8_encode($dias[$numdias-1]);
?>

