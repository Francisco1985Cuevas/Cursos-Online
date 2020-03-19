<?php
	/*Recuperar la informacion del metatad que el usuario escriba en un campo de texto*/
	/*Metatag: Informacion que hace referencia a aquello con lo que se relaciona la pagina*/
	$tags = @get_meta_tags('http://'.$url);
	$result = $tags['keywords'];
	
	if(strlen($result) > 0){
		echo utf8_encode($result);
	}else{
		echo "No disponible metatag keywords";
	}
?>

