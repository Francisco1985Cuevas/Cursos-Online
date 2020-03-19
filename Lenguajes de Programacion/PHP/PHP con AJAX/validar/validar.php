<?php
	//Inicia sesi�n PHP
	session_start();

	//carga el script de manejo de errores y la clase de validaci�n
	require_once('manejador_errores.php');
	require_once('validador.class.php');
  
	//Crea un nuevo objeto "validator"
	$validador = new Validador();

	// Lee tipo de validaci�n (�PHP o AJAX?)
	$TipoValidation = '';  
	if(isset($_GET['TipoValidacion'])){
		$TipoValidation = $_GET['TipoValidacion'];
	}
	
	//�Validaci�n AJAX o validaci�n PHP?
	if($TipoValidation == 'php'){
		//La validaci�n PHP es ejecutada por el m�todo "ValidacionPHP" , que devuelve
		//la p�gina a la que el visitante debe ser redireccionado(que es "allok.php" si
		//todos los datos son validados, o vuelve a index.php si no)
		header("Location:".$validador->ValidacionPHP());
	}else{
		//Validaci�n AJAX es ejecutada por el m�todo "ValidacionAJAX". Los resultados
		//son usados para construir un documento XML que es devuelto al cliente
		$respuesta = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'.
			'<response>'.
				'<result>'.
					$validador->ValidacionAJAX($_POST['inputValue'], $_POST['idInput']).
				'</result>'.
				'<fieldid>'.
					$_POST['idInput'].  
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
