<?php
	include_once('class/class.ManageIssue.php');
	$init = new ManageIssue();

	if(isset($_GET['tid']))
	{
	    $tid = $_GET['tid'];
	    $list_issue = $init->listIdIssue($tid);
	}else{
	  	$count = $init->countIssue();
      echo $count;

        if(isset($_GET['page'])){ // This filter only get variables
          $page = preg_replace("#[^0-9]#","",$_GET['page']);
        }else{
          $page = 1;
        }
        $perPage = 6;
        // Extra error handler
        $test = $count/$perPage;
        $lastPage = round($count/$perPage); //Round off number so we get certains amount per page
        // page error handller
        if($test > $lastPage){
          $lastPage = $lastPage+1;
        }
        if($page < 1){
          $page = 1;
        }
        elseif($page > $lastPage){
          $page = $lastPage;
        }

        $limit = "LIMIT ".($page-1)*$perPage.",$perPage";

        $list_issue = $init->listIssue($limit);

        $pagination = "";
        
        if($lastPage != 1){
          if($page != $lastPage){
          $next = $page+1;
          $pagination.= '<a href="issues.php?page='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $pagination.= '<a href="issues.php?page='.$prev.'">Previous</a>';
          }
        }

	}


  if(isset($_POST['add_issues'])){
  	$issuedate = date("Y-m-d");
    $submission = $_POST['submission'];
    if($submission == ""){
    	$submission = date("Y-m-d"); // Increase date ???? 
    }
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

    if(isset($_POST['edit_issue'])){
    $id = $_GET['tid'];

    $issuedate = $_POST['issuedate'];
    $submission = $_POST['submission'];
    $s_id = $_POST['s_id'];
    $b_id = $_POST['b_id'];

    $edit = $init->editIssue($tid,$issuedate,$submission,$b_id,$s_id);
    if($edit == 1)
    {
      header('Location: add_issues.php');
    }else{
      $error = 'There was an error';
    }
  }

  if(isset($_GET['delIssue'])){
    $tid = $_GET['delIssue'];
    $delete = $init->deleteIssue($tid);
    if($delete == 1)
    {
      $success = 'You have deleted it sucessdully';
      header('Location: issues.php');
    }
    else
    {
      $error = 'Sorry there was an error';
    }
  }
  // Issue searching part

  if (isset($_GET['idate'])) {
    if ($_GET['idate'] == "") {
      header('Location: issues.php');
    }

    $search_i = $_GET['idate'];
    
    if($search_i != ""){

    $result = $init->searchIssue($search_i);

    $searched_i = "";

    foreach ($result as $key => $value) {
        $searched_i .= '<tr><td>'.$value['tid'].'</td>
        <td>'.$value['issuedate'].'</td>
        <td>'.$value['fname'].'</td>
        <td>'.$value['name'].'</td>
        <td>'.$value['submission'].'</td>
        <td>
        <a href="edit_issue.php?tid='.$value['tid'].'"><button>Edit</button></a>
        <a href="issues.php?delIssue='.$value['tid'].'"><button>Delete</button></a>
        </td></tr>';
    }
    if($searched_i == ""){
      $searched_i = '<td colspan="5">Issue ( '.$search_i.' ) Not Found</td>';
    }
  }
}
?>