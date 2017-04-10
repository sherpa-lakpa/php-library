<?php
  include_once('session.php');
  include_once('header.php');
  include_once('manage/manage.category.php');
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
		      foreach ($list_category as $key => $values) {
		      	?>
		    <tr class="trans"><td colspan="2" style="font-size:30px; color:black;">Edit Category</td></tr>
		    <tr>
			<tr>
			  <td><label for="Title">Name:</label></td>
				<td><input type="text" name="name" id="name" value="<?php echo $values['name']; ?>" /></td>
			</tr>
		    <tr>
		    <td colspan="2">
		      		<input type="submit" name="edit_category" value="Edit"/>
		    </td></tr>

	</form>
</table>

    <?php
    }
    ?>
</div>

</body>
</html>
