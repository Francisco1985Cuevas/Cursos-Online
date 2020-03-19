<?php
	$receta = simplexml_load_file("ejemplo_xml3.xml");
	
	$ingredientes = $receta->ingredientes;
	
	$instrucciones = $receta->instrucciones;
	
	$porciones = $receta->porciones;
	
	foreach($ingredientes as $ingrediente){
		print "<p><b><font color=red>Ingrediente:</font></b> $ingrediente";
	}
	
	print "<p><b>Instrucciones:</b> $instrucciones";
	
	print "<p><b>Porciones:</b> $porciones";
	
?>
