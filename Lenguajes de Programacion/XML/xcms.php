<?php
	//SimpleCMS
	//Sistema CMS Extremadamente simple.
	//Para el curso de creacion de aplicaciones dinamicas web con PHP y MySQL.
	$theXML = $_GET["theXML"];
	
	if(empty($theXML)){
		$theXML = "main.xml";
	}	//fin if
	//abrir archivo xml
	
	$xml = simplexml_load_file($theXML);
	
	if(!$xml){
		echo "Problema al abrir el archivo xml";
	}else{
		include($xml->css);
		include($xml->top);
		echo '<span class="menuPanel">';
		include($xml->menu);
		echo '</span>';
		
		echo '<span class="item">';
		include($xml->content);
		echo "</span>";
	}	//end if
	
?>