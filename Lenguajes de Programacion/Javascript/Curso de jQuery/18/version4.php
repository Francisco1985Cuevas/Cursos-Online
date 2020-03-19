<?php
	for($x = 5;$x < 55;$x = $x+5):
		$listaCrecimiento .= '<option value="'.$x.'">Mayor que '.$x.'% incremento</option>';
	endfor;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Comunidades Autónomas</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style1.css" rel="stylesheet" type="text/css" />
		<link href="formstyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	</head>
	<body>
		<div id="principal">
			<form name="formComunidad" id="formComunidad" method="post" action="resultados3.php">
				<fieldset>
					<legend>Comunidades Aut&oacute;nomas</legend>
					<p>
						Paso 1: Elige % Crecimiento<br />
						<select name="crecimiento" id="crecimiento">
							<option value="">Elige Uno</option>
							<?=$listaCrecimiento?>
						</select>
					</p>
					<input type="submit" name="Submit" value="Obtener Detalles &gt;" />
				</fieldset>
				<div id="loading"><img src="loading4.gif" border="0" /></div>
			</form>
		</div>
		<script>
			// prepara el formulario cuando el DOM está preparado 
			$(document).ready(function(){
				$('form#formComunidad fieldset').append('<div id="divDestino"></div>').find('select#crecimiento').change(function(){
					$.ajax({
						type: "POST",
						url: "contadorFilas.php",
						data: "crecimiento="+this.value,	/*El valor que tiene en ese momento el formulario*/
						success: function(msg){	/*En caso de suceso de exito*/
							$('div#divDestino').html(' ').append('<p>'+msg+'</p>');
						}
					});
				});
			}); 
			
			//Loading mientras se esta cargando la pagina...
			$("#loading img").ajaxStart(function(){
				$(this).show();
			}).ajaxStop(function(){
				$(this).hide();
			});
		</script>
	</body>
</html>
