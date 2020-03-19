<?php
	// carga el script de manejo de errores y la clase Grid
	require_once('error_handler.php');
	require_once('grid.class.php');

	// El parámetro action' debe ser FEED_GRID_PAGE o UPDATE_ROW 
	if(!isset($_GET['action'])){  
		echo 'Error del Servidor: comando del cliente perdido.';
		exit;
	}else{
		// almacena la acción a ejecutar en la variable $action
		$action = $_GET['action'];
	}
	
	// crea instancia de Grid
	$grid = new Grid($action);
	
	// valores válidos para action son FEED_GRID_PAGE y UPDATE_ROW 
	if($action == 'FEED_GRID_PAGE'){
		// recupera el número de la página
		$page = $_GET['page'];
		
		// lee los productos en la página
		$grid->readPage($page);
	}else if($action == 'UPDATE_ROW'){
		// recupera parámetros
		$id = $_GET['id'];
		$on_promotion = $_GET['on_promotion'];
		$price = $_GET['price'];

		$name = $_GET['name'];
		// actualiza el registro
		$grid->updateRecord($id, $on_promotion, $price, $name);
	}else 
		echo 'error del Servidor: comando cliente no reconocido.';

	// limpia la salida 
	if(ob_get_length()) ob_clean();

	// enviamos cabeceras para prevenir el uso de la cache del navegador
	header('Expires: Fri, 25 Dec 1980 00:00:00 GMT'); // fecha del pasado
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT'); 
	header('Cache-Control: no-cache, must-revalidate'); 
	header('Pragma: no-cache');
	header('Content-Type: text/xml');

	// genera la salida en formato XML
	header('Content-type: text/xml'); 
	echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<data>';
		echo '<action>'.$action.'</action>';
		echo $grid->getParamsXML();
		echo $grid->getGridXML();
	echo '</data>';
?>
