<?php
include_once('class.student.php');
$users = new manageStu();

if (isset($_POST['column'])) {

	$column = $_POST['column'];
	$sid = $_POST['sid'];
	$editval = $_POST["editval"];

	$insert = $users->editStu($column,$editval,$sid);
	echo 1;
}
?>