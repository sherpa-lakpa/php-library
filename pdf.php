<?php
	/*
	$stu_name = $value['fname'];
	$stu_program = $value['program'];
	$stu_batch = $value['year'];
	$stu_roll = $value['roll_no'];
	$sem_name = $value['name'];	
	$exam_date = $value['date'];
	$exam_type = $value['type'];
	foreach ($get_marksheet as $key => $values) {
	$subject_id = $values['sub_id'];
	$get_name = $marksheet->getSubject($subject_id);
	foreach ($get_name as $key => $value) {
		$subject_name = $value['name'];
		$full_marks = $value['full'];
		$pass_marks = $value['pass'];
	}
	$subject_marks = $values['marks_obtained'];
	}
	$subject_marks = $values['marks_obtained'];
	$total_obtained += $subject_marks; 
	$percentage = $total_obtained/$x;
	*/

	$mypdf = new FPDF();
	//Left top right
	$mypdf->AddPage();
	$mypdf->SetTitle("$exam_type Marksheet");

	$mypdf->SetCreator("St. Lawrence College");
	$mypdf->SetAuthor("$stu_name");
	$mypdf->SetSubject("Any subject");

	//$mypdf->SetTextColor(255,215,0);//RGB
	//$mypdf->SetDrawColor(255,165,0);

	$mypdf->SetFont("Arial","B",20);
	$mypdf->SetFillColor(3,112,91);
	$mypdf->Cell(191,15, "ST.LAWRENCE COLLEGE", 0, 1,"C",1);
	$mypdf->SetFont("Arial","B",15);
	$mypdf->Cell(191,8, "CHABAHIL,KATHMANDU", 0, 1,"C",1);
	$mypdf->SetFont("Arial","B",12);
	$mypdf->Cell(191,5, "4515313", 0, 1,"C",1);
	$mypdf->Image("gallery/stlawrence.png",10,10,40,25);
	$mypdf->SetFont("Arial","B",18);
	$mypdf->Cell(191,12, "MARKSHEET", 0, 1,"C");
	$mypdf->SetFont("Arial","",12);
	$mypdf->Cell(191,8, "BACHELOR OF BSC CSIT", 0, 1,"C");
	$mypdf->Cell(191,8, "Third year Fifth Semester", 0, 1,"C");
	$mypdf->Cell(191,8, "", 0, 1,"C");

	$mypdf->SetFont("Arial","B",10);

	$mypdf->Cell(10,8, "", 0, 0,"C");
	$mypdf->Cell(100,8, "Name: $stu_name ", 0, 0,"L");
	$mypdf->Cell(81,8, "Reg. No: 2015-05-23-234", 0, 1,"L");

	$mypdf->Cell(10,8, "", 0, 0,"C");
	$mypdf->Cell(100,8, "Semester: $sem_name", 0, 0,"L");
	$mypdf->Cell(81,8, "Symbol No: 123490 Y", 0, 1,"L");

	$mypdf->Cell(10,8, "", 0, 0,"C");
	$mypdf->Cell(100,8, "Roll No: $stu_roll", 0, 0,"L");
	$mypdf->Cell(81,8, "Batch: $stu_batch", 0, 1,"L");

	$mypdf->Cell(191,15, "", "B", 1,"C");

	$mypdf->SetFont("Arial","B",12);
	$mypdf->SetFillColor(220,220,220);
	$mypdf->Cell(25,7, "SUBJECT", "TRL", 0,"C",1);
	$mypdf->Cell(80,7, "SUBJECT", "TRL", 0,"C",1);
	$mypdf->Cell(20,7, "FULL", "TRL", 0,"C",1);
	$mypdf->Cell(20,7, "PASS", "TRL", 0,"C",1);
	$mypdf->Cell(23,7, "MARKS", "TRL", 0,"C",1);
	$mypdf->Cell(23,7, "HIGHEST", "TRL", 1,"C",1);
	$mypdf->Cell(25,5, "CODE", "LRB", 0,"C",1);
	$mypdf->Cell(80,5, "", "LRB", 0,"C",1);
	$mypdf->Cell(20,5, "MARKS", "LRB", 0,"C",1);
	$mypdf->Cell(20,5, "MARKS", "LRB", 0,"C",1);
	$mypdf->Cell(23,5, "OBTAINED", "LRB", 0,"C",1);
	$mypdf->Cell(23,5, "MARK", "LRB", 1,"C",1);

	$mypdf->SetFont("Arial","",11);

	foreach ($get_marksheet as $key => $values) {
	$subject_id = $values['sub_id'];
	$get_name = $marksheet->getSubject($subject_id);
	foreach ($get_name as $key => $value) {
		$subject_code = $value['subject_code'];
		$mypdf->Cell(25,7, "$subject_code", 1, 0,"C");
		$subject_name = $value['name'];
		$mypdf->Cell(80,7, "$subject_name", 1, 0,"C");
		$full_marks = $value['full'];
		$mypdf->Cell(20,7, "$full_marks", 1, 0,"C");
		$pass_marks = $value['pass'];
		$mypdf->Cell(20,7, "$pass_marks", 1, 0,"C");
	}
	$subject_marks = $values['marks_obtained'];
	$mypdf->Cell(23,7, "$subject_marks", 1, 0,"C");
	$mypdf->Cell(23,7, "55", 1, 1,"C"); //Not Done
	}	
	for ($x = 0; $x < 5; $x++) {
	$mypdf->Cell(191,8, "", 0, 1,"C");
	}
	$mypdf->SetFont("Arial","B",11);
	$mypdf->Cell(191,8, "Grand Total : $total_obtained", 0, 1,"L");
	$mypdf->Cell(120,8, "Percentage : $percentage%", 0, 0,"L");
	$mypdf->Cell(71,8, "ATTENDANCE :72/78", 0, 1,"L");

	$mypdf->SetFont("Arial","B",11);
	$mypdf->Cell(120,8, "Rank : 15th", 0, 0,"L");
	$mypdf->Cell(71,8, "REMARKS:", 0, 1,"L");
	$mypdf->Cell(120,8, "", 0, 0,"L");
	$mypdf->Cell(71,8, "ABS : ABSENT", 0, 1,"L");
	$mypdf->Cell(150,8, "* : FAILED", 0, 1,"R");

	$mypdf->SetFont("Arial","B",11);
	$mypdf->Cell(191,8, "", 0, 1,"C");

	$mypdf->Cell(20,8, "", 0, 0,"C");$mypdf->Cell(171,8, "DATE OF ISSUE : $exam_date", 0, 1,"L");
	$mypdf->Cell(20,8, "", 0, 0,"C");$mypdf->Cell(171,8, "FACULTY INCHARGE: $incharge", 0, 1,"L");



	//$mypdf->MultiCell(95,10,"Class Class Class ClassClassClassClassClass  ClassClassClass Class",0,0,"C");
	/*
	1- Inline - I
	2- Downloading - D
	3- Download in Server - F
	4- Return as String - S
	*/
	$mypdf->Output("I", "mypdf.pdf");
 ?>