<?php
  // borrar todos los datos salvados en la sesión
  session_start();
  session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validación Formulario AJAX</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="validar.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		¡Registro Correcto!<br />
		<a href="index.php" title="Volver">&lt;&lt; Volver</a>
	</body>
</html>
