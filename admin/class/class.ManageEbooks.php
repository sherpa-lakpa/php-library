<?php
	include_once( '../class.database.php' );

		class ManageEbooks{

			public $linker;

			function __construct(){
				$db_connection = new dbConnection();
				$this->linker = $db_connection->connect();
				return $this->linker;
			}

			function GetCat(){
				$query = $this->linker->query("SELECT * FROM category");
				$result = $query->fetchAll();
				return $result;
			}

			
			function addEbook($name,$subject,$category,$target){
				$query = $this->linker->prepare("INSERT INTO ebooks (name,subject,category,download)
				 VALUES (?,?,?,?)");
				$values = array($name,$subject,$category,$target);
				$query->execute($values);
				$counts = $query->rowCount();
				return $counts;
			}

			function getno_ebooks(){
				$query = $this->linker->query("SELECT NULL FROM ebooks");
				$count = $query->rowCount();
				return $count;
			}

			function listEbook($limit,$category=null){
				if(isset($limit,$category))
				{
					$query = $this->linker->query("SELECT * FROM ebooks WHERE category='$category' ORDER BY eid DESC $limit");
				}else{
					$query = $this->linker->query("SELECT * FROM ebooks ORDER BY eid DESC $limit");
				}
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

			function listIdEbook($id){
			
				$query = $this->linker->query("SELECT * FROM ebooks WHERE eid='$id'");
		
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

			function editEbook($id,$name,$subject,$category,$target){
				$query = $this->linker->query("UPDATE ebooks SET name='$name',subject='$subject',category='$category',download='$target' WHERE eid='$id'");
				$counts = $query->rowCount();

			 	return $counts;
			}

			function deleteEbook($id){
				$query = $this->linker->query("DELETE FROM ebooks WHERE eid='$id'");
				$counts = $query->rowCount();
				return $counts;
			}

			function searchEbook($id){
		
				$query = $this->linker->query("SELECT * FROM ebooks WHERE name LIKE('%$id%') LIMIT 0,6");
		
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