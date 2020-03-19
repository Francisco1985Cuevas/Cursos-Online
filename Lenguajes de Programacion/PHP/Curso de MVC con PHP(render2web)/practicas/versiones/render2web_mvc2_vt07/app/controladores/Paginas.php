<?php
    class Paginas extends Controlador{
        
        public function __construct() {
            //echo 'Controlador paginas cargado';
        }
        
        public function index(){
            //$this->vista('paginas/informacion');
            $this->vista('paginas/inicio');
        }
        
        public function articulo(){
            
        }
        
        public function actualizar($num_registro){
            echo $num_registro;
        }
    }