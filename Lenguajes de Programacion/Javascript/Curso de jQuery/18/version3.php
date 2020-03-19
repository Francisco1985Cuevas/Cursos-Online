<?php
	$listaCrecimiento = '';
	for($x = 5;$x < 55;$x = $x+5){
		$listaCrecimiento .= '<option value="'.$x.'">Mayor que '.$x.'% incremento</option>';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Comunidades Aut&oacute;nomas</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style1.css" rel="stylesheet" type="text/css" />
		<link href="formstyle.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="main">
			<form name="form1" id="form1" method="post" action="resultados3.php">
				<fieldset>
					<legend>Comunidades Aut&oacute;nomas</legend>
					<p>
						Paso 1: Elige el porcentaje Crecimiento Poblaci&oacute;n
						<br />
						<select name="crecimiento" id="crecimiento">
							<option value="">Elige Uno</option>
							<?php echo $listaCrecimiento; ?>
						</select>
					</p>
					<p>&nbsp;</p>
					<input type="submit" name="Submit" value="Obtener Datos Poblaci&oacute;n &gt;" />
				</fieldset>
			</form>
			<p>&nbsp;</p>
		</div>
	</body>
</html>