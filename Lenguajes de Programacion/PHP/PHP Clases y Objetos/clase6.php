<?php
	//Definir una clase y darle un nombre.
	class nombreClase{
	
		//Declarar los Atributos o variables de la clase.
		var $atributo;
		
		//Metodos o Funciónes
		function get_atributo(){
			//Esta función devuelve el valor que contiene el atributo o variable... en este caso tambien llamado atributo.
			return $this->atributo;
		}
		
		function set_atributo($nuevoValor){
			//Esta función me permite asignar,configurar o modificar este atributo o valor para esta clase.
			//En este ejemplo se muestra el uso de un condicional dentro de esta funcion.
			if($nuevoValor >= 0 && $nuevoValor <= 100){
				$this->atributo = $nuevoValor;
			}
		}
	}
	
	//Instancias, Crear un objeto, En este caso ejemplo es el objeto, y al objeto ejemplo le son aplicables todas las propiedades
	//y los metodos de esta clase.
	$ejemplo = new nombreClase();
	
	//Ahora para referirnos a alguna operacion o propiedad de esta clase
	$ejemplo->set_atributo(20);
	echo $ejemplo->get_atributo();
?>