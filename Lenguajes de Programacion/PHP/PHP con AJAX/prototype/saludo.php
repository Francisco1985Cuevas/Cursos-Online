<?php
	$nombre = htmlspecialchars($_GET['saludo-nombre']);
	echo utf8_encode ("<p>�Est�s iniciando Sesi�n,  $nombre!</p>");
?>
