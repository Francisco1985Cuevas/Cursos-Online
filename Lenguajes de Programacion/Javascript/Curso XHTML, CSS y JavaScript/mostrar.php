<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>Mostrar Datos</title>
	</head>
	<body>
		<?php
			echo "Estos son tus datos.<br />";
			echo "Tu Nombre es: ".$_POST["camponombre"]."<br />";
			echo "Tu Direccion es: ".$_POST["campodireccion"]."<br />";
		?>
	</body>
</html>