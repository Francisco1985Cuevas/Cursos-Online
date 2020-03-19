<?php
	header('Content-Type: text/xml');
	sleep(3);	//Retarda la contestacion de datos de este archivo por 3 segundos.
	echo "<?xml version=\"1.0\" ?><saludo>Bienvenido, usuario de Ajax</saludo>";
?>