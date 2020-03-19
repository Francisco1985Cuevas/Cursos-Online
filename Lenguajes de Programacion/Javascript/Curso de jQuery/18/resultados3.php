<?php
	if(!isset($_POST['ajax']) || $_POST['ajax'] != '1') 
		@(include 'header.php');

	if(!empty($_POST)):
		if(isset($_POST['crecimiento']) && $_POST['crecimiento'] != ''):
			/****************
			Sanear los datos
			***************/
			$crecimientoSeguro = (int)$_POST['crecimiento'];

			/**************
			Conectar a db
			**************/
			@(include 'class.db.php') or die('db class no encontrada');
			@(include 'config.php') or die('archivo configuración no encontrado');
			$db = new db;
			$db->connectdb($host, $user, $pass, $database);
			/********/

			$query = $db->query("SELECT comunidad FROM comunidades WHERE growth >= '$crecimientoSeguro'");
			$rows = mysql_num_rows($query);
			
			if($rows == 0):
				echo 'No se ha encontrado información. Elija otro valor.';

			else:
				echo '<h3>'.$rows.' comunidades con crecimiento mayor que '.$crecimientoSeguro.'%</h3>';
			
				while($d = $db->fetch_array($query)):
					echo '<p>'.$d['comunidad'].'</p>';
				endwhile;
			endif;//rows > 0
		else:
			echo 'Información de crecimiento no recibido<br />';

		endif;//comunidad no enviada
	else:
		echo 'No se han recibido datos';
	endif;

	if(!isset($_POST['ajax']) || $_POST['ajax'] != '1') 
		@(include 'footer.php');
?>