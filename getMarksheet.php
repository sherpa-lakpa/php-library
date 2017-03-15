<?php
	include_once('libs/session.php');
	require('fpdf181/fpdf.php');

	/*
	
	$get_marksheet = $marksheet->getStuMarksheet($sid,$eid);

	$get_stu = $marksheet->getStudent($sid);

	$get_examination = $marksheet->getExamination($eid);
			
	$get_examtype = $marksheet->getExam($examtype);

	*/

	foreach ($get_stu as $key => $value) {
		$stu_name = $value['fname'];
		$stu_program = $value['program'];
		$stu_batch = $value['year'];
		$stu_roll = $value['roll_no'];
	}

	foreach ($get_examination as $key => $value) {
		$stu_sem = $value['sem_id'];
		$get_sem = $marksheet->getSem($stu_sem);
		foreach ($get_sem as $key => $values) {
			$sem_name = $values['name'];
		}
		$exam_date = $value['date'];	
		$incharge = $value['incharge'];
	}
	foreach ($get_examtype as $key => $value) {
		$exam_type = $value['type'];
	}
	$x = 0;
	$total_obtained = 0;
	$total_marks = 0;
	foreach ($get_marksheet as $key => $values) {
		$subject_id = $values['sub_id'];
		$get_name = $marksheet->getSubject($subject_id);
		foreach ($get_name as $key => $value) {
			$subject_name = $value['name'];
			$full_marks = $value['full'];
			$total_marks += $full_marks;
			$pass_marks = $value['pass'];
		}
		$x += 1;
		$subject_marks = $values['marks_obtained'];
		$total_obtained += $subject_marks; 
	}
	$percentage = round(($total_obtained/$total_marks)*100, 2);
	require('pdf.php');
?>