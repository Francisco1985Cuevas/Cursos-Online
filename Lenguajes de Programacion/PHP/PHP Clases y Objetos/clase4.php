<?php
	class nombreClase{
		var $atributo;
	}
	
	//Asignar un valor a un atributo fuera de una clase
	$a = new nombreClase();
	$a->atributo = "valor";
	echo $a->atributo;
?>