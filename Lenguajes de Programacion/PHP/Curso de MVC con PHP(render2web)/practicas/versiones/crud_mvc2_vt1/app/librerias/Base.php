<?php
    //Clase para conectarse a la base de datos y ejecutar consultas PDO
    class Base{
        private $host = DB_HOST;
        private $usuario = DB_USUARIO;
        private $password = DB_PASSWORD;
        private $nombre_base = DB_NOMBRE;
        
        private $dbh;   //database handler
        private $stmt;  //statement(ejecutar una consulta)
        private $error;
        
        public function __construct() {
            //configurar conexion
            $dsn = 'mysql:host=' . $this->host . ';dbname=' .$this->nombre_base;
            $opciones = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            
            //Crear una instancia de PDO
            try {
                $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
                $this->dbh->exec('set names utf8');
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
        
        //Preparamos la consulta
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }
        
        //Vinculamos la consulta con bind
        public function bind($parametro, $valor, $tipo = null){
            if(is_null($tipo)){
                switch (true){
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                    break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                    break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                    break;
                    default :
                        $tipo = PDO::PARAM_STR;
                    break;
                }
            }
            
            $this->stmt->bindValue($parametro, $valor, $tipo);
        }
        
        //Ejecuta la consulta
        public function execute(){
            return $this->stmt->execute(); //execute() es una funcion de PHP, retorna ese valor como un objeto
        }
        
        //Obtener los registros
        public function registros(){
            $this->execute(); //execute() es una funcion de PHP, retorna ese valor como un objeto
            return $this->stmt->fetchAll(PDO::FETCH_OBJ); 
        }
        
        //Obtener un solo registro
        public function registro(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ); //fetch para retornar un solo objeto 
        }
        
        //Obtener cantidad de filas con el metodo rowCount(rowCount: funcion de PDO-PHP)
        public function rowCount(){
            return $this->stmt->rowCount();
        }
        
    }