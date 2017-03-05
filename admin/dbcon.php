<?php
return $conn = mysqli_connect('localhost','root','toor','users');
if(!$conn)
{
	die('Connection Failed :'.mysqli_connect_error());
}
