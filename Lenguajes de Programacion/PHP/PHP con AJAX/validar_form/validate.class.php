<?php
	//Carga manejador de error y configuración base datos
	require_once('config.php');
	
	//Clase admite validación formulario web PHP y AJAX
	class Validate{
		//Almacena conexión a la base de datos
		private $mMysqli;
		
		//Constructor abre conexión  a la base de datos
		function __construct(){
			$this->mMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		}
		
		//Destructor cierra conexión a la base de datos
		function __destruct(){
			$this->mMysqli->close();
		}
		
		//Soporte validación AJAX, verifica un valor simple
		public function ValidateAJAX($inputValue, $fieldID){
			//Comprueba que campo está siendo validado y ejecuta la validación
			switch($fieldID){
				//Comprueba si el nombre de usuario es válido
				case 'txtUsername':
					return $this->validateUserName($inputValue);
					break;
				//Comprueba si el nombre es válido
				case 'txtName':
					return $this->validateName($inputValue);
					break;
				//Comprueba si se ha seleccionado un género
				case 'selGender':
					return $this->validateGender($inputValue);
					break;
				//Comprueba si el mes de nacimiento es válido
				case 'selBthMonth':
					return $this->validateBirthMonth($inputValue);
					break;
				//Comprueba si el día de nacimiento es válido
				case 'txtBthDay':
					return $this->validateBirthYear($inputValue);
					break;
				//Comprueba si el año de nacimiento es válido
				case 'txtBthYear':
					return $this->validateBirthYear($inputValue);
					break;
				//Comprueba si el email es válido
				case 'txtEmail':
					return $this->validateEmail($inputValue);
					break;
				//Comprueba si el teléfono es válido
				case 'txtPhone':
					return $this->validatePhone($inputValue);
					break;
				//Comprueba si se ha marcado la checkbox "He leído los términos"
				case 'chkReadTerms':
					return $this->validateReadTerms($inputValue);
					break;
			}
		}
		
		//Valida todos los campos del formulario en el envío del formulario
		public function ValidatePHP(){
			//Indicador de error, se convierte en 1 cuando se encuentran errores.
			$errorsExist = 0;
			
			//Limpia el indicador de la sesión de errores
			if(isset($_SESSION['errors'])){
				unset($_SESSION['errors']);
			}
			
			//Por defecto todos los campos son considerados válidos
			$_SESSION['errors']['txtUsername'] = 'hidden';
			$_SESSION['errors']['txtName'] = 'hidden';
			$_SESSION['errors']['selGender'] = 'hidden';
			$_SESSION['errors']['selBthMonth'] = 'hidden';
			$_SESSION['errors']['txtBthDay'] = 'hidden';
			$_SESSION['errors']['txtBthYear'] = 'hidden';
			$_SESSION['errors']['txtEmail'] = 'hidden';
			$_SESSION['errors']['txtPhone'] = 'hidden';
			$_SESSION['errors']['chkReadTerms'] = 'hidden';
			
			//Validación nombre usuario
			if(!$this->validateUserName($_POST['txtUsername'])){
				$_SESSION['errors']['txtUsername'] = 'error';
				$errorsExist = 1;
			}
			
			//Validación nombre
			if(!$this->validateName($_POST['txtName'])){
				$_SESSION['errors']['txtName'] = 'error';
				$errorsExist = 1;
			}
			
			//Validación género
			if(!$this->validateGender($_POST['selGender'])){
				$_SESSION['errors']['selGender'] = 'error';
				$errorsExist = 1;
			}
			
			//Validación mes nacimiento
			if(!$this->validateBirthMonth($_POST['selBthMonth'])){
				$_SESSION['errors']['selBthMonth'] = 'error';
				$errorsExist = 1;
			}
			
			//Validación día nacimiento
			if(!$this->validateBirthDay($_POST['txtBthDay'])){
				$_SESSION['errors']['txtBthDay'] = 'error';
				$errorsExit = 1;
			}
			
			//Validación año nacimiento y fecha
			if(!$this->validateBirthYear($_POST['selBthMonth'].'#'.$_POST['txtBthDay'].'#'.$_POST['txtBthYear'])){
				$_SESSION['errors']['txtBthYear'] = 'error';
				$errorsExist = 1;
			}
			
			//Validación email
			if(!$this->validateEmail($_POST['txtEmail'])){
				$_SESSION['errors']['txtEmail'] = 'error';
				$errorsExit = 1;
			}
			
			//Validación teléfono
			if(!$this->validatePhone($_POST['txtPhone'])){
				$_SESSION['errors']['txtPhone'] = 'error';
				$errorsExist = 1;
			}
			
			//Validación lectura términos
			if(!isset($_POST['chkReadTerms']) || !$this->validateReadTerms($_POST['chkReadTerms'])){
				$_SESSION['errors']['chkReadTerms'] = 'error';
				$_SESSION['values']['chkReadTerms'] = '';
				$errorsExist = 1;
			}
			
			//Si no se han encontrado errores, apunta a una validación correcta de la página
			if($errorsExist == 0){
				return 'allok.php';
			}else{
				//Si son encontrados errores, salva las entradas actuales del usuario
				foreach($_POST as $key => $value){
					$_SESSION['values'][$key] = $_POST[$key];
				}
				return 'index.php';
			}
		}
		
		//Validación nombre usuario(no debe estar vacío, y no debe estar ya registrado)
		private function validateUserName($value){
			
			//Ajusta y escapa el valor de entrada
			$value = $this->mMysqli->real_escape_string(trim($value));
			
			//Nombre de usuario vacío no es válido
			if($value == null){
				return 0;	//No válido
			}
			
			//Comprueba si el nombre de usuario existe en la base de datos
			$query = $this->mMysql->query('select user_name from users '.'where user_name = "'.$value.'"');
			
			if($this->mMysqli->affected_rows > 0){
				return '0';	//No válido
			}else{
				return '1';	//Válido
			}
			
		}
		
		//Validación nombre
		private function validateName($value){
			//Ajusta y escapa el valor de entrada
			$value = trim($value);
			
			//Nombre de usuario vacío no es válido
			if($value){
				return 1;	//Válido
			}else{
				return 0;	//No Válido
			}
		}
		
		//Validación género
		private function validateGender($value){
			//El usuario debe tener un género
			return ($value == '0') ? 0 : 1;
		}
		
		//Validación mes nacimiento
		private function validateBirthMonth($value){
			//Mes no debe ser nulo, y entre 1 y 12
			return ($value == '' || $value > 12 || $value < 1) ? 0: 1;
		}
		
		//Validación día nacimiento
		private function validateBirthDay($value){
			//Día no debe ser nulo, y entre 1 and 31
			return ($value == '' || $value > 31 || $value < 1) ? 0 : 1;			
		}
		
		//Validación año nacimiento y la fecha completa
		public function validateBirthYear($value){
			//Validación año nacimiento está entre 1900 y 2000
			//Obtener fecha completa(dd#mm#yyyy)
			$date = explode('#', $value);
			
			//La fecha no puede ser validada si no hay día, mes o año
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
		
		//Validación email
		private function validateEmail($value){
			//Formatos validación email: *@*.*, *@*.*.*,  *.*@*.*, *@*.*.*)
			return (!eregi('^[_a-z0-9-] + (\.[_a-z0-9-]+)*@[a-z0-9-] + (\.[a-z0-9-]+) * (\.[a-z]{2,3})$',$value)) ? 0 : 1;
		}
		
		//Validación teléfono
		private function validatePhone($value){
			//Formato válido teléfono válido: ##-###-###
			return (!eregi('^[0-9]{3}-*[0-9]{3}-*[0-9]{3}$', $value)) ? 0 : 1;
		}
		
		//Comprobar que el usuario ha leído los términos de uso
		private function validateReadTerms($value){
			//Valor validación es 'true'
			return ($value == 'true' || $value == 'on') ? 1 : 0;
		}
	}
?>

