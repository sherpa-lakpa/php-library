<?php
	 include_once('class.ManageUsers.php');

	 $init = new ManageUsers();

	 $count = $init->getTotal(); 

	//Paging starts here

	if(isset($_GET['page'])){ // This filter only get variables
		$page = preg_replace("#[^0-9]#","",$_GET['page']);
	}else{
		$page = 1;
	}
	$perPage = 6;
	$lastPage = round($count/$perPage); //Round off number so we get certains amount per page
	// page error handller
	if($page < 1){
		$page = 1;
	}
	elseif($page > $lastPage){
		$page = $lastPage;
	}

	// $Limit = 'LIMIT 70(Limit from),10(limit by)'

	$limit = "LIMIT ".($page-1)*$perPage.",$perPage";


	$result = $init->paginateBook($limit);

	$pagination = "";
	if($lastPage != 1){
		if($page != $lastPage){
		$next = $page+1;
		$pagination.= '<a href="index.php?page='.$next.'">Next</a>';
		}
		if($page != 1){
		$prev = $page-1;
		$pagination.= '<a href="index.php?page='.$prev.'">Previous</a>';
		}
	}
	$output = '<div id="abook"><table>';
	$radio = '<td style="width:10px;padding:10px;"><input type="submit" value="Details.." class="detail"/></td>';
	$outimage = "";
	foreach ($result as $key => $row) {
		$outimage = '<tr><form method="get">
		<td style="width:100px;padding:10px;">
			<img src="'.$row['image'].'"&nbsp; class="image">'.'</td>
		<td style="width:375px;padding:10px;" align="center">';
		$output.= $outimage.$row['name'].'<br><small style="float:left;padding-left:50%;">(&nbsp;'.$row['author'].'&nbsp;)</small>'.'</td>
		<input type="hidden" value="'.$row['bid'].'" name="bid" />'.$radio.'</form>
		</tr>';
	}

	$output.= '</table></div>'

?>
