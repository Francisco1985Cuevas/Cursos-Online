<?php
	//Inicia sesi�n PHP
	session_start();
	
	//Carga el script de manejo de errores y la clase de validaci�n
	require_once('error_handler.php');
	require_once('validate.class.php');
	
	//Crea un nuevo objeto "validator"
	$validator = new Validate();
	
	//Lee tipo de validaci�n(�PHP o AJAX?)
	$validationType = '';
	
	if(isset($_GET['validationType'])){
		$validationType = $_GET['validationType'];
	}
	
	//�Validaci�n AJAX o validaci�n PHP?
	if($validationType == 'php'){
		//La validaci�n PHP es ejecutada por el m�todo "ValidatePHP", que devuelve
		//la p�gina a la que el visitante debe ser redireccionado(que es "allok.php" si
		//todos los datos son validados, o vuelve a index.php si no)
		header("Location:".$validator->ValidatePHP());
	}else{
		//Validaci�n AJAX es ejecutada por el m�todo "ValidateAJAX". Los resultados
		//son usados para construir un documento XML que es devuelto al cliente
		$response = '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>'.
						'<response>'.
							'<result>'.
								$validator->ValidateAJAX($_POST['inputValue'], $_POST['fieldID']).
							'</result>'.
							'<fieldid>'.
								$_POST['fieldID'].
							'</fieldid>'.
						'</response>';
		//Genera la respuesta
		if(ob_get_length()){
			ob_clean();
		}
		
		header('Content-Type: text/xml');
		
		echo $response;
	}
?>
