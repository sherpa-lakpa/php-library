<?php
	session_start();
		if(isset($_SESSION['todo_name']))
		{
			$student_name = $_SESSION['todo_name'];

			if(isset($_SESSION['std_id'])){
			$student_id = $_SESSION['std_id'];
			}
			else{
				session_destroy();
			}
		}
		if (isset($_SESSION['marksheet_holder'])) {
			include_once('class.marksheet.php');
			$marksheet = new markSheet();
			$sid = $_SESSION['marksheet_holder'];
			$eid = $_SESSION['examination_id'];

			$get_marksheet = $marksheet->getStuMarksheet($sid,$eid);

			$get_stu = $marksheet->getStudent($sid);

			$get_examination = $marksheet->getExamination($eid);
			foreach ($get_examination as $key => $value) {
				$examtype = $value['exam_id'];
			}
			$get_examtype = $marksheet->getExam($examtype);
		}



?>
