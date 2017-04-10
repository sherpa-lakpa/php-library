<?php
  include_once('class/class.ManageCat.php');
  $init = new ManageCategorys();


  if(isset($_GET['cid']))
  {
    $id = $_GET['cid'];
    $list_category = $init->listIdCat($id);

  }else{

    $count = $init->getno_cats();

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

    $list_category = $init->listCat($limit);

    $category_pagination = "";
    
    if($lastPage != 1){
      if($page != $lastPage){
      $next = $page+1;
      $category_pagination.= '<a href="category.php?page='.$next.'">Next</a>';
      }
      if($page != 1){
      $prev = $page-1;
      $category_pagination.= '<a href="category.php?page='.$prev.'">Previous</a>';
      }
    }

  }

// Ebooks Management Part

  if(isset($_POST['add_categorys'])){

    $name = $_POST['name'];

		$addEbook = $init->addCat($name);
    if($addEbook == 1){
      $success = 'success!';
       header('Location: category.php');
    }
		else
			{
				$error = 'Failed to add category';
			}
  }

  if(isset($_POST['edit_category'])){

    $id = $_GET['cid'];

    $name = $_POST['name'];

    $edit = $init->editCat($id,$name);
    if($edit == 1)
    {
      header('Location: category.php');
    }else{
      $error = 'There was an error';
    }
  }

  if(isset($_GET['delCat'])){
    $id = $_GET['delCat'];
    $delete = $init->deleteCat($id);
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

  if (isset($_GET['cname'])) {
    if ($_GET['cname'] == "") {
      header('Location: category.php');
    }

    $search_c = $_GET['cname'];
    if($search_c != ""){

    $result = $init->searchCat($search_c);

    $searched_c = "";

    foreach ($result as $key => $value) {
      $searched_c .= '<tr><td>'.$value['cid'].'</td>
        <td>'.$value['name'].'</td>
        <td>
        <a href="edit_category.php?cid='.$value['cid'].'"><button>Edit</button></a>
        <a href="category.php?delCat='.$value['cid'].'"><button>Delete</button></a>
        </td></tr>';
    }
    if($searched_c == ""){
      $searched_c = '<td colspan="12">Category ( '.$search_c.' ) Not Found</td>';
    }
  }
}
