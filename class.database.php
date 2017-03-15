<?php
	class dbConnection{
		protected $db_conn;
		public $db_name = 'php-librarys';
		public $db_user = 'root';
		public $db_pass = '';
		public $db_host = 'localhost';

		function connect(){
			try{
				$this->db_conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",
					$this->db_user,$this->db_pass);
				return $this->db_conn;
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>