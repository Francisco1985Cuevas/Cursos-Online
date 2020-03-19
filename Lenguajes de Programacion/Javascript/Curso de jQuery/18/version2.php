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
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
</head>

<body>
<div id="main">

  <form name="formComunidad" id="formComunidad" method="post" action="resultados2.php">
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
<div id="loading">
<img src="loading4.gif" border="0" />
</div>
<div id="divDestino"></div>
</div>
<script>
// prepara el formulario cuando el DOM está preparado 
$(document).ready(function() { 
    var options = { 
        target:        '#divDestino', // elemento destino que se actualizará 
        beforeSubmit:  showRequest,  //  respuesta antes de llamarpre-submit callback 
        success:       showResponse  //  respuesta después de llamar 
 
        // otras opciones disponibles: 
        //url:       url         //  sobreescribe el atributo 'action' del formulario 
        //type:      type        // 'get' or 'post', sobrescribe el atributo 'method' del formulario 
        //dateType:  null        // 'xml', 'script', o 'json' (ver jquery.form.js para documentación) 
        //clearForm: true        // limpia todos los campos de texto después de haber sido enviado correctamente 
        //resetForm: true        // reinicia el formulario después de ser enviado correctamente 
    }; 
 
    // vincular formulario usando 'ajaxForm' 
    $('#formComunidad').ajaxForm(options); 
}); 
 
// respuesta antes de envío 
function showRequest(formData, jqForm) { 
    // formData es un array; aquí usamos $.param para convertirlo a un string para mostrarlo 
    // pero el plugin form hace esto por ti automáticamente cuando envia los datos 
 
    // jqForm es un objeto jQuery que encapsula el elemento del formulario. Para acceder al 
    // elemento DOM para el formulario hacer esto: 
    // var formElement = jqForm[0]; 
 var extra = [ { name: 'ajax', value: '1' }];
 $.merge( formData, extra)
   /*  alert('About to submit: \n\n' + $.param(formData));*/
 
    // aquí podríamos devolver falso para impedir que el formulario sea enviado 
    return true;  
} 
 
// respuesta después de envío 
function showResponse(responseText, statusText)  { 
   /* alert('status: ' + statusText + '\n\nresponseText: \n' + 
        responseText + '\n\nThe output div should have already been updated with the responseText.'); */
} 

 $("#loading img").ajaxStart(function(){
   $(this).show();
 }).ajaxStop(function(){
   $(this).hide();
 });
</script>
</body>
</html>