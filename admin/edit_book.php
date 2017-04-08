<?php
  include_once('session.php');
  include_once('header.php');
  include_once('class/class.ManageBooks.php');
  include_once('manage/manage.books.php');
?>

<div class="main_content"><center>
  <?php
		if(isset($error))
			echo '<div class="alert alert-error">'.$error.'</div>';
		?>
	<?php
		if(isset($success))
			echo '<div class="alert alert-success">'.$success.'</div>';
	?>
<table class="admin_table">
	<form method="post" action="" enctype="multipart/form-data">
		    <?php
		      foreach ($list_book as $key => $values) {
		      	?>
		    <tr class="trans"><td colspan="2" style="font-size:30px; color:black;">Edit Book</td></tr>
		    <tr>
			<tr>
			  <td><label for="Title">Name:</label></td>
				<td><input type="text" name="name" id="name" value="<?php echo $values['name']; ?>" /></td>
			</tr>
			<tr>
			  <td><label for="Title">Author:</label></td>
				<td><input type="text" name="author" id="author" value="<?php echo $values['author']; ?>" /></td>
			</tr>
			 <tr>
        <td><label for="Title">Subject:</label></td>
  			<td><input type="text" name="subject" id="subject" value="<?php echo $values['subject']; ?>"  /></td>
      </tr>
        <td><label for="Title">Publisher:</label></td>
  			<td><input type="text" name="publisher" id="publisher" value="<?php echo $values['publisher']; ?>"  /></td>
      </tr>
      <tr>
        <td><label for="Title">Edition:</label></td>
  			<td><input type="text" name="edition" id="edition" value="<?php echo $values['edition']; ?>"  /></td>
      </tr>
      <tr>
        <td><label for="Title">Semester:</label></td>
  			<td><select name="semester">
  				<option value="<?php echo $values['semester']; ?>" ><?php echo $values['semester']; ?></option>
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
			  <td><label for="Title">Category:  </label></td>
				<td><select name="category">
							<option value="<?php echo $values['category']; ?>"><?php echo $values['category']; ?></option>
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
					Choose Image:</td><td> <input type="file" name="file" /></td>
		    </tr>
		    <tr>
		    <td colspan="2">
		      		<input type="submit" name="edit_book" value="Edit"/>
		    </td></tr>
<?php
    }
    ?>
	</form>
</table>


</div>

</body>
</html>
