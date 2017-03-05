<?php
  $init = new ManageBooks();

// Listing parts

  if(isset($_GET['sid']))
  {
    $id = $_GET['sid'];
    $list_student = $init->listIdStu(array('sid' => $sid));

  }else{
    if(isset($_GET['program']))
    {
      $program = $_GET['program'];
      $list_student = $init->listStu($limit,$program);
    }
    else{
      $count = $init->getno_stu();

        if(isset($_GET['page'])){ // This filter only get variables
          $page = preg_replace("#[^0-9]#","",$_GET['page']);
        }else{
          $page = 1;
        }
        $perPage = 12;
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

        $list_student = $init->listStu($limit);

        $ebook_pagination = "";
        $stu_pagination = "";
        if($lastPage != 1){
          if($page != $lastPage){
          $next = $page+1;
          $stu_pagination.= '<a href="list_students.php?page='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $stu_pagination.= '<a href="list_students.php?page='.$prev.'">Previous</a>';
          }
        }

    }
  }

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
          $pagination.= '<a href="add_books.php?page='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $pagination.= '<a href="add_books.php?page='.$prev.'">Previous</a>';
          }
        }

    }
  }

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
          $note_pagination.= '<a href="add_notes.php?page='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $note_pagination.= '<a href="add_notes.php?page='.$prev.'">Previous</a>';
          }
        }

    }
  }

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
          $ebook_pagination.= '<a href="add_ebooks.php?page='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $ebook_pagination.= '<a href="add_ebooks.php?page='.$prev.'">Previous</a>';
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

    $nam = $_FILES['file']['name'];
      $tmp_name = $_FILES['file']['tmp_name'];
      $location = '../ebooks/';
      $target = $location.$nam;
      if(move_uploaded_file($tmp_name,$target)){
        $target = 'ebooks/'.$nam;
        }else{
      $target = "";
    }
    $edit = $init->editEbook($id,$name,$subject,$category,$target);
    if($edit == 1)
    {
      header('Location: add_ebooks.php');
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
      header('Location: add_ebooks.php');
    }
    else
    {
      $error = 'Sorry there was an error';
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

    $nam = $_FILES['file']['name'];
      $tmp_name = $_FILES['file']['tmp_name'];
      $location = '../ebooks/';
      $target = $location.$nam;
      if(move_uploaded_file($tmp_name,$target)){
        $target = 'ebooks/'.$nam;
        }else{
      $target = "";
    }
    $edit = $init->editNote($id,$name,$subject,$category,$target);
    if($edit == 1)
    {
      header('Location: add_notes.php');
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
      header('Location: add_notes.php');
    }
    else
    {
      $error = 'Sorry there was an error';
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
      header('Location: add_books.php');
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
      header('Location: add_books.php');
    }
    else
    {
      $error = 'Sorry there was an error';
    }
  }

  // Search Algoriths

  if (isset($_GET['sname'])) {
    if ($_GET['bname'] == "") {
      header('Location: list_students.php');
    }
    $search = $_GET['sname'];
    if($search != ""){

    mysql_connect('localhost','root','');
    mysql_select_db('library');

    $res = mysql_query("SELECT * FROM student WHERE fname LIKE('%$search%') LIMIT 0,6");

    $searched_s = "";

    while($value=mysql_fetch_array($res)){
      $searched_s .= '<tr><td>'.$value['sid'].'</td>
        <td>'.$value['fname'].'</td>
        <td>'.$value['email'].'</td>
        <td>'.$value['program'].'</td>
        <td>'.$value['year'].'</td>
        <td>'.$value['roll_no'].'</td>
        <td>'.$value['address'].'</td>
        <td>'.$value['mobile'].'</td>
        <td>'.$value['reg_date'].'</td>
        <td>'.$value['reg_time'].'</td>
        <td>'.$value['ip_address'].'</td>
        <td><a href="list_student.php?delete='.$value['sid'].'"><button>Delete</button></a></td></tr>';
    }
    if($searched_s == ""){
      $searched_s = '<td colspan="12">Student ( '.$search.' ) Not Found</td>';
    }
  }
}

// Books searching part

  if (isset($_GET['bname'])) {
    if ($_GET['bname'] == "") {
      header('Location: add_books.php');
    }
  $search_b = $_GET['bname'];

    if($search_b != ""){

    mysql_connect('localhost','root','');
    mysql_select_db('library');

    $res = mysql_query("SELECT * FROM books WHERE name LIKE('%$search_b%') LIMIT 0,6");

    $searched_b = "";

    while($value=mysql_fetch_array($res)){
      $searched_b .= '<tr><td>'.$value['bid'].'</td>
        <td>'.$value['name'].'</td>
        <td>'.$value['author'].'</td>
        <td>'.$value['subject'].'</td>
        <td>'.$value['publisher'].'</td>
        <td>'.$value['edition'].'</td>
        <td>'.$value['category'].'</td>
        <td><a href="edit_book.php?bid='.$value['bid'].'"><button>Edit</button></a>
          <a href="add_books.php?delBook='.$value['bid'].'"><button>Delete</button></a></td></tr>';
    }
    if($searched_b == ""){
      $searched_b = '<td colspan="12">Books ( '.$search_b.' ) Not Found</td>';
    }
  }
}

// Ebook searching part

  if (isset($_GET['ename'])) {
    if ($_GET['bname'] == "") {
      header('Location: add_ebooks.php');
    }
    $search_e = $_GET['ename'];

    if($search_e != ""){

    mysql_connect('localhost','root','');
    mysql_select_db('library');

    $res = mysql_query("SELECT * FROM ebooks WHERE name LIKE('%$search_e%') LIMIT 0,6");

    $searched_e = "";

    while($value=mysql_fetch_array($res)){
      $searched_e .= '<tr><td>'.$value['eid'].'</td>
        <td>'.$value['name'].'</td>
        <td>'.$value['subject'].'</td>
        <td>'.$value['category'].'</td>
        <td>
        <a href="edit_ebook.php?eid='.$value['eid'].'"><button>Edit</button></a>
        <a href="add_ebooks.php?delEbook='.$value['eid'].'"><button>Delete</button></a>
        </td></tr>';
    }
    if($searched_e == ""){
      $searched_e = '<td colspan="12">E-Books ( '.$search_e.' ) Not Found</td>';
    }
  }
}

  if (isset($_GET['nname'])) {
    if ($_GET['bname'] == "") {
      header('Location: add_notes.php');
    }
    $search_n = $_GET['nname'];

    if($search_n != ""){

    mysql_connect('localhost','root','');
    mysql_select_db('library');

    $res = mysql_query("SELECT * FROM notes WHERE name LIKE('%$search_n%') LIMIT 0,6");

    $searched_n = "";

    while($value=mysql_fetch_array($res)){
      $searched_n .= '<tr><td>'.$value['nid'].'</td>
        <td>'.$value['name'].'</td>
        <td>'.$value['subject'].'</td>
        <td>'.$value['category'].'</td>
        <td>
        <a href="edit_note.php?nid='.$value['nid'].'"><button>Edit</button></a>
        <a href="add_notes.php?delNote='.$value['nid'].'"><button>Delete</button></a>
        </td></tr>';
    }
    if($searched_n == ""){
      $searched_n = '<td colspan="12">Notes ( '.$search_n.' ) Not Found</td>';
    }
  }

}
?>
