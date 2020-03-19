<?php
    /*
    Mapear la url ingresada en el navegador, 
    1-controlador
    2-método(funcion)
    3-Parámetro
    Ejemplo: /articulos/actualizar/4 
    */

class Core{
    protected $controladorActual = 'paginas';
    protected $metodoActual = 'index';
    protected $parametros = [];
    
    //constructor
    public function __construct() {
        //print_r($this->getUrl());
        
        // un constructor es un metodo especial que se carga automaticamente una vez se instancia la clase
        $url = $this->getUrl();
        
        //buscar en controladores si el controlador existe
        if(file_exists('../app/controladores/'.  ucwords($url[0]).'.php')){
            //si existe se setea como controlador por defecto
            $this->controladorActual = ucwords($url[0]);
            
            //unset indice
            unset($url[0]); 
        }
        
        //requerir el controlador
        require_once '../app/controladores/'.$this->controladorActual.'.php';
        $this->controladorActual = new $this->controladorActual;
        
    }

    public function getUrl(){
        //echo $_GET['url']; //url: sale de public/.htaccess
        
        if(isset($_GET['url'])){
           $url = rtrim($_GET['url'], '/');
           $url = filter_var($url, FILTER_SANITIZE_URL);
           $url = explode('/', $url);
           
           return $url;
        }
    }
    
}
