<?php
	include_once( '../class.database.php' );

		class ManageNotes{

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

			function addNote($name,$subject,$category,$target){
				$query = $this->linker->prepare("INSERT INTO notes (name,subject,category,download)
				 VALUES (?,?,?,?)");
				$values = array($name,$subject,$category,$target);
				$query->execute($values);
				$counts = $query->rowCount();
				return $counts;
			}

			function getno_notes(){
				$query = $this->linker->query("SELECT NULL FROM notes");
				$count = $query->rowCount();
				return $count;
			}

			function listNote($limit,$category=null){
				if(isset($limit,$category))
				{
					$query = $this->linker->query("SELECT * FROM notes WHERE category='$category' ORDER BY nid DESC $limit");
				}else{
					$query = $this->linker->query("SELECT * FROM notes ORDER BY nid DESC $limit");
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

			function listIdNote($id){
			
				$query = $this->linker->query("SELECT * FROM notes WHERE nid='$id'");
		
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

			function editNote($id,$name,$subject,$category,$target){
				$query = $this->linker->query("UPDATE notes SET name='$name',subject='$subject',category='$category',download='$target' WHERE nid='$id'");
				$counts = $query->rowCount();

			 	return $counts;
			}

			function deleteNote($id){
				$query = $this->linker->query("DELETE FROM notes WHERE nid='$id'");
				$counts = $query->rowCount();
				return $counts;
			}

			function searchNote($id){
			
				$query = $this->linker->query("SELECT * FROM notes WHERE name LIKE('%$id%') LIMIT 0,6");
		
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