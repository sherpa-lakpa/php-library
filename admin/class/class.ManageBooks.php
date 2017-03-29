<?php
	include_once( '../class.database.php' );

		class ManageBooks{

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

			function searchBook($id){
			
				$query = $this->linker->query("SELECT * FROM books WHERE name LIKE('%$id%') LIMIT 0,6");
		
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