<?php
date_default_timezone_set('Asia/Kathmandu');

	if(isset($_POST['regStu']))
	{
		session_start();
		include_once('class.student.php');
		$users = new manageStu();
		$finame = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$fname = $finame.' '.$lname;
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$program = $_POST['program'];
		$year = $_POST['year'];
		$roll_no = $_POST['roll_no'];
		$address = $_POST['address'];
		$mobile = $_POST['mobile'];
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$date = date("Y-m-d");
		$time = date("H:i:s");
		
			if ($_FILES['file']['size'] <= 153600){ // Check file Size
				$nam = $_FILES['file']['name'];
			    $tmp_name = $_FILES['file']['tmp_name'];
			    $location = 'pp/';
			    $target = $location.$nam;
			    $image = '';
			    if(move_uploaded_file($tmp_name,$target)){
			    $image = 'pp/'.$nam;
				}

				$check_availability = $users->listStu($mobile);
				if($check_availability == 0)
				{
					//$password = md5($password);
					$register_stu = $users->registerStu($image,$email,$password,$fname,$program,$year,$roll_no,$address,$mobile,$date,$time,$ip_address);

					if($register_stu == 1)
					{
						$make_session = $users->listStu($mobile);
						foreach ($make_session as $stuSession) {
							$_SESSION['todo_name'] = $stuSession['fname'];
							$_SESSION['std_mob'] = $stuSession['mobile'];
							$_SESSION['userImage'] = $stuSession['image'];
							if(isset($_SESSION['todo_name']))
							{
								header('Location: index.php');
							}
						}
					}
					else{
						echo $register_stu;
					}
				}
				else
					{
						$error = 'Student already exist';
					}
			}else{
				$error = 'File too Big! Please choose less then 1.5MB.';
			}

	}

	if(isset($_POST['logStu']))
	{
		include_once('class.student.php');
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(empty($username) || empty($password))
		{
			$errors = 'All field are required';
		}
		else{
			if($username == 'admin' && $password == 'admin'){
					session_start();
					$_SESSION['todo_name'] = 'admin';
					header('Location: admin/');
			}
			// $password = md5($password);
			$login_stu = new manageStu();
			$auth_stu = $login_stu->LoginStu($username,$password);

			if($auth_stu == 1)
			{
				$make_session = $login_stu->listStu($username);
					foreach ($make_session as $stuSession) {
						session_start();
						$_SESSION['todo_name'] = $stuSession['fname'];
						$_SESSION['std_id'] = $stuSession['sid'];
						$_SESSION['userImage'] = $stuSession['image'];
						if(isset($_SESSION['todo_name']))
						{
							header('Location: index.php');
						}
					}
					
			}else{
				$errors = 'Invalid Credentials';
			}
		}
	}

	if(isset($_GET['sid'])){
		if($_GET['sid'] == ""){
			header('Location: index.php');
		}
		if($_GET['sid'] != ""){

		include_once('class.student.php');

		$sid = $_GET['sid'];
		$init =  new manageStu();
		$list_stu = $init->listStu($sid);
		}
	}

	if(isset($_POST['bookmark'])){
		include_once('class.student.php');
		$init =  new manageStu();

		$issuedate = date("Y-m-d");

	    $submission = "2016-08-25";
	    $s_id = $_POST['s_id'];
	    $b_id = $_POST['b_id'];
		
	    $addIssue = $init->addIssue($issuedate,$submission,$b_id,$s_id);
		    if($addIssue == 1){
		      $success = 'success!';
		    }
		    else{
		        $error = 'Failed to add Issue';
		    }
	}
?>