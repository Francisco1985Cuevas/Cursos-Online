<?php
	/*
	Creacion de los modelos de la aplicacion
	*/
	
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__))  DS)
	
	require_once "Config/Autoload.php";
	
	Config\Autoload::run();
	//new Config\Request();
	Config\Enrutador::run(new Config\Request());
	
?>