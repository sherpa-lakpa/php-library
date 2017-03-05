<?php
	session_start();
		if(isset($_SESSION['todo_name']))
			{
				$student_name = $_SESSION['todo_name'];
				if(isset($_SESSION['std_id'])){
				$student_id = $_SESSION['std_id'];
				}
			}else{
				session_destroy();
			}
							
?>