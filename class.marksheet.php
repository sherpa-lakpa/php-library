<?php
	include_once('class.database.php');

	class markSheet{
		public $linker;

		function __construct()
		{
			$db_connection = new dbConnection();
			$this->linker = $db_connection->connect();
			return $this->linker;
		}
		function getLastestExamination(){
			$query = $this->linker->query('SELECT * FROM `examination` ORDER BY `id` DESC LIMIT 1');
			$result = $query->fetchAll();
			return $result;
		}

		function getMarksheet($sid,$examination_id){
			$query = $this->linker->query("SELECT * FROM `marksheet` WHERE stu_id='$sid' AND examination_id = '$examination_id'");
			$counts = $query->rowCount();
			return $counts;
		}

		function getStudent($sid){
			$query = $this->linker->query("SELECT * FROM student WHERE sid = '$sid'");
			$rowcount = $query->fetchAll();
			return $rowcount;
		}
		function getSubject($subject_id){
			$query = $this->linker->query("SELECT * FROM subjects WHERE id = '$subject_id'");
			$rowcount = $query->fetchAll();
			return $rowcount;
		}
		function getSem($stu_sem){
			$query = $this->linker->query("SELECT * FROM semester WHERE id = '$stu_sem'");
			$rowcount = $query->fetchAll();
			return $rowcount;
		}

		function getExamination($eid){
			$query = $this->linker->query("SELECT * FROM examination WHERE id='$eid'");
			$counts = $query->fetchAll();
			return $counts;
		}
		function getExam($examtype){
			$query = $this->linker->query("SELECT `type` FROM exams WHERE id='$examtype'");
			$counts = $query->fetchAll();
			return $counts;
		}
		function getStuMarksheet($sid,$eid){
			$query = $this->linker->query("SELECT * FROM `marksheet` WHERE stu_id='$sid' AND examination_id = '$eid'");
			$rowcount = $query->fetchAll();
			return $rowcount;
		}

	}
?>