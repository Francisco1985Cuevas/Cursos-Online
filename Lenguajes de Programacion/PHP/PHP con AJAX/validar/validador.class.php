<?php
	// Carga manejador de error y configuración base datos
	require_once ('config.php');

	//Clase admite validación formulario web PHP y AJAX 
	class Validador{
		//almacena conexión a la base de datos
		private $mMysqli;

		//constructor abre conexión a la base de datos
		function __construct(){
			$this->mMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		}

		// destructor cierra conexión a la base de datos
		function __destruct(){
			$this->mMysqli->close();      
		}
    
		//Soporte validación AJAX , verifica un valor simple
		public function ValidacionAJAX($inputValue, $idInput){
			//Comprueba que campo está siendo validado y ejecuta la validación
			
			switch($idInput){
				//Comprueba si el nombre de usuario es válido
				case 'usuario':
				return $this->validarUsuario($inputValue);
				break;

				//Comprueba si el nombre es válido
				case 'nombre':
				return $this->validarNombre($inputValue);
				break;

				//Comprueba si se ha seleccionado un género
				case 'select_Genero':
				return $this->validarGenero($inputValue);
				break;

				//Comprueba si el mes de nacimiento es válido
				case 'selBthMonth':
				return $this->validateBirthMonth($inputValue);
				break;

				//Comprueba si el día de nacimiento es válido
				case 'txtBthDay':
				return $this->validateBirthDay($inputValue);
				break;

				//Comprueba si el año de nacimiento es válido
				case 'txtBthYear':
				return $this->validateBirthYear($inputValue);
				break;

				//Comprueba si el email es válido 
				case 'email':
				return $this->validarEmail($inputValue);
				break;

				//Comprueba si el teléfono es válido 
				case 'telefono':
				return $this->validarTelefono($inputValue);
				break;

				//Comprueba si se ha marcado la checkbox ""he leído los términos"
				case 'chk_Condiciones':
				return $this->validarCondiciones($inputValue);
				break;
			}
		}
  
		//valida todos los campos del formulario en el envío del formulario
		public function ValidacionPHP(){
			
			//Indicador de error, se convierte en 1 cuando se encuentran errores.
			$errorsExist = 0;

			//limpia el indicador de la sesión de errores    
			if(isset($_SESSION['errors'])){
				unset($_SESSION['errors']);
			}
			
			//Por defecto todos los campos son considerados válidos
			$_SESSION['errors']['usuario'] = 'hidden';
			$_SESSION['errors']['nombre'] = 'hidden';
			$_SESSION['errors']['select_Genero'] = 'hidden';
			$_SESSION['errors']['selBthMonth'] = 'hidden';
			$_SESSION['errors']['txtBthDay'] = 'hidden';
			$_SESSION['errors']['txtBthYear'] = 'hidden';
			$_SESSION['errors']['email'] = 'hidden';
			$_SESSION['errors']['telefono'] = 'hidden';
			$_SESSION['errors']['chk_Condiciones'] = 'hidden';

			//Validación nombre usuario
			if(!$this->validarUsuario($_POST['usuario'])){
				$_SESSION['errors']['usuario'] = 'error';
				$errorsExist = 1;
			}

			//Validación nombre
			if (!$this->validarNombre($_POST['nombre'])){
				$_SESSION['errors']['nombre'] = 'error';
				$errorsExist = 1;
			}

			//Validación género
			if (!$this->validarGenero($_POST['select_Genero'])){
				$_SESSION['errors']['select_Genero'] = 'error';
				$errorsExist = 1;
			}

			//Validación mes nacimiento
			if (!$this->validateBirthMonth($_POST['selBthMonth'])){
				$_SESSION['errors']['selBthMonth'] = 'error';
				$errorsExist = 1;
			}

			//Validación día nacimiento
			if (!$this->validateBirthDay($_POST['txtBthDay'])){
				$_SESSION['errors']['txtBthDay'] = 'error';
				$errorsExist = 1;
			}

			//Validación año nacimiento y fecha
			if(!$this->validateBirthYear($_POST['selBthMonth'].'#'.$_POST['txtBthDay'].'#'.$_POST['txtBthYear'])){
				$_SESSION['errors']['txtBthYear'] = 'error';
				$errorsExist = 1;
			}

			//Validación email
			if (!$this->validarEmail($_POST['email'])){
				$_SESSION['errors']['email'] = 'error';
				$errorsExist = 1;
			}

			//Validación teléfono
			if(!$this->validarTelefono($_POST['telefono'])){
				$_SESSION['errors']['telefono'] = 'error';
				$errorsExist = 1;
			}
    
			//Validación lectura términos
			if(!isset($_POST['chk_Condiciones']) || !$this->validarCondiciones($_POST['chk_Condiciones'])){
				$_SESSION['errors']['chk_Condiciones'] = 'error';
				$_SESSION['values']['chk_Condiciones'] = '';
				$errorsExist = 1;
			}

			//Si no se han encontrado errores, apunta a una validación correcta de la página
			if ($errorsExist == 0){
				return 'allok.php';
			}else{
				//Si son encontrado errores, salva las entradas actuales del usuario
				foreach ($_POST as $key => $value){
					$_SESSION['values'][$key] = $_POST[$key];
				}
				return 'index.php';
			}
		}

		//Validación nombre usuario (no debe estar vacío, y no debe estar ya registrado)
		private function validarUsuario($value){
			//Ajusta y escapa el valor de entrada    
			$value = $this->mMysqli->real_escape_string(trim($value));
			
			//Nombre de usuario vacío no es válido
			if($value == null){ 
				return 0; // no válido
			}
			
			//comprueba si el nombre de usuario existe en la base de datos
			$query = $this->mMysqli->query('SELECT user_name FROM users WHERE user_name = "'.$value.'"');
			
			if($this->mMysqli->affected_rows > 0){
				return '0'; // no válido
			}else{
				return '1'; // válido
			}
		}

		//Validación nombre
		private function validarNombre($value){
			//Ajusta y escapa el valor de entrada    
			$value = trim($value);
			
			//Nombre de usuario vacío no es válido
			if($value){ 
				return 1; // válido
			}else{
				return 0; // no válido
			}
		}

		//validación género 
		private function validarGenero($value){
			//El usuario debe tener un género
			return ($value == '0') ? 0 : 1;
		}  

		//Validación mes nacimiento
		private function validateBirthMonth($value){
			//mes no debe ser nulo, y entre 1 y 12  
			return ($value == '' || $value > 12 || $value < 1) ? 0 : 1;
		}
  
		//Validación día nacimiento 
		private function validateBirthDay($value){
			//día no debe ser nulo, y entre 1 and 31  
			return ($value == '' || $value > 31 || $value < 1) ? 0 : 1;
		}

		//validación año nacimiento y la fecha completa
		private function validateBirthYear($value){
			// validación año nacimiento está entre 1900 y 2000 
			// obtener fecha completa (dd#mm#yyyy)
			$date = explode('#', $value);
			// la fecha no puede ser validada si no hay día, mes o año  
			if(!$date[0]){ 
				return 0;
			}
			
			if(!$date[1] || !is_numeric($date[1])){ 
				return 0;
			}
			
			if(!$date[2] || !is_numeric($date[2])){ 
				return 0;
			}
			
			//Comprueba la fecha
			return (checkdate($date[0], $date[1], $date[2])) ? 1 : 0;
		}

		//validación email
		private function validarEmail($value){
			// formatos validación email: *@*.*, *@*.*.*, *.*@*.*, *.*@*.*.*)
			return (!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$/", $value)) ? 0 : 1;
		}

		//validación teléfono
		private function validarTelefono($value){
			// formato válido teléfono válido: ###-###-### 
			return (!preg_match("/^[0-9]{3}-*[0-9]{3}-*[0-9]{3}$/", $value)) ? 0 : 1;	
		}

		//comprobar que el usuario ha leído los términos de uso
		private function validarCondiciones($value){
			// valor validación es 'true'
			return ($value == 'true' || $value == 'on') ? 1 : 0;
		}
	}
?>
