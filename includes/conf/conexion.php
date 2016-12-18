<?php
	require_once ('db.php');
	class Conexion extends PDO{ 
   		private $tipo_de_base    = 'mysql';          /**< Indica el tipo de motor de datos */
   		private $host            = 'localhost';      /**< Indica el host */
   		private $nombre_de_base = 'icap';            /**< Indica el nombre de la base de datos */
   		private $usuario         = 'root';           /**< Indica el nombre de usuario de la base de datos */
   		private $contrasena      = '';       /**< Indica la contraseña de usuario de la base de datos */
   		/**
     	* @brief crea la conexión PDO.
    	*/  
   		public function __CONSTRUCT() {
			try{
				parent::__CONSTRUCT($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);			
			}catch(PDOException $e){
				echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
				exit;
			}
   		} 
 	}
?>
