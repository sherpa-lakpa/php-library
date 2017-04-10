<?php
	include_once( '../class.database.php' );

	class ManageCategorys{

		public $linker;

		function __construct(){
			$db_connection = new dbConnection();
			$this->linker = $db_connection->connect();
			return $this->linker;
		}

		function addCat($name){
			$query = $this->linker->prepare("INSERT INTO category (name)
			 VALUES (?)");
			$values = array($name);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
		}

		function getno_cats(){
			$query = $this->linker->query("SELECT NULL FROM category");
			$count = $query->rowCount();
			return $count;
		}

		function listCat($limit){
			$query = $this->linker->query("SELECT * FROM category ORDER BY cid DESC $limit");

			$counts = $query->rowCount();
			if($counts >= 1)
			{
				$result = $query->fetchAll();
			}
			else
			{
				$result = $counts;
			}
			return $result;
		}

		function listIdCat($id){
		
			$query = $this->linker->query("SELECT * FROM category WHERE cid='$id'");
	
			$counts = $query->rowCount();
			if($counts == 1)
			{
				$result = $query->fetchAll();
			}
			else{
				$result = $counts;
			}
			return $result;
		}

		function editCat($id,$name){
			$query = $this->linker->query("UPDATE category SET name='$name' WHERE cid='$id'");
			$counts = $query->rowCount();

		 	return $counts;
		}

		function deleteCat($id){
			$query = $this->linker->query("DELETE FROM category WHERE cid='$id'");
			$counts = $query->rowCount();
			return $counts;
		}

		function searchCat($search_c){
	
			$query = $this->linker->query("SELECT * FROM category WHERE name LIKE('%$search_c%') LIMIT 0,6");
	
			$counts = $query->rowCount();
			if($counts > 0)
			{
				$result = $query->fetchAll();
			}
			else{
				$result = $counts;
			}
			return $result;
		}
	}
?>