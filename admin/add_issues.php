<?php
  include_once('session.php');
  include_once('header.php');
  include_once('manage.issues.php');
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
  <img src="../gallery/logo/filee.png" style="height:50px;width:50px;cursor:pointer" id="clickadd" onClick="add()">
    <img src="../gallery/logo/file.png" style="height:50px;width:50px;cursor:pointer;" id="search_image" onClick="search()">
<table id="admin_table">
    <form method="post" action="add_issues.php" enctype="multipart/form-data">
      <tr class="trans"><th colspan="2">Adding new Issue</th></tr>
      <tr>
      <tr>
        <td><label for="Title">Book Id:</label></td>
  			<td><input type="text" name="b_id" id="b_id" /></td>
      </tr>
      <tr>
        <td><label for="Title">Student Id:</label></td>
  			<td><input type="text" name="s_id" id="s_id" /></td>
      </tr>
      <tr>
        <td><label for="Title">Submission Date:</label></td>
        <td><input type="text" name="submission" id="due_date" /></td>
      </tr>
      <tr>
      <tr>
        <td colspan="2"><input type="submit" value="Upload" name="add_issues" class="button"/></td>
      </tr>

  	</form>
</table>


<div class="displaycontainer">
<center>
<section id="search">
<form method="get" action="#" class="searching">
  <input type="text" name="idate" placeholder="Search by Date..">
  <input type="submit" id="search_i" value="Search">
</form>
</section></center>
  <table class="table table-striped">
    <thead>
      <tr>
        <td>tid</td>
        <td>Issued date</td>
        <td>Student</td>
        <td>Book</td>
        <td>Submission date</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
      if(!isset($_GET['idate'])){
      if($list_issue !== 0)
      {
        foreach ($list_issue as $key => $value) {
          ?>
          <td><?php echo $value['tid']; ?></td>
          <td><?php echo $value['issuedate']; ?></td>
          <td><?php echo $value['fname']; ?></td>
          <td><?php echo $value['name']; ?></td>
          <td><?php echo $value['submission']; ?></td>
           ?></td>
          <td>
          <a href="edit_issue.php?tid=<?php echo $value['tid'];?>"><button>Edit</button></a>
          <a href="add_issues.php?delIssue=<?php echo $value['tid'];?>"><button>Delete</button></a>
          </td>
          </tr>
          <?php
        }
      }else{
        echo '<td><td></td></td><td><td>Sorry no more Student to show under this section</td></td><td></td><td></td>';
      }
      ?>
      </tr>
      <tr><td colspan="7"><?php echo $pagination; ?></td></tr>
    <?php
      }else{
        echo $searched_i;
      }
    ?>
    </tbody>
    </table>
</div>
	</div>
</body>
</html>
