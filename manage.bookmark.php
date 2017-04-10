<?php
 include_once('class.ManageUsers.php');
 $init = new ManageUsers();

  if(isset($_POST['book_id'])){

    $bookmark = date("Y-m-d");

    $s_id = $_POST['s_id'];
    $b_id = $_POST['book_id'];

    $check = $init->checkBookmark($b_id,$s_id);

    $check_quantity = $init->checkQunatity($b_id);

    $check_limit = $init->checkLimit($s_id);

    if ($check < 1) {
      foreach ($check_quantity as $key => $value) {
        $checker = $value['quantity'];
      }
      if ($checker > 0) {
        if ($check_limit < 6) {
        $addIssue = $init->bookmarkBook($bookmark,$b_id,$s_id);
        $decBook = $init->decBook($b_id);
          if($addIssue == 1){
            $success = 'success!';
          }
          else{
              echo 'Failed to add Issue';
          }
        }else{
          echo "You can book only 6 items!";
        }
      }else{
        if ($checker < 0) {
          $init->setZero($b_id);
        }
        echo "No Quantity left!";
      }
    }else{
        echo "You have already bookmarked this book!";
      }
  }

  if (isset($_POST['del_book_id'])) {

    $issue_id = $_POST['del_book_id'];
    $book_id = $_POST['bookmark_id'];

    $del = $init->delIssue($issue_id);

    $incBook = $init->incBook($book_id);
  }
?>