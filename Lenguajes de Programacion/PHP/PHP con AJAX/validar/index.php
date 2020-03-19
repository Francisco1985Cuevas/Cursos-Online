<?php
	require_once ('index_top.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>AJAX Práctica: Validación Formulario</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="validar.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="validar.js"></script>
	</head>
	<body onload="setFocus();">
		<fieldset>
			<legend class="txtFormLegend">Formulario Registro Nuevo Usuario</legend>
			<br />
			<form name="frmRegistration" method="post" action="validar.php?TipoValidacion=php">
				<!-- Nombre Usuario -->
				<label for="usuario">Elige nombre usuario:</label>
				<input id="usuario" name="usuario" type="text" onblur="valida_input(this.value, this.id)" 
					value="<?php echo $_SESSION['values']['usuario']; ?>" />
				<span id="usuarioFailed" class="<?php echo $_SESSION['errors']['usuario']; ?>">
					Este nombre de usuario no está disponible, o campo nombre de usuario vacío.
				</span>
				<br />

				<!-- Nombre -->
				<label for="nombre">Tu nombre:</label>
				<input id="nombre" name="nombre" type="text" onblur="valida_input(this.value, this.id)" 
					value="<?php echo $_SESSION['values']['nombre']; ?>"/>
				<span id="nombreFailed" class="<?php echo $_SESSION['errors']['nombre']; ?>">
					Por favor escribe tu nombre. 
				</span>
				<br />

				<!-- Género -->
				<label for="select_Genero">Género:</label>
				<select name="select_Genero" id="select_Genero" onblur="valida_input(this.value, this.id)">
					<?php ConstruirOptions($generoOptions, $_SESSION['values']['select_Genero']); ?>
				</select>
				<span id="select_GeneroFailed" class="<?php echo $_SESSION['errors']['select_Genero']; ?>">
					Por favor selecciona tu género. 
				</span>
				<br />

				<!-- Fecha Nacimiento -->
				<label for="selBthMonth">Fecha nacimiento:</label>
				<!-- Día -->
				<input type="text" name="txtBthDay" id="txtBthDay" maxlength="2" size="2" onblur="valida_input(this.value, this.id)" 
					value="<?php echo $_SESSION['values']['txtBthDay']; ?>" />

				&nbsp;-&nbsp;        
				<!-- Mes -->
				<select name="selBthMonth" id="selBthMonth" onblur="valida_input(this.value, this.id)">
					<?php ConstruirOptions($mesesOptions, $_SESSION['values']['selBthMonth']); ?>
				</select>
				&nbsp;-&nbsp;
				<!-- Año -->
				<input type="text" name="txtBthYear" id="txtBthYear" maxlength="4" size="2" 
					onblur="valida_input(document.getElementById('selBthMonth').options[document.getElementById('selBthMonth').selectedIndex].value + '#' + document.getElementById('txtBthDay').value + '#' + this.value, this.id)" 
					value="<?php echo $_SESSION['values']['txtBthYear']; ?>" />

				<!-- Validación Día, Mes y Año -->
				<span id="txtBthDayFailed" class="<?php echo $_SESSION['errors']['txtBthDay']; ?>">
					Escribe tu día de nacimiento, por favor. 
				</span>
				<span id="selBthMonthFailed" class="<?php echo $_SESSION['errors']['selBthMonth']; ?>">
					Selecciona tu mes de nacimiento, por favor. 
				</span>
				<span id="txtBthYearFailed" class="<?php echo $_SESSION['errors']['txtBthYear']; ?>">
					Escribe una Fecha válida, por favor. 
				</span>
				<br />

				<!-- Email -->
				<label for="email">E-mail:</label>
				<input id="email" name="email" type="text" onblur="valida_input(this.value, this.id)" 
					value="<?php echo $_SESSION['values']['email']; ?>" />
				<span id="emailFailed" class="<?php echo $_SESSION['errors']['email']; ?>">
					La dirección e-mail no es válida.
				</span>
				<br />

				<!-- Número Teléfono -->
				<label for="telefono">número de Teléfono:</label>
				<input id="telefono" name="telefono" type="text" onblur="valida_input(this.value, this.id)" 
					value="<?php echo $_SESSION['values']['telefono']; ?>" />
				<span id="telefonoFailed" class="<?php echo $_SESSION['errors']['telefono']; ?>">
					Por favor inserta un formato de número de teléfono válido (xxx-xxx-xxx). 
				</span>
				<br />

				<!-- Checkbox Leer Condiciones -->
				<input type="checkbox" id="chk_Condiciones" name="chk_Condiciones" class="left" 
					onblur="valida_input(this.checked, this.id)" 
					<?php 
						if($_SESSION['values']['chk_Condiciones'] == 'on'){ 
							echo 'checked="checked"';
						}
					?>/> 
					He leído las Condiciones de Uso
				<span id="chk_CondicionesFailed" class="<?php echo $_SESSION['errors']['chk_Condiciones']; ?>">
					Por favor asegúrate que has leído las Condiciones de Uso. 
				</span>

				<!-- Final del Formulario -->
				<hr />
				<span class="txtPequenho">Nota: Todos los campos son obligatorios.</span>
				<br /><br />
				<input type="submit" name="submitbutton" value="Registrar" class="left boton" />
			</form>
		</fieldset>
	</body>
</html>
