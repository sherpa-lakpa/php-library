<?php
	include_once( '../class.database.php' );

		class ManageBooks{

			public $linker;

			function __construct(){
				$db_connection = new dbConnection();
				$this->linker = $db_connection->connect();
				return $this->linker;
			}
			// Students MaNAGEMENT partss
			function getno_stu(){
				$query = $this->linker->query("SELECT NULL FROM student");
				$count = $query->rowCount();
				return $count;
			}

			function listStu($limit,$program=null){
				if(isset($limit,$program))
				{
					$query = $this->linker->query("SELECT * FROM student WHERE program='$program' ORDER BY sid DESC $limit");
				}else{
					$query = $this->linker->query("SELECT * FROM student ORDER BY sid DESC $limit");
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

			function listIdStu($sid){
				foreach ($sid as $key => $value) {
					$query = $this->linker->query("SELECT * FROM student WHERE $key = '$value' LIMIT 1");
				}
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

			function editStu($email,$fname,$program,$year,$roll_no,$address,$mobile){
					$query = $this->linker->query("UPDATE student SET email='$email',fname='$fname',program='$program',year='$year',roll_no='$roll_no',address='$address',mobile='$mobile'");
					$counts = $query->rowCount();
				return $counts;
			}

			function deleteStu($sid){
				$query = $this->linker->query("DELETE FROM student WHERE sid='$sid'");
				$counts = $query->rowCount();
				return $counts;
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


			function addBook($name,$author,$category,$target,$publisher,$edition,$subject,$sem){
				$query = $this->linker->prepare("INSERT INTO books (name,author,category,image,publisher,edition,subject,semester)
				 VALUES (?,?,?,?,?,?,?,?)");
				$values = array($name,$author,$category,$target,$publisher,$edition,$subject,$sem);
				$query->execute($values);
				$counts = $query->rowCount();
				return $counts;
			}

			function getno_books(){
				$query = $this->linker->query("SELECT NULL FROM books");
				$count = $query->rowCount();
				return $count;
			}
			function checkBook($name,$publisher,$edition){
				$query = $this->linker->query("SELECT NULL FROM books WHERE name='$name' AND publisher='$publisher' AND edition='$edition'");
				$counts = $query->rowCount();
				if($counts == 1)
				{
					$result = $query->fetchAll();
				}
				else
				{
					$result = $counts;
				}
				return $result;
			}

			function listBook($limit,$category=null){
				if(isset($limit,$category))
				{
					$query = $this->linker->query("SELECT * FROM books WHERE category='$category' ORDER BY bid DESC $limit");
				}else{
					$query = $this->linker->query("SELECT * FROM books ORDER BY bid DESC $limit");
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

			function listIdBook($id){
			
				$query = $this->linker->query("SELECT * FROM books WHERE bid='$id'");
		
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
			
			function editBook($id,$name,$target,$author,$category,$publisher,$edition,$subject,$semester){
			$query = $this->linker->query("UPDATE books SET 
				name='$name',image='$target',author='$author',category='$category'
				,publisher='$publisher',edition='$edition',subject='$subject',semester='$semester' 
				WHERE bid='$id'");
			
			$counts = $query->rowCount();
		 	return $counts;
			}

			function deleteBook($id){
				$query = $this->linker->query("DELETE FROM books WHERE bid='$id'");
				$counts = $query->rowCount();
				return $counts;
			}

		}
?>