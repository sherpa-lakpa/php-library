<?php
	include_once('class.database.php');

	class manageStu{
		public $linker;

		function __construct()
		{
			$db_connection = new dbConnection();
			$this->linker = $db_connection->connect();
			return $this->linker;
		}

		function listStu($sid){
			$query = $this->linker->query("SELECT * FROM student WHERE sid='$sid' OR mobile='$sid' OR email='$sid'");
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
		function checkStu($mobile,$roll_no,$year){
			$query = $this->linker->query("SELECT * FROM student WHERE mobile='$mobile' AND roll_no = '$roll_no' AND year='$year'");
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

		function registerStu($image,$email,$password,$fname,$program,$year,$roll_no,$address,$mobile,$date,$time,$ip_address)
		{
			$query = $this->linker->prepare("INSERT INTO student (image,email,password,fname,program,year,roll_no,address,mobile,reg_date,reg_time,ip_address)
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
			$values = array($image,$email,$password,$fname,$program,$year,$roll_no,$address,$mobile,$date,$time,$ip_address);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
		}

		function LoginStu($sid,$password){
			$query = $this->linker->query("SELECT * FROM student WHERE password='$password' AND sid = '$sid' OR email='$sid' AND password='$password'");
			$rowcount = $query->rowCount();
			return $rowcount;
		}
		function totalStuIssue($sid){
			$query = $this->linker->query("SELECT s_id FROM issues WHERE s_id='$sid'");
			$counts = $query->rowCount();
			return $counts;
		}
		function listStuIssue($sid){
			$query = $this->linker->query("SELECT bid,tid,issuedate,name,image,submission,bookmarked FROM issues,books WHERE s_id='$sid' AND bid=b_id");
			$counts = $query->rowCount();
			if($counts >= 1){
				$result = $query->fetchAll();
			}else{
				$result = $counts;
			}
			return $result;
		}
  		/* Edit student */

		function editStu($column,$editval,$sid){
				$query = $this->linker->query("UPDATE student SET $column='$editval' WHERE sid='$sid'");
				$counts = $query->rowCount();

			 	return $counts;
			}

	}
?>
