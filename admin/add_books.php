<?php
  include_once('session.php');
  include_once('header.php');
  include_once('class.ManageBooks.php');
  include_once('manage.books.php');
?>

<div class="main_content" onClick="avoid()"><center>
  <?php
		if(isset($error))
			echo '<div class="alert alert-error">'.$error.'</div>';
		?>
	<?php
		if(isset($success))
			echo '<div class="alert alert-success">'.$success.'</div>';
	?>

<img src="../gallery/logo/filee.png" style="height:50px;width:50px;cursor:pointer" id="clickadd" onClick="add()">
<img src="../gallery/logo/file.png" style="height:50px;width:50px;cursor:pointer;" id="search_image" onClick="search()">

<table id="admin_table">
    <form method="post" action="add_books.php" enctype="multipart/form-data">
      <tr class="trans"><th colspan="2">Adding new books</th></tr>
      <tr>
      <tr>
        <td><label for="Title">Name:</label></td>
  			<td><input type="text" name="name" id="name" /></td>
      </tr>
      <tr>
        <td><label for="Title">Author:</label></td>
  			<td><input type="text" name="author" id="author" /></td>
      </tr>
       <tr>
        <td><label for="Title">Subject:</label></td>
  			<td><input type="text" name="subject" id="subject" /></td>
      </tr>
        <td><label for="Title">Publisher:</label></td>
  			<td><input type="text" name="publisher" id="publisher" /></td>
      </tr>
      <tr>
        <td><label for="Title">Edition:</label></td>
  			<td><input type="text" name="edition" id="edition" /></td>
      </tr>
      <tr>
        <td><label for="Title">Semester:</label></td>
  			<td><select name="semester">
  				<option value="">Select</option>
  				<option value="1">1</option>
  				<option value="2">2</option>
  				<option value="3">3</option>
  				<option value="4">4</option>
  				<option value="5">5</option>
  				<option value="6">6</option>
  				<option value="7">7</option>
  				<option value="8">8</option>
  			</select></td>
      </tr>
       <tr>
      <tr>
        <td><label for="Title">Category:</label></td>
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

      <tr>
        <td>Choose Image:</td><td> <input type="file" name="file" /></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Upload" name="add_books" class="button"/></td>
      </tr>

  	</form>
</table>


<div class="displaycontainer">
<center>
<section id="search">
  <form method="get" action="#" class="searching">
  <input type="text" name="bname" placeholder="Search by Name..">
  <input type="submit" id="search_b" value="Search">
  </form>
</section></center>
  <table class="table table-striped">
    <thead>
      <tr>
        <td>bid</td>
        <td>name</td>
        <td>author</td>
        <td>subject</td>
        <td>publisher</td>
        <td>edition</td>
        <td>category</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
      if(!isset($_GET['bname'])){

      if($list_book !== 0)
      {
        foreach ($list_book as $key => $value) {
          ?>
          <td><?php echo $value['bid']; ?></td>
          <td><?php echo $value['name']; ?></td>
          <td><?php echo $value['author']; ?></td>
          <td><?php echo $value['subject']; ?></td>
          <td><?php echo $value['publisher']; ?></td>
          <td><?php echo $value['edition']; ?></td>
          <td><?php echo $value['category']; ?></td>
           ?></td>
          <td>
          <a href="edit_book.php?bid=<?php echo $value['bid'];?>"><button>Edit</button></a>
          <a href="add_books.php?delBook=<?php echo $value['bid'];?>"><button>Delete</button></a>
          </td>
          </tr>
          <?php
        }
      }else{
        echo '<td colspan="8">Sorry no more Books to show under this section</td><';
      }
      ?>
      </tr>
      <tr><td colspan="8"><?php echo $pagination; ?></td></tr>
      <?php
	    }else{
	      echo $searched_b;
	    }
	  ?>
    </tbody>
    </table>
</div>
	</div>
<script>

</script>
</body>
</html>
