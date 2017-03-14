<?php
date_default_timezone_set('Asia/Kathmandu');

	if(isset($_GET['rsymnum']))
	{
		session_start();
		include_once('class.marksheet.php');
		$marksheet = new markSheet();
		$sid = $_GET['rsymnum'];
			$check_marksheet = $marksheet->getLastestExamination();
			foreach ($check_marksheet as $key => $value) {
				$examination_id = $value['id'];
			}
			
			$check_availability = $marksheet->getMarksheet($sid,$examination_id);

			echo $check_availability;
			if($check_availability == 1){

				$_SESSION['marksheet_holder'] = $sid;
				$_SESSION['examination_id'] = $examination_id;

				if(isset($_SESSION['marksheet_holder']))
				{
					header('Location: getMarksheet.php');
				}
			}
			else
				{
					$error = 'Student doesnot exists';
				}
		

	}
?>