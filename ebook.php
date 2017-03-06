<?php
	$nm = $_GET['nm'];
	if($nm != ""){
	mysql_connect('localhost','root','toor');
	mysql_select_db('library');
	$res = mysql_query("SELECT * FROM ebooks WHERE subject LIKE('%$nm%')");
	echo '<table>';
	while($row=mysql_fetch_array($res)){
		echo '<tr>';
		echo '<td>'; echo $row['name']; echo '</td>';
		echo '<td>'; echo $row['subject']; echo '</td>';
		echo '<td>'; echo '<a href="'.$row['download'].'"><img src="image/pdf.png" class="pdf"></a>'; echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
}
?>