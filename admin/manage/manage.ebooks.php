<?php
  include_once('class/class.ManageEbooks.php');
  $init = new ManageEbooks();


  if(isset($_GET['eid']))
  {
    $id = $_GET['eid'];
    $list_ebook = $init->listIdEbook($id);

  }else{
    if(isset($_GET['category']))
    {
      $category = $_GET['category'];
      $list_ebook = $init->listEbook($limit,$category);
    }
    else{
      $count = $init->getno_ebooks();

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

        $list_ebook = $init->listEbook($limit);

        $ebook_pagination = "";
        
        if($lastPage != 1){
          if($page != $lastPage){
          $next = $page+1;
          $ebook_pagination.= '<a href="ebooks.php?page='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $ebook_pagination.= '<a href="ebooks.php?page='.$prev.'">Previous</a>';
          }
        }

    }
  }

// Ebooks Management Part

  if(isset($_POST['add_ebooks'])){

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $category = $_POST['category'];

    $nam = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $location = '../ebooks/';
    $target = $location.$nam;
    if(move_uploaded_file($tmp_name,$target)){
      $target = 'ebooks/'.$nam;
      }else{
      $target = "";
    }
				$addEbook = $init->addEbook($name,$subject,$category,$target);
        if($addEbook == 1){
          $success = 'success!';
        }
    		else
    			{
    				$error = 'Failed to add ebooks';
    			}
  }

  if(isset($_POST['edit_ebook'])){

    $id = $_GET['eid'];

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $category = $_POST['category'];

    $edit = $init->listIdEbook($id);

    foreach ($edit as $key => $value) {
      $check_ebook = $value['download'];
    }

    $nam = $_FILES['file']['name'];
      $tmp_name = $_FILES['file']['tmp_name'];
      $location = '../ebooks/';
      $target = $location.$nam;
      if($nam !== "" && move_uploaded_file($tmp_name,$target)){
        $target = 'ebooks/'.$nam;
        }else{
      $target = $check_ebook;
    }
    $edit = $init->editEbook($id,$name,$subject,$category,$target);
    if($edit == 1)
    {
      header('Location: ebooks.php');
    }else{
      $error = 'There was an error';
    }
  }

  if(isset($_GET['delEbook'])){
    $id = $_GET['delEbook'];
    $delete = $init->deleteEbook($id);
    if($delete == 1)
    {
      $success = 'You have deleted it sucessdully';
      header('Location: ebooks.php');
    }
    else
    {
      $error = 'Sorry there was an error';
    }
  }


// Ebook searching part

  if (isset($_GET['ename'])) {
    if ($_GET['ename'] == "") {
      header('Location: ebooks.php');
    }

    $search_e = $_GET['ename'];
    if($search_e != ""){

    $result = $init->searchEbook($search_e);

    $searched_e = "";

    foreach ($result as $key => $value) {
      $searched_e .= '<tr><td>'.$value['eid'].'</td>
        <td>'.$value['name'].'</td>
        <td>'.$value['subject'].'</td>
        <td>'.$value['category'].'</td>
        <td>
        <a href="edit_ebook.php?eid='.$value['eid'].'"><button>Edit</button></a>
        <a href="ebooks.php?delEbook='.$value['eid'].'"><button>Delete</button></a>
        </td></tr>';
    }
    if($searched_e == ""){
      $searched_e = '<td colspan="12">E-Books ( '.$search_e.' ) Not Found</td>';
    }
  }
}
