<?php
	include_once('../class.database.php');

	class ManageIssue{
		public $linker;

		function __construct(){
			$db_connection = new dbConnection();
			$this->linker = $db_connection->connect();
			return $this->linker;
		}
		function countIssue(){
			$query = $this->linker->query("SELECT NULL FROM issues");
			$count = $query->rowCount();
			return $count;
		}

		function addIssue($issuedate,$submission,$b_id,$s_id){
			$query = $this->linker->prepare("INSERT INTO issues (issuedate,submission,b_id,s_id) VALUES (?,?,?,?)");
			$values = array($issuedate,$submission,$b_id,$s_id);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
		}
		function listIssue($limit){
			$query = $this->linker->query("SELECT tid,issuedate,fname,name,submission,s_id,b_id FROM issues,student,books WHERE sid=s_id AND bid=b_id ORDER BY tid DESC $limit");
			$counts = $query->rowCount();
			if($counts >= 1){
				$result = $query->fetchAll();
			}else{
				$result = $counts;
			}
			return $result;
		}
		function listIdIssue($tid){
			$query = $this->linker->query("SELECT * FROM issues WHERE tid='$tid'");
			$count = $query->rowCount();
			if($count == 1){
				$result = $query->fetchAll();
			}else{
				$result = $count;
			}
			return $result;
		}
		function editIssue($tid,$issuedate,$submission,$b_id,$s_id){
			$query = $this->linker->query("UPDATE issues SET issuedate='$issuedate',submission='$submission',b_id='$b_id',s_id='$s_id' WHERE tid='$tid'");
			$count = $query->rowCount();
			return $count;
		}
		function deleteIssue($tid){
			$query = $this->linker->query("DELETE FROM issues WHERE tid='$tid'");
			$count = $query->rowCount();
			return $count;
		}

	}
?>