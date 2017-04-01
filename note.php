<?php
	include_once('class.ManageUsers.php');

	$init = new ManageUsers();

	$nm = $_GET['nm'];
	if($nm != ""){

	$result = $init->searchNote($nm);

	echo '<table>';

	foreach ($result as $key => $row) {

		echo '<tr>';
		echo '<td>'; echo $row['name']; echo '</td>';
		echo '<td>'; echo $row['subject']; echo '</td>';
		echo '<td>'; echo '<a href="'.$row['download'].'"><img src="image/zip.png" class="pdf"></a>'; echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
}
?>