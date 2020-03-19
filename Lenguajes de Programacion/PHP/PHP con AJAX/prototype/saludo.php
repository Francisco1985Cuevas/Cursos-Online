<?php
	$nombre = htmlspecialchars($_GET['saludo-nombre']);
	echo utf8_encode ("<p>¡Estás iniciando Sesión,  $nombre!</p>");
?>
