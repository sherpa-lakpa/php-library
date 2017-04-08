<?php
	include_once( '../class.database.php' );

		class ManageDashbord{
			public $linker;

		function __construct(){
				$db_connection = new dbConnection();
				$this->linker = $db_connection->connect();
				return $this->linker;
			}

		function countStu(){
			$query = $this->linker->query("SELECT * FROM student");
			$rowcount = $query->rowCount();
			return $rowcount;
		}
		function countBooks(){
			$query = $this->linker->query("SELECT * FROM books");
			$rowcount = $query->rowCount();
			return $rowcount;
		}
		function countEbooks(){
			$query = $this->linker->query("SELECT * FROM ebooks");
			$rowcount = $query->rowCount();
			return $rowcount;
		}
		function countNotes(){
			$query = $this->linker->query("SELECT * FROM notes");
			$rowcount = $query->rowCount();
			return $rowcount;
		}
		function countIssues(){
			$query = $this->linker->query("SELECT * FROM issues");
			$rowcount = $query->rowCount();
			return $rowcount;
		}
		function getFeedbacks(){
			$query = $this->linker->query("SELECT * FROM feedbacks");
			$rowcount = $query->rowCount();
			if ($rowcount > 0) {
				return $query->fetchAll();
			}else{
			return $rowcount;
			}
		}

	}
?>