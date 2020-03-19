<?php
	// establece que el m�todo para manejar errores del usuario sea error_handler

	set_error_handler('error_handler', E_ALL);

	// funci�n para manejar errores
	function error_handler($errNo, $errStr, $errFile, $errLine){ 
		// limpia cualquier salida que ha haya sido generada
		ob_clean();
  
		// produce el mensaje de error 
		$error_message = 'ERRNO: '.$errNo.chr(10).'TEXT: '.$errStr.chr(10).'LOCATION: '.$errFile.', line '.$errLine;
		echo $error_message;

		// impide que se ejecute nada m�s de los scripts PHP
		exit;
	}
?>
