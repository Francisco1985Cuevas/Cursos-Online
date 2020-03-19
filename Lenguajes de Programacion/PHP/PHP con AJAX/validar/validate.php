<?php
	//Inicia sesión PHP
	session_start();

	//carga el script de manejo de errores y la clase de validación
	require_once ('error_handler.php');
	require_once ('validate.class.php');
  
	//Crea un nuevo objeto "validator"
	$validator = new Validate();

	// Lee tipo de validación (¿PHP o AJAX?)
	$TipoValidation = '';  
	if(isset($_GET['TipoValidacion'])){
		$TipoValidation = $_GET['TipoValidacion'];
	}
	
	//¿Validación AJAX o validación PHP?
	if ($TipoValidation == 'php'){
		//La validación PHP es ejecutada por el método "ValidacionPHP" , que devuelve
		//la página a la que el visitante debe ser redireccionado(que es "allok.php" si
		//todos los datos son validados, o vuelve a index.php si no)
		header("Location:".$validator->ValidacionPHP());
	}else{
		// Validación AJAX es ejecutada por el método "ValidacionAJAX". Los resultados
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
