<?php
	//Configura el método de manejo de errores del usuario como "error_handler"
	set_error_handler('error_handler', E_ALL);
	
	//Función manejo errores
	function error_handler($errNo, $errStr, $errFile, $errLine){
		//Limpia cualquier salida que ya haya sido generada
		if(ob_get_length()){
			ob_clean();
		}
		
		//Produce el mensaje de error
		$error_message = 'ERRNO: '.$errNo.chr(10).'TEXT: '.$errStr.chr(10).'LOCATION: '.$errFile.', line '.$errLine;
		echo $error_message;
		//Evita que se procese nada mas de los scripts PHP
		exit;
	}
?>