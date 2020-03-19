<html>
	<head>
		<title>Ejemplo Envio de Datos</title>
	</head>
	<body>
		<h2>Datos Recibidos</h2>
		<?php 
			if($_GET["nombre"]){
				echo "Este dato se recibio con el Metodo GET";
			}
			
			if($_POST["nombre"]){
				echo "Este dato se recibio con el Metodo POST";
			}
		?>
		<br /><a href="ejemplo_ajx2.html">Volver</a>
	</body>
</html>
