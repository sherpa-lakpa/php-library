<?php
  include_once('class/class.ManageBooks.php');
  $init = new ManageBooks();

// Listing parts

  if(isset($_GET['bid']))
  {
    $id = $_GET['bid'];
    $list_book = $init->listIdBook($id);

  }else{
    if(isset($_GET['category']))
    {
      $category = $_GET['category'];
      $list_book = $init->listBook($limit,$category);
    }
    else{
      $count = $init->getno_books();

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

        $list_book = $init->listBook($limit);

        $pagination = "";
        if($lastPage != 1){
          if($page != $lastPage){
          $next = $page+1;
          $pagination.= '<a href="books.php?page='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $pagination.= '<a href="books.php?page='.$prev.'">Previous</a>';
          }
        }

    }
  }

// Books Management Part

  if(isset($_POST['add_books'])){

    $name = $_POST['name'];
    $author = $_POST['author'];
    $subject = $_POST['subject'];
    $publisher = $_POST['publisher'];
    $edition = $_POST['edition'];
    $sem = $_POST['semester'];
    $category = $_POST['category'];

    $nam = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $location = '../image/';
    $target = $location.$nam;
    if(move_uploaded_file($tmp_name,$target)){
      $target = 'image/'.$nam;
    }else{
      $target = 'image/demo.jpg';
    }

    $addEbook = $init->addBook($name,$author,$category,$target,$publisher,$edition,$subject,$sem);
    if($addEbook == 1){
        $success = 'success!';
    }else{
      $error = "Failed to add book!";
    }
  }

   if(isset($_POST['edit_book'])){
    $id = $_GET['bid'];

    $name = $_POST['name'];
    $author = $_POST['author'];
    $subject = $_POST['subject'];
    $publisher = $_POST['publisher'];
    $edition = $_POST['edition'];
    $semester = $_POST['semester'];
    $category = $_POST['category'];

    $nam = $_FILES['file']['name'];
      $tmp_name = $_FILES['file']['tmp_name'];
      $location = '../image/';
      $target = $location.$nam;
      if(move_uploaded_file($tmp_name,$target)){
        $target = 'image/'.$nam;
        }else{
      $target = "image/demo.jpg";
    }
    $edit = $init->editBook($id,$name,$target,$author,$category,$publisher,$edition,$subject,$semester);

    if($edit == 1)
    {
      header('Location: books.php');
    }else{
      $error = 'There was an error';
    }
  }

  if(isset($_GET['delBook'])){
    $id = $_GET['delBook'];
    $delete = $init->deleteBook($id);
    if($delete == 1)
    {
      $success = 'You have deleted it sucessdully';
      header('Location: books.php');
    }
    else
    {
      $error = 'Sorry there was an error';
    }
  }

 
// Books searching part

if (isset($_GET['bname'])) {
    if ($_GET['bname'] == "") {
      header('Location: books.php');
    }
    $search_b = $_GET['bname'];

    if($search_b != ""){

    $result = $init->searchBook($search_b);

    $searched_b = "";

    foreach ($result as $key => $value) {
      $searched_b .= '<tr><td>'.$value['bid'].'</td>
        <td>'.$value['name'].'</td>
        <td>'.$value['author'].'</td>
        <td>'.$value['subject'].'</td>
        <td>'.$value['publisher'].'</td>
        <td>'.$value['edition'].'</td>
        <td>'.$value['category'].'</td>
        <td><a href="edit_book.php?bid='.$value['bid'].'"><button>Edit</button></a>
          <a href="books.php?delBook='.$value['bid'].'"><button>Delete</button></a></td></tr>';
    }
    if($searched_b == ""){
      $searched_b = '<td colspan="12">Books ( '.$search_b.' ) Not Found</td>';
    }
  }
}
?>
