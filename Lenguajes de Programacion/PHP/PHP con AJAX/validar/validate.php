<?php
	//Inicia sesi�n PHP
	session_start();

	//carga el script de manejo de errores y la clase de validaci�n
	require_once ('error_handler.php');
	require_once ('validate.class.php');
  
	//Crea un nuevo objeto "validator"
	$validator = new Validate();

	// Lee tipo de validaci�n (�PHP o AJAX?)
	$TipoValidation = '';  
	if(isset($_GET['TipoValidacion'])){
		$TipoValidation = $_GET['TipoValidacion'];
	}
	
	//�Validaci�n AJAX o validaci�n PHP?
	if ($TipoValidation == 'php'){
		//La validaci�n PHP es ejecutada por el m�todo "ValidacionPHP" , que devuelve
		//la p�gina a la que el visitante debe ser redireccionado(que es "allok.php" si
		//todos los datos son validados, o vuelve a index.php si no)
		header("Location:".$validator->ValidacionPHP());
	}else{
		// Validaci�n AJAX es ejecutada por el m�todo "ValidacionAJAX". Los resultados
		// son usados para construir un documento XML que es devuelto al cliente
		$respuesta = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'.
			'<response>'.
				'<result>'.
					$validator->ValidacionAJAX($_POST['inputValue'], $_POST['fieldID']).
				'</result>'.
				'<fieldid>'.
					$_POST['fieldID'].  
				'</fieldid>'.
			'</response>'; 
		
		//genera la respuesta
		if(ob_get_length()){ 
			ob_clean();
		}
		
		header('Content-Type: text/xml');
		
		echo $respuesta;
	}
?>
