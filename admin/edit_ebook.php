<?php
  include_once('session.php');
  include_once('header.php');
  include_once('manage/manage.ebooks.php');
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
		      foreach ($list_ebook as $key => $values) {
		      	?>
		    <tr class="trans"><td colspan="2" style="font-size:30px; color:teal;">Edit ebooks</td></tr>
		    <tr>
			<tr>
			  <td><label for="Title">Name:</label></td>
				<td><input type="text" name="name" id="name" value="<?php echo $values['name']; ?>" /></td>
			</tr>
			<tr>
			  <td><label for="Title">Subject:</label></td>
				<td><input type="text" name="subject" id="subject" value="<?php echo $values['subject']; ?>" /></td>
			</tr>
			<tr>
			  <td><label for="Title">Category:  </label></td>
				<td><select name="category">
							<option value="<?php echo $values['category']; ?>"><?php echo $values['category']; ?></option>
							<?php
							$book = new ManageEbooks;
							$result = $book->GetCat();
							foreach ($result as $key => $value) {
							echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
							}
							?>
						</select></td>
		    </tr>
		    <tr>
		      	<td>
					Choose file:</td><td> <input type="file" name="file" />
				</td>
		    </tr>
		    <tr>
		    <td colspan="2">
		      		<input type="submit" name="edit_ebook" value="Edit"/>
		    </td></tr>

	</form>
</table>

    <?php   
    }
    ?>
</div>

</body>
</html>
