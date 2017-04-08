<?php
  include_once('session.php');
  include_once('header.php');
  include_once('class/class.ManageIssue.php');
  include_once('manage/manage.issues.php');
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
    <form method="post" action="edit_issue.php" enctype="multipart/form-data">
    <?php
      foreach ($list_issue as $key => $values) {
    ?>
      <tr class="trans"><td colspan="2" style="font-size:30px; color:black;">Edit Issue</td></tr>
      <tr>
      <tr>
        <td><label for="Title">Book Id:</label></td>
  			<td><input type="text" name="b_id" id="b_id" value="<?php echo $values['b_id']; ?>" /></td>
      </tr>
      <tr>
        <td><label for="Title">Student Id:</label></td>
  			<td><input type="text" name="s_id" id="s_id" value="<?php echo $values['s_id']; ?>" /></td>
      </tr>
      <tr>
        <td><label for="Title">Issued Date:</label></td>
        <td><input type="text" name="issuedate" id="issuedate" value="<?php echo $values['issuedate']; ?>" /></td>
      </tr>
      <tr>
        <td><label for="Title">Submission Date:</label></td>
        <td><input type="text" name="submission" id="due_date" value="<?php echo $values['submission']; ?>" /></td>
      </tr>
      <tr>
      <tr>
        <td colspan="2"><input type="submit" value="Edit" name="edit_issue" style="background:green;color:white;border:0px;"/></td>
      </tr>
    <?php
      }
    ?>
  	</form>
</table>


</div>

</body>
</html>
