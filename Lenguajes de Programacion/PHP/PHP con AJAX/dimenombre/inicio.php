<?php
	//Generará la Salida XML
	header("Content-Type: text/xml");
	
	//Genera el header XML
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
	
	//Crea el elemento<response>
	echo "<response>";
	
		//Recupera el nombre del usuario
		$name = $_GET["name"];
		
		//Genera una salida dependiendo del nombre de usuario recibido del cliente.
		$userNames = array("MANUEL", "ROBERTO", "CLAUDIO", "PEDRO", "JUAN");
		
		if(in_array(strtoupper($name), $userNames)){
			echo "&#161; Hola, Maestro ".htmlspecialchars($name)."!";
		}elseif(trim($name) == ""){
			echo "Desconocido, Dime tu Nombre, Por Favor";
		}else{
			echo htmlspecialchars($name).", No te Conozco";
		}
		
	//Cierra el elemento <response>
	echo "</response>";
?>
