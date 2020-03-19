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
        // un constructor es un metodo especial que se carga automaticamente una vez se instancia la clase
        $url = $this->getUrl();
    }

    public function getUrl(){
        echo $_GET['url']; //url: sale de public/.htaccess
        
    }
    
}
