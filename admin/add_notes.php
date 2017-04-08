<?php
  include_once('session.php');
  include_once('header.php');
  include_once('class.ManageBooks.php');
  include_once('manage.books.php');
?>

<div class="main_content"><center>
  <?php
    if(isset($error))
      echo '<div class="alert al  ert-error">'.$error.'</div>';
    ?>
  <?php
    if(isset($success))
      echo '<div class="alert alert-success">'.$success.'</div>';
  ?>
  <img src="../gallery/logo/filee.png" style="height:50px;width:50px;cursor:pointer" id="clickadd" onClick="add()">
  <img src="../gallery/logo/file.png" style="height:50px;width:50px;cursor:pointer;" id="search_image" onClick="search()">
<table id="admin_table">
  <form method="post" action="add_notes.php" enctype="multipart/form-data">
        <tr class="trans"><th colspan="2">Uploading new Note</th></tr>
        <tr>
    <tr>
      <td><label for="Title">Name:</label></td>
      <td><input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td><label for="Title">Subject:</label></td>
      <td><input type="text" name="subject" id="subject" /></td>
    </tr>
    <tr>
      <td><label for="Title">Category:  </label></td>
      <td><select name="category">
        <option value="">Select</option>
        <?php
        $book = new ManageBooks;
        $result = $book->GetCat();
        foreach ($result as $key => $value) {
        echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
        }
        ?>
      </select></td>
    </tr>
    <tr>
      <td>
      Choose file:</td><td> <input type="file" name="file" /></td>
    </tr>
    <tr>
    <td colspan="2">
          <input type="submit" name="add_notes" class="button" />
    </td></tr>

  </form>
</table>


<div class="displaycontainer">
<center>
<section id="search">
<form method="get" action="#" class="searching">
  <input type="text" name="nname" placeholder="Search by Name..">
  <input type="submit" id="search_n" value="Search">
</form>
</section></center>
  <table class="table table-striped" >
  <thead>
    <tr>
      <td>nid</td>
      <td>name</td>
      <td>subject</td>
      <td>category</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
     if(!isset($_GET['nname'])){

    if($list_note !== 0)
    {
      foreach ($list_note as $key => $value) {
        ?>
        <td><?php echo $value['nid']; ?></td>
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $value['subject']; ?></td>
        <td><?php echo $value['category']; ?></td>
         ?></td>
        <td>
        <a href="edit_note.php?nid=<?php echo $value['nid'];?>"><button>Edit</button></a>
        <a href="add_notes.php?delNote=<?php echo $value['nid'];?>"><button>Delete</button></a>
        </td>
        </tr>
        <?php
      }
    }else{
      echo '<td><td></td></td><td><td>Sorry no more Student to show under this section</td></td><td></td><td></td>';
    }
    ?>
    </tr>
    <tr><td colspan="5"><?php echo $note_pagination; ?></td></tr>
    <?php
      }else{
        echo $searched_n;
      }
    ?>
  </tbody>
  </table>
</div>

  </div>
</body>
</html>
