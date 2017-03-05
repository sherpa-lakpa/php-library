<?php
	include_once('class.ManageIssue.php');
	$init = new ManageIssue();

	if(isset($_GET['tid']))
	{
	    $tid = $_GET['tid'];
	    $list_issue = $init->listIdIssue($tid);
	}else{
	  	$count = $init->countIssue();

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
          $pagination.= '<a href="add_issues.php?page='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $pagination.= '<a href="add_issues.php?page='.$prev.'">Previous</a>';
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
      header('Location: add_issues.php');
    }
    else
    {
      $error = 'Sorry there was an error';
    }
  }
  // Issue searching part

  if (isset($_GET['idate'])) {
    if ($_GET['idate'] == "") {
      header('Location: add_issues.php');
    }
    $search_i = $_GET['idate'];

    if($search_i != ""){

    mysql_connect('localhost','root','');
    mysql_select_db('library');

    $res = mysql_query("SELECT tid,issuedate,fname,name,submission,s_id,b_id FROM issues,student,books WHERE sid=s_id AND bid=b_id AND issuedate LIKE('%$search_i%') OR sid=s_id AND bid=b_id AND submission LIKE('%$search_i%') LIMIT 0,6");

    $searched_i = "";

    while($value=mysql_fetch_array($res)){
      $searched_i .= '<tr><td>'.$value['tid'].'</td>
        <td>'.$value['issuedate'].'</td>
        <td>'.$value['fname'].'</td>
        <td>'.$value['submission'].'</td>
        <td>
        <a href="edit_issue.php?tid='.$value['tid'].'"><button>Edit</button></a>
        <a href="add_issues.php?delIssue='.$value['tid'].'"><button>Delete</button></a>
        </td></tr>';
    }
    if($searched_i == ""){
      $searched_i = '<td colspan="5">Issue ( '.$search_i.' ) Not Found</td>';
    }
  }
}
?>