<?php
	if(!empty($_POST)):
		if(isset($_POST['crecimiento']) && $_POST['crecimiento'] != ''):
			/****************
			Asegurar los datos
			***************/
			$crecimientoSeguro = (int)$_POST['crecimiento'];
			
			/**************
			Conectar a db
			**************/
			@(include 'class.db.php') or die('Clase db no encontrada');
			@(include 'config.php') or die('Archivo de configuraci&oacute;n no encontrado');
			$db = new db;
			$db->connectdb($host, $user, $pass, $database);
			/********/

			$query = $db->query("SELECT comunidad FROM comunidades WHERE growth >= '$crecimientoSeguro'");
			$rows = mysql_num_rows($query);
			if($rows == 0):
				echo 'No se ha encontrado informaci&oacute;n. Env&iacute;e otro valor.';
			else:
				echo $rows.' Pa&iacute;ses con crecimiento mayor de '.$crecimientoSeguro.'%';
			endif;//rows > 0
		else:
			echo 'Informaci&oacute;n sobre crecimiento no recibida<br />';
		endif;//comunidad no enviada
	else:
		echo 'No se han recibido datos';
	endif;
	
?>
