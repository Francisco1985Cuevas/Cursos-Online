<?php
	//Habilita sesión PHP
	session_start();

	//Construye etiquetas HTML <option>
	function ConstruirOptions($options, $selectedOption){
		foreach ($options as $indice => $texto){
			if($indice == $selectedOption){
				echo '<option value="'.$indice.'" selected="selected">'.$texto.'</option>';
			}else{
				echo '<option value="'.$indice.'">'.$texto.'</option>';
			}
		}
	}

	//Inicia opciones array género
	$generoOptions = array("0" => "[Selecciona]", "1" => "Hombre", "2" => "Mujer");

	//Inicia opciones array mes
	$mesesOptions = array(	"0" => "[Selecciona]",
							"1" => "Enero",
							"2" => "Febrero",
							"3" => "Marzo",
							"4" => "Abril",
							"5" => "Mayo",
							"6" => "Junio",
							"7" => "Julio",
							"8" => "Agosto",
							"9" => "Septiembre",
							"10" => "Octubre",
							"11" => "Noviembre",
							"12" => "Diciembre"
						);

	//Inicia algunas variables de sesión para evitar que PHP lance Noticias
	if(!isset($_SESSION['values'])){
		$_SESSION['values']['usuario'] = '';
		$_SESSION['values']['nombre'] = '';
		$_SESSION['values']['select_Genero'] = '';
		$_SESSION['values']['selBthMonth'] = '';
		$_SESSION['values']['txtBthDay'] = '';
		$_SESSION['values']['txtBthYear'] = '';
		$_SESSION['values']['email'] = '';
		$_SESSION['values']['telefono'] = '';
		$_SESSION['values']['chk_Condiciones'] = '';
	}


	if(!isset($_SESSION['errors'])){
		$_SESSION['errors']['usuario'] = 'hidden';
		$_SESSION['errors']['nombre'] = 'hidden';
		$_SESSION['errors']['select_Genero'] = 'hidden';
		$_SESSION['errors']['selBthMonth'] = 'hidden';
		$_SESSION['errors']['txtBthDay'] = 'hidden';
		$_SESSION['errors']['txtBthYear'] = 'hidden';
		$_SESSION['errors']['email'] = 'hidden';
		$_SESSION['errors']['telefono'] = 'hidden';
		$_SESSION['errors']['chk_Condiciones'] = 'hidden';
	}
?>
