<?php
	//Primero cargar el archivo index_top.php
	require_once('index_top.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>AJAX Practica: Validacion Formulario</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="validate.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="validate.js"></script>
	</head>
	<body onload="setFocus();">
		<fieldset>
			<legend class="txtFormLegend">Formulario Registro Nuevo Usuario</legend>
			<br />
			<form name="frmRegistration" method="post" action="validate.php?validationType=php">
				<!-- Nombre de Usuario -->
				<label for="txtUsername">Elige nombre usuario:</label>
				<input id="txtUsername" name="txtUsername" type="text" onblur="validar(this.value, this.id)" 
					value="<?php echo $_SESSION['values']['txtUsername']; ?>" />
					<!--Estos valores toma la funcion validar, el value y el id de esta etiqueta input-->
					<!--onblur="validar($_SESSION['values']['txtUsername'], txtUsername)"-->
				<span id="txtUsernameFailed" class="<?php echo $_SESSION['errors']['txtUsername']; ?>">
					Este nombre de usuario no esta disponible, o campo nombre de usuario vacio.
				</span>
				<br />
				<!-- Nombre -->
				<label for="txtName">Tu nombre:</label>
				<input id="txtName" name="txtName" type="text" onblur="validar(this.value, this.id);"
					value="<?php echo $_SESSION['values']['txtName']; ?>"/>
				<span id="txtNameFailed" class="<?php echo $_SESSION['errors']['txtName']; ?>">
					Por favor escribe tu nombre.
				</span>
				<br />
				<!--Genero-->
				<label for="selGender">Genero:</label>
				<select name="selGender" id="selGender" onblur="validar(this.value, this.id)">
					<?php
						ConstruirOptions($generoOptions, $_SESSION['values']['selGender']);
					?>
				</select>
				<span id="selGenderFailed" class="<?php echo $_SESSION['errors']['selGender']; ?>">
					Por favor selecciona tu genero.
				</span>
				<br />
				<!-- Fecha Nacimiento -->
				<label for="selBthMonth">Fecha nacimiento:</label>
				<!-- Dia -->
				<input type="text" name="txtBthDay" id="txtBthDay" maxlength="2" size="2" onblur="validar(this.value, this.id)"
					value="<?php echo $_SESSION['values']['txtBthDay']; ?>"/>
					&nbsp;-&nbsp;
				<!-- Mes -->
				<select name="selBthMonth" id="selBthMonth" onblur="validar(this.value, this.id)">
					<?php
						ConstruirOptions($mesOptions, $_SESSION['values']['txtBthMonth']);
					?>
				</select>
				&nbsp;-&nbsp;
				<!-- Año -->
				<input type="text" name="txtBthYear" id="txtBthYear" maxlength="4" size="2"
					onblur="validar(document.getElementById('selBthMonth').options[document.getElementById('selBthMonth').selectedIndex].value+'#'+document.getElementById('txtBthDay').value+'#'+this.value, this.id)"
					value="<?php echo $_SESSION['values']['txtBthYear']; ?>" />
				<!-- Validación Día, Mes y Año -->
				<span id="txtBthDayFailed" class="<?php echo $_SESSION['errors']['txtBthDay']; ?>">
					Escribe tu dia de nacimiento, por favor.
				</span>
				<span id="selBthMonthFailed" class="<?php echo $_SESSION['errors']['selBthMonth']; ?>">
					Selecciona tu mes de nacimiento, por favor.
				</span>
				<span id="txtBthYearFailed" class="<?php echo $_SESSION['errors']['txtBthYear']; ?>">
					Escribe una fecha valida, por favor.
				</span>
				<br />
				<!-- Email -->
				<label for="txtEmail">E-mail:</label>
				<input id="txtEmail" name="txtEmail" type="text" onblur="validar(this.value, this.id)"
					value="<?php echo $_SESSION['values']['txtEmail']; ?>"/>
				<span id="txtEmailFailed" class="<?php echo $_SESSION['errors']['txtEmail']; ?>">
					La direccion e-mail no es valida
				</span>
				<br />
				<!-- Número de Telefono -->
				<label for="txtPhone">Numero de Telefono:</label>
				<input id="txtPhone" name="txtPhone" type="text" onblur="validar(this.value, this.id)"
					value="<?php echo $_SESSION['values']['txtPhone']; ?>"/>
				<span id="txtPhoneFailed" class="<?php echo $_SESSION['errors']['txtPhone']; ?>">
					Por favor inserta un formato de numero de telefono valido(xxx-xxx-xxx).
				</span>
				<br />
				<!-- Checkbox Leer Condiciones -->
				<input type="checkbox" id="chkReadTerms" name="chkReadTerms" class="left" onblur="validar(this.checked, this.id)"
					<?php 
						if($_SESSION['values']['chkReadTerms'] == 'on'){
							echo 'checked="checked"';
						} 
					?>/>
				He leido las condiciones de uso
				<span id="chkReadTermsFailed" class="<?php echo $_SESSION['errors']['chkReadTerms']; ?>">
					Por favor asegurate que has leido las Condiciones de Uso.
				</span>
				
				<!-- Final del formulario -->
				<hr />
				<span class="txtSmall">Nota: Todos los campos son obligatorios.</span>
				<br /><br />
				<input type="submit" name="submitbutton" value="Registrar" class="left buttom" />
				
			</form>
		</fieldset>
	</body>
</html>

