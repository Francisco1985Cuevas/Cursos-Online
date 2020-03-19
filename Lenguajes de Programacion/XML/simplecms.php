<!DOCTYPE html>
<?php
	//SimpleCMS
	//Sistema CMS Extremadamente simple
	//Para el curso de creación de aplicaciones dinámicas web con PHP y MySQL.
	
	if(empty($menu)){
		$menu = "menu.html";
	}	//end if
	
	if(empty($content)){
		$content = "default.html";
	}	//end if
	
	include("menuLeft.css");
	include("top.html");
	print "<span class=\"menuPanel\">\n";
	include($menu);
	print "</span>\n";
	include($content);
	print "</span>\n";
?>
</body>
</html>
