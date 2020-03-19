<?php
	// carga el archivo de configuración
	require_once('config.php');

	// inicia sesión
	session_start();

	// incluye funcionalidad para manipular la lista de productos 
	class Grid{      
		// cuenta páginas parrilla
		public $mTotalPages;
		
		// cuenta items parrilla
		public $mItemsCount;
		
		// índice de la página a devolver
		public $mReturnedPage;    
		
		// gestor base datos
		private $mMysqli;
		
		// gestor parrilla
		private $grid;
  
		// constructor de clase
		function __construct(){   
			// crea la conexión MySQL
			$this->mMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		
			// llama a countAllRecords para obtener el número de registros de la parrilla
			$this->mItemsCount = $this->countAllRecords();
		}

		// destructor de clase, cierra la conexión a la base de datos  
		function __destruct(){
			$this->mMysqli->close();
		}
		
		// lee una página de productos y los salva a $this->grid
		public function readPage($page){
			// crea la consulta SQL que devuelve una página de productos
			$queryString = $this->createSubpageQuery('SELECT * FROM product', $page);

			// ejecuta la consulta
			if($result = $this->mMysqli->query($queryString)){
				// obtiene un array asociativo 
				while ($row = $result->fetch_assoc()){
					// construye la estructura XML conteniendo productos
					$this->grid .= '<row>';
					foreach($row as $name=>$val)
						$this->grid .= '<' . $name . '>' . 
						htmlspecialchars($val).'</'.$name.'>';
						$this->grid .= '</row>';   
				}
				
				// cierra el stream de resultados                    
				$result->close();
			}       
		}

		// actualiza un producto
		public function updateRecord($id, $on_promotion, $price, $name){
			// escapa los datos introducidos para usarlos de modo seguro en declaraciones SQL
			$id = $this->mMysqli->real_escape_string($id);
			$on_promotion = $this->mMysqli->real_escape_string($on_promotion);
			$price = $this->mMysqli->real_escape_string($price);
			$name = $this->mMysqli->real_escape_string($name);
			
			// construye una consulta SQL que actualiza un registro de producto
			$queryString =  'UPDATE product SET name="'.$name.'", '.'price='.$price.','.'on_promotion='.$on_promotion.' WHERE product_id='.$id;
			// ejecuta el comando SQL      
			$this->mMysqli->query($queryString);  
		}

		// devuelve datos sobre la consulta actual (númro de páginas parrilla, etc)
		public function getParamsXML(){ 
			// calcula el número de páginas previas
			$previous_page = ($this->mReturnedPage == 1) ? '' : $this->mReturnedPage-1;    
			
			// calcula el número de páginas siguientes
			$next_page = ($this->mTotalPages == $this->mReturnedPage) ? '' : $this->mReturnedPage + 1; 
			
			// devuelve los parámetros
			return '<params>'.
				'<returned_page>'.$this->mReturnedPage.'</returned_page>'.
				'<total_pages>'.$this->mTotalPages.'</total_pages>'.
				'<items_count>'.$this->mItemsCount.'</items_count>'.
				'<previous_page>'.$previous_page.'</previous_page>'.
				'<next_page>'.$next_page.'</next_page>'.
			'</params>';
		}

		// devuelve la parrilla de página actual en formato XML
		public function getGridXML(){
			return '<grid>'.$this->grid.'</grid>';
		} 

		// devuelve el número total de registros para la parrilla
		private function countAllRecords(){
			/* si la cuenta de registros no está ya guardada en la sesión, lee el valor de la base de datos */

			if(!isset($_SESSION['record_count'])){
				// la consulta que devuelve la cuenta de registros
				$count_query = 'SELECT COUNT(*) FROM product';
				// ejecuta la consulta y recoge los resultados 
				if($result = $this->mMysqli->query($count_query)){
					// recupera la primera fila devuelta
					$row = $result->fetch_row(); 
					/* recupera la primera columna de la primera fila(representa la 
						cuenta de registros que estamos buscando), y salva su valor en 
						la sesión */
					$_SESSION['record_count'] = $row[0];
					// cierra el gestor de la base de datos
					$result->close();
				}
			}    
			
			// lee la cuenta de registros de la sesión y lo devuelve
			return $_SESSION['record_count'];
		}         
  
		// recibe una consulta SELECT que devuelve todos los productos y los modifica
		// para devolver sólo una página de productos
		private function createSubpageQuery($queryString, $pageNo){
			// si tenemos pocos productos entonces no implementamos la paginación  
			if($this->mItemsCount <= ROWS_PER_VIEW){
				$pageNo = 1;
				$this->mTotalPages = 1;
			}else{
				// o bien calculamos el número de páginas y construimos una nueva consulta SELECT
				$this->mTotalPages = ceil($this->mItemsCount / ROWS_PER_VIEW);
				$start_page = ($pageNo - 1) * ROWS_PER_VIEW;   
				$queryString .= ' LIMIT ' . $start_page . ',' . ROWS_PER_VIEW;
			}
			
			// salvamos el número de la página devuelta
			$this->mReturnedPage = $pageNo;
			
			// devolvemos el nuevo string de consulta
			return $queryString;
		} 
		
		// finaliza la clase Grid
	} 
?>
