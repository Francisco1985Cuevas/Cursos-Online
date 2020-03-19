<?php
    class Paginas extends Controlador{
        
        public function __construct() {
            $this->articuloModelo = $this->modelo('Articulo'); //accedemos al modelo Articulo y podemos usar sus metodos
            //echo 'Controlador paginas cargado';
        }
        
        public function index(){
            
            $articulos = $this->articuloModelo->obtenerArticulos();
            
            //$datos = [
            //    'titulo' => 'Bienvenidos a MVC render2web'
            //];
            $datos = [
                'titulo' => 'Bienvenidos a MVC render2web',
                'articulos' => $articulos
            ];


            //$this->vista('paginas/informacion');
            $this->vista('paginas/inicio', $datos);
        }
        
        public function articulo(){
            //$this->vista('paginas/inicio');
            //$this->vista('paginas/articulo');
        }
        
        public function actualizar($num_registro){
            echo $num_registro;
        }
    }
    