<?php
	include_once( '../class.database.php' );

		class ManageStudents{

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
		}
?>