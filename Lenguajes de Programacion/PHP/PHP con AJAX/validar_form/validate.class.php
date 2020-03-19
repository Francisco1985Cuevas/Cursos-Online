<?php
	//Carga manejador de error y configuraci�n base datos
	require_once('config.php');
	
	//Clase admite validaci�n formulario web PHP y AJAX
	class Validate{
		//Almacena conexi�n a la base de datos
		private $mMysqli;
		
		//Constructor abre conexi�n  a la base de datos
		function __construct(){
			$this->mMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		}
		
		//Destructor cierra conexi�n a la base de datos
		function __destruct(){
			$this->mMysqli->close();
		}
		
		//Soporte validaci�n AJAX, verifica un valor simple
		public function ValidateAJAX($inputValue, $fieldID){
			//Comprueba que campo est� siendo validado y ejecuta la validaci�n
			switch($fieldID){
				//Comprueba si el nombre de usuario es v�lido
				case 'txtUsername':
					return $this->validateUserName($inputValue);
					break;
				//Comprueba si el nombre es v�lido
				case 'txtName':
					return $this->validateName($inputValue);
					break;
				//Comprueba si se ha seleccionado un g�nero
				case 'selGender':
					return $this->validateGender($inputValue);
					break;
				//Comprueba si el mes de nacimiento es v�lido
				case 'selBthMonth':
					return $this->validateBirthMonth($inputValue);
					break;
				//Comprueba si el d�a de nacimiento es v�lido
				case 'txtBthDay':
					return $this->validateBirthYear($inputValue);
					break;
				//Comprueba si el a�o de nacimiento es v�lido
				case 'txtBthYear':
					return $this->validateBirthYear($inputValue);
					break;
				//Comprueba si el email es v�lido
				case 'txtEmail':
					return $this->validateEmail($inputValue);
					break;
				//Comprueba si el tel�fono es v�lido
				case 'txtPhone':
					return $this->validatePhone($inputValue);
					break;
				//Comprueba si se ha marcado la checkbox "He le�do los t�rminos"
				case 'chkReadTerms':
					return $this->validateReadTerms($inputValue);
					break;
			}
		}
		
		//Valida todos los campos del formulario en el env�o del formulario
		public function ValidatePHP(){
			//Indicador de error, se convierte en 1 cuando se encuentran errores.
			$errorsExist = 0;
			
			//Limpia el indicador de la sesi�n de errores
			if(isset($_SESSION['errors'])){
				unset($_SESSION['errors']);
			}
			
			//Por defecto todos los campos son considerados v�lidos
			$_SESSION['errors']['txtUsername'] = 'hidden';
			$_SESSION['errors']['txtName'] = 'hidden';
			$_SESSION['errors']['selGender'] = 'hidden';
			$_SESSION['errors']['selBthMonth'] = 'hidden';
			$_SESSION['errors']['txtBthDay'] = 'hidden';
			$_SESSION['errors']['txtBthYear'] = 'hidden';
			$_SESSION['errors']['txtEmail'] = 'hidden';
			$_SESSION['errors']['txtPhone'] = 'hidden';
			$_SESSION['errors']['chkReadTerms'] = 'hidden';
			
			//Validaci�n nombre usuario
			if(!$this->validateUserName($_POST['txtUsername'])){
				$_SESSION['errors']['txtUsername'] = 'error';
				$errorsExist = 1;
			}
			
			//Validaci�n nombre
			if(!$this->validateName($_POST['txtName'])){
				$_SESSION['errors']['txtName'] = 'error';
				$errorsExist = 1;
			}
			
			//Validaci�n g�nero
			if(!$this->validateGender($_POST['selGender'])){
				$_SESSION['errors']['selGender'] = 'error';
				$errorsExist = 1;
			}
			
			//Validaci�n mes nacimiento
			if(!$this->validateBirthMonth($_POST['selBthMonth'])){
				$_SESSION['errors']['selBthMonth'] = 'error';
				$errorsExist = 1;
			}
			
			//Validaci�n d�a nacimiento
			if(!$this->validateBirthDay($_POST['txtBthDay'])){
				$_SESSION['errors']['txtBthDay'] = 'error';
				$errorsExit = 1;
			}
			
			//Validaci�n a�o nacimiento y fecha
			if(!$this->validateBirthYear($_POST['selBthMonth'].'#'.$_POST['txtBthDay'].'#'.$_POST['txtBthYear'])){
				$_SESSION['errors']['txtBthYear'] = 'error';
				$errorsExist = 1;
			}
			
			//Validaci�n email
			if(!$this->validateEmail($_POST['txtEmail'])){
				$_SESSION['errors']['txtEmail'] = 'error';
				$errorsExit = 1;
			}
			
			//Validaci�n tel�fono
			if(!$this->validatePhone($_POST['txtPhone'])){
				$_SESSION['errors']['txtPhone'] = 'error';
				$errorsExist = 1;
			}
			
			//Validaci�n lectura t�rminos
			if(!isset($_POST['chkReadTerms']) || !$this->validateReadTerms($_POST['chkReadTerms'])){
				$_SESSION['errors']['chkReadTerms'] = 'error';
				$_SESSION['values']['chkReadTerms'] = '';
				$errorsExist = 1;
			}
			
			//Si no se han encontrado errores, apunta a una validaci�n correcta de la p�gina
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
		
		//Validaci�n nombre usuario(no debe estar vac�o, y no debe estar ya registrado)
		private function validateUserName($value){
			
			//Ajusta y escapa el valor de entrada
			$value = $this->mMysqli->real_escape_string(trim($value));
			
			//Nombre de usuario vac�o no es v�lido
			if($value == null){
				return 0;	//No v�lido
			}
			
			//Comprueba si el nombre de usuario existe en la base de datos
			$query = $this->mMysql->query('select user_name from users '.'where user_name = "'.$value.'"');
			
			if($this->mMysqli->affected_rows > 0){
				return '0';	//No v�lido
			}else{
				return '1';	//V�lido
			}
			
		}
		
		//Validaci�n nombre
		private function validateName($value){
			//Ajusta y escapa el valor de entrada
			$value = trim($value);
			
			//Nombre de usuario vac�o no es v�lido
			if($value){
				return 1;	//V�lido
			}else{
				return 0;	//No V�lido
			}
		}
		
		//Validaci�n g�nero
		private function validateGender($value){
			//El usuario debe tener un g�nero
			return ($value == '0') ? 0 : 1;
		}
		
		//Validaci�n mes nacimiento
		private function validateBirthMonth($value){
			//Mes no debe ser nulo, y entre 1 y 12
			return ($value == '' || $value > 12 || $value < 1) ? 0: 1;
		}
		
		//Validaci�n d�a nacimiento
		private function validateBirthDay($value){
			//D�a no debe ser nulo, y entre 1 and 31
			return ($value == '' || $value > 31 || $value < 1) ? 0 : 1;			
		}
		
		//Validaci�n a�o nacimiento y la fecha completa
		public function validateBirthYear($value){
			//Validaci�n a�o nacimiento est� entre 1900 y 2000
			//Obtener fecha completa(dd#mm#yyyy)
			$date = explode('#', $value);
			
			//La fecha no puede ser validada si no hay d�a, mes o a�o
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
		
		//Validaci�n email
		private function validateEmail($value){
			//Formatos validaci�n email: *@*.*, *@*.*.*,  *.*@*.*, *@*.*.*)
			return (!eregi('^[_a-z0-9-] + (\.[_a-z0-9-]+)*@[a-z0-9-] + (\.[a-z0-9-]+) * (\.[a-z]{2,3})$',$value)) ? 0 : 1;
		}
		
		//Validaci�n tel�fono
		private function validatePhone($value){
			//Formato v�lido tel�fono v�lido: ##-###-###
			return (!eregi('^[0-9]{3}-*[0-9]{3}-*[0-9]{3}$', $value)) ? 0 : 1;
		}
		
		//Comprobar que el usuario ha le�do los t�rminos de uso
		private function validateReadTerms($value){
			//Valor validaci�n es 'true'
			return ($value == 'true' || $value == 'on') ? 1 : 0;
		}
	}
?>

