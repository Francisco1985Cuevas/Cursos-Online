<?php
	/*Script del Lado del Servidor*/
	/*Este archivo es llamado desde la aplicacion ajax.*/
	/*Devuelve en formato xml la hora del servidor*/
	header('Content-Type: text/xml');
	echo "<?xml version=\"1.0\"?><clock1><timenow>".date('H:i:s')."</timenow><timenow>HOLA</timenow></clock1>";
?>

