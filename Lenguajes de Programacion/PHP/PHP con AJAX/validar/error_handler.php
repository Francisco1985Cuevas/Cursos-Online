<?php
	//Configura el m�todo de manejo de errores del usuario como "manejador_error"
	set_error_handler('manejador_error', E_ALL);

	// funci�n manejo errores
	function manejador_error($errNo, $errStr, $errFile, $errLine){
		//Limpia cualquier salida que ya haya sido generada
		if(ob_get_length()){ 
			ob_clean();
		}
		
		// produce el mensaje de error 
		$mensaje_error = 'ERRNO: '.$errNo.chr(10).'TEXTO: '.$errStr.chr(10).'UBICACION: '.$errFile .', linea '.$errLine;
		echo $mensaje_error;
		// evita que se procese nada m�s de los scripts PHP
		exit;
	}
?>
