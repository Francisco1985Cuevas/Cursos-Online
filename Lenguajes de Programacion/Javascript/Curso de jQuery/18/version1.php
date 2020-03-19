<?php
error_reporting(E_ALL);

$listaYear = '';
$listaComunidades = '';


include 'class.db.php';
include 'config.php';
$db = new db;

$db->connectdb($host, $user, $pass, $database);

$query = $db->query("SELECT id,comunidad FROM comunidades");
while($data = $db->fetch_array($query)):
$listaComunidades .= '<option value="'.$data['id'].'">'.$data['comunidad'].'</option>
';
endwhile;

for($x=2003;$x<2009;$x++):
$listaYear .= '<option value="'.$x.'">'.$x.'</option>
';
endfor;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Comunidades Aut&oacute;nomas</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="formstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="main">

  <form name="form1" id="form1" method="post" action="resultados.php">
    <fieldset><legend>Comunidades Aut&oacute;nomas</legend>
    <p>Paso 1: Elige Pa&iacute;s (obligatorio)<br />
      <select name="comunidad" id="comunidad">
        <option value="">Elige uno</option>
	  <?=$listaComunidades?>
    </select>
  </p>
  <p>Paso 2: Elige a&ntilde;o<br />
      <select name="year" id="year">
        <option value="">Elige todos los a&ntilde;os </option>
	  <?=$listaYear?>
    </select>
  </p>
  <input type="submit" name="Submit" value="Obtener Datos Poblaci&oacute;n &gt;" />
</fieldset></form>
<p>&nbsp; </p>
</div>
</body>
</html>