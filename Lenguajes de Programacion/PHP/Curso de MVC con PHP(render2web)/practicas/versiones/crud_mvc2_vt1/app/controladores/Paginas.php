<?php
    class Paginas extends Controlador{
        
        public function __construct() {
            
        }
        
        public function index(){
            
            $datos = [
                'titulo' => 'Bienvenidos a MVC render2web'
            ];


            //$this->vista('paginas/informacion');
            $this->vista('paginas/inicio', $datos);
        }
        
    }
    