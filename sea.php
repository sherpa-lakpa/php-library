<?php
	$nm = $_GET['nm'];
	if($nm != ""){
	$con = new mysqli('localhost','root','root','library');
	$res = mysqli_query($con, "SELECT * FROM books WHERE name LIKE('%$nm%') LIMIT 0,6");
	echo '<table>';
	while($row=mysqli_fetch_array($res)){
		echo '<tr>';
		echo '<td style="width:100px;padding:10px;">'; ?><img height="100px" width="100px" src="<?php echo $row['image']; ?>" /><?php echo '</td>';
		echo '<td style="width:375px;padding:10px;" align="center">'; echo $row['name'].'<br><small style="float:left;padding-left:50%;">(&nbsp;'.$row['author'].'&nbsp;)</small>'; echo '</td>';
		echo '<td style="width:10px;padding:10px;"><form method="get">'; echo '<input type="hidden" value="'.$row['bid'].'" name="bid" /><input type="submit" value="Details.." />'; echo '</td>';
		echo '</form></tr>';
	}
	echo '</table>';
}
?>