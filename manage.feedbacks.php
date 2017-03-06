<?php
include_once('class.ManageUsers.php');
$users = new ManageUsers();

	if (isset($_POST['feed'])) {
		$feedby = $student_name;
		$feed_type = $_POST['feed_type'];
		$feeds = $_POST['feeds'];
		$insert = $users->insertFeeds($feedby,$feed_type,$feeds);

		if ($insert == 1) {
			echo '<script> alert("Thanks you very much for your '.$feed_type.' feedbacks!"); </script>';
			header('Location index.php');
		}
	}
?>