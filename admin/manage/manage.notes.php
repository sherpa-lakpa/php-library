<?php
  
  include_once('class/class.ManageNotes.php');
  $init = new ManageNotes();

  if(isset($_GET['nid']))
  {
    $id = $_GET['nid'];
    $list_note = $init->listIdNote($id);

  }else{
    if(isset($_GET['category']))
    {
      $category = $_GET['category'];
      $list_note = $init->listNote($limit,$category);
    }
    else{
      $count = $init->getno_notes();

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

        $list_note = $init->listNote($limit);

        $note_pagination = "";
        
        if($lastPage != 1){
          if($page != $lastPage){
          $next = $page+1;
          $note_pagination.= '<a href="notes.php?page='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $note_pagination.= '<a href="notes.php?page='.$prev.'">Previous</a>';
          }
        }

    }
  }

  // Notes Management Part

  if(isset($_POST['add_notes'])){

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $category = $_POST['category'];

    $nam = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $location = '../notes/';
    $target = $location.$nam;
    if(move_uploaded_file($tmp_name,$target)){
      $target = 'notes/'.$nam;
      }else{
      $target = "";
    }
        $addEbook = $init->addNote($name,$subject,$category,$target);
        if($addEbook == 1){
          $success = 'success!';
        }
        else
          {
            $error = 'Failed to add note';
          }
  }

    if(isset($_POST['edit_note'])){
    $id = $_GET['nid'];

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $category = $_POST['category'];

    $edit = $init->listIdNote($id);

    foreach ($edit as $key => $value) {
      $check_note = $value['download'];
    }

    $nam = $_FILES['file']['name'];
      $tmp_name = $_FILES['file']['tmp_name'];
      $location = '../ebooks/';
      $target = $location.$nam;
      if($nam !== "" && move_uploaded_file($tmp_name,$target)){
        $target = 'ebooks/'.$nam;
        }else{
      $target = $check_note;
    }
    $edit = $init->editNote($id,$name,$subject,$category,$target);
    if($edit == 1)
    {
      header('Location: notes.php');
    }else{
      $error = 'There was an error';
    }
  }

  if(isset($_GET['delNote'])){
    $id = $_GET['delNote'];
    $delete = $init->deleteNote($id);
    if($delete == 1)
    {
      $success = 'You have deleted it sucessdully';
      header('Location: notes.php');
    }
    else
    {
      $error = 'Sorry there was an error';
    }
  }

  //Notes Searching parts


  if (isset($_GET['nname'])) {
    if ($_GET['nname'] == "") {
      header('Location: notes.php');
    }
    $search_n = $_GET['nname'];

    if($search_n != ""){

    $result = $init->searchNote($search_n);

    $searched_n = "";

    foreach ($result as $key => $value) {
      $searched_n .= '<tr><td>'.$value['nid'].'</td>
        <td>'.$value['name'].'</td>
        <td>'.$value['subject'].'</td>
        <td>'.$value['category'].'</td>
        <td>
        <a href="edit_note.php?nid='.$value['nid'].'"><button>Edit</button></a>
        <a href="notes.php?delNote='.$value['nid'].'"><button>Delete</button></a>
        </td></tr>';
    }
    if($searched_n == ""){
      $searched_n = '<td colspan="12">Notes ( '.$search_n.' ) Not Found</td>';
    }
  }

}
