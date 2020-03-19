<?php
if(!isset($_POST['ajax']) || $_POST['ajax'] != '1') @(include 'header.php');

if(!empty($_POST)):
if(isset($_POST['comunidad']) && $_POST['comunidad'] != ''):
/****************
Esterilizar los datos
***************/
$comunidadSeguro = (int)$_POST['comunidad'];
/**************
Conectar a la base de datos
**************/
@(include 'class.db.php') or die('db class no encontrada');
@(include 'config.php') or die('archivo configuración no encontrado');
$db = new db;

$db->connectdb($host, $user, $pass, $database);
/*****/
if(isset($_POST['year']) && $_POST['year'] != ''):


/****************
Esterilizar los datos
***************/
$yearSeguro = (int)$_POST['year'];

/*************/

$query = $db->query("SELECT * FROM comunidades WHERE id = '$comunidadSeguro'");
if(mysql_num_rows($query) != 1):
echo 'No se ha encontrado informaci&oacute;n. Por favor, vuelva al formulario.';

else:
$d = $db->fetch_array($query);

echo '<h3>'.$yearSeguro.' poblaci&oacute;n para '.$d['comunidad'].'</h3>';
echo '<p>'.$d[$yearSeguro].'</p>';
endif;//rows == 1
else:
//Mostrar todos los años de una comunidad

$query = $db->query("SELECT * FROM comunidades WHERE id = '$comunidadSeguro'");
if(mysql_num_rows($query) != 1):
echo 'No se ha encontrado informaci&oacute;n. Por favor, vuelva al formulario.';

else:
$d = $db->fetch_array($query);
echo '<h3>Poblaci&oacute;n de todos los a&ntilde;os para '.$d['comunidad'].'</h3>';
for($x=2003;$x<2009;$x++):
echo '<p>'.$x.' &raquo; '.$d[$x].'</p>
';
endfor;
endif;//rows == 1

endif;//año no enviado
else:
echo 'no se ha recibido informaci&oacute;n de la comunidad<br />';

endif;//comunidad no enviada

else:
echo 'No se han recibido datos';
endif;

if(!isset($_POST['ajax']) || $_POST['ajax'] != '1') @(include 'footer.php');
?>