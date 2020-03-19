<?php
	//Habilita sesión php
	session_start();
	
	//Construye etiquetas HTML <option>
	//function buildOptions($options, $selectedOption){
	function ConstruirOptions($options, $selectedOption){
		//build=construir
		foreach($options as $indice => $texto){
			if($indice == $selectedOption){
				echo '<option value="'.$indice.'" selected="selected">'.$texto.'</option>';
			}else{
				echo '<option value="'.$indice.'" >'.$texto.'</option>';
			}
		}
	}
	
	//Inicia opciones array género
	$generoOptions = array("0" => "[Selecciona]", "1" => "Hombre", "2" => "Mujer");
	
	//Inicia opciones array mes
	$mesOptions = array(	"0" => "[Selecciona]", 
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
	//Dos variables de sesion... $_SESSION['values'] y $_SESSION['errors']
	if(!isset($_SESSION['values'])){
		$_SESSION['values']['txtUsername'] = '';
		$_SESSION['values']['txtName'] = '';
		$_SESSION['values']['selGender'] = '';
		$_SESSION['values']['selBthMonth'] = '';
		$_SESSION['values']['txtBthDay'] = '';
		$_SESSION['values']['txtBthYear'] = '';
		$_SESSION['values']['txtEmail'] = '';
		$_SESSION['values']['txtPhone'] = '';
		$_SESSION['values']['chkReadTerms'] = '';
	}
	
	if(!isset($_SESSION['errors'])){
		$_SESSION['errors']['txtUsername'] = 'hidden';
		$_SESSION['errors']['txtName'] = 'hidden';
		$_SESSION['erros']['selGender'] = 'hidden';
		$_SESSION['errors']['selBthMonth'] = 'hidden';
		$_SESSION['errors']['txtBthDay'] = 'hidden';
		$_SESSION['errors']['txtBthYear'] = 'hidden';
		$_SESSION['errors']['txtEmail'] = 'hidden';
		$_SESSION['errors']['txtPhone'] = 'hidden';
		$_SESSION['errors']['chkReadTerms'] = 'hidden';
		
	}
?>
