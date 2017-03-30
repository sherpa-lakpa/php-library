<?php
  
  include_once('class/class.ManageStudents.php');
  $init = new ManageStudents();

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
          $stu_pagination.= '<a href="students.php?page='.$next.'">Next</a>';
          }
          if($page != 1){
          $prev = $page-1;
          $stu_pagination.= '<a href="students.php?page='.$prev.'">Previous</a>';
          }
        }

    }
  }
   // Search Algoriths

  if (isset($_GET['sname'])) {
    if ($_GET['sname'] == "") {
      header('Location: students.php');
    }
    $search = $_GET['sname'];
    if($search != ""){

    $result = $init->searchStu($search);

    $searched_s = "";

    foreach ($result as $key => $value) {

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
        <td><a href="student.php?delete='.$value['sid'].'"><button>Delete</button></a></td></tr>';
    }
    if($searched_s == ""){
      $searched_s = '<td colspan="12">Student ( '.$search.' ) Not Found</td>';
    }
  }
}

  if(isset($_GET['deleteStu'])){
    $id = $_GET['deleteStu'];
    $delete = $init->deleteStu($id);
    if($delete == 1)
    {
      $success = 'You have deleted it sucessfully';
      header('Location: students.php');
    }
    else
    {
      $error = 'Sorry there was an error';
    }
  }