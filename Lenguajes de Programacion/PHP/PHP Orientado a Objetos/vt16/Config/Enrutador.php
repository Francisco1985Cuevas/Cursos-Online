<?php
	namespace Config;
	
	//Este archivo seria el bootstrap en un MVC, para el ejemplo se llama Enrutador.
	
	class Enrutador
	{
		public static run(Request $request)
		{
			$controlador = $request::getControlador()."Controller";
			$ruta = ROOT . "Controllers" . DS .$controlador. ".php";
			//print $ruta;
			$metodo = $request->getMetodo();
			
			if($metodo == "index.php")
			{
				$metodo = "index";
			}
			
			
			
			$argumento = $request->getArgumento();
			
			if( is_readable($ruta) ){
				require_once $ruta;
				$mostrar = "Controllers\\".$controlador;
				$controlador = new $mostrar;
				
				if(!isset($argumento)){
					call_user_func(array($controlador, $metodo));
				}else{
					call_user_func(array($controlador, $metodo), $argumento);
				}
				
			}
			
		}
		
	}
?>