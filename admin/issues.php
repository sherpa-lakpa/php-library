<?php
  include_once('session.php');
  include_once('header.php');
  include_once('manage/manage.issues.php');
?>
<div class="main_content"><center>
  <?php
		if(isset($error))
			echo '<div class="alert alert-error">'.$error.'</div>';
		if(isset($success))
			echo '<div class="alert alert-success">'.$success.'</div>';
	?>
  <img src="../gallery/logo/filee.png" style="height:50px;width:50px;cursor:pointer" id="clickadd" onClick="add()">
  <!--  <img src="../gallery/logo/file.png" style="height:50px;width:50px;cursor:pointer;" id="search_image" onClick="search()">-->
<table id="admin_table">
    <form method="post" action="#" enctype="multipart/form-data">
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
<!--<center>
<section id="search">
<form method="get" action="#" class="searching">
  <input type="text" name="idate" placeholder="Search by Date..">
  <input type="submit" id="search_i" value="Search">
</form>
</section></center>-->
  <table class="table table-striped">
    <thead>

        <tr>
          <section id="search">
          <form method="get" action="#" class="searching">
          <td colspan="12" style="">
          <input type="text" placeholder="Student Name...." id="admin_search" name="idate"/>
          <input type="Submit" name="seacher" value="Search" id="search_s"></td>
        </form>
        </tr>
      <tr>
        <td>tid</td>
         <td>Bookmark date</td>
        <td>Student</td>
        <td>Book</td>
        <td>Issued date</td>
        <td>Submission date</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      <?php
      if(!isset($_GET['idate'])){
      if($list_issue !== 0)
      {
        foreach ($list_issue as $key => $value) {
          ?>
          <tr>
          <td><?php echo $value['tid']; ?></td>
          <td><?php echo $value['bookmarked']; ?></td>
          <td><?php echo $value['fname']; ?></td>
          <td><?php echo $value['name']; ?></td>
          <td><?php echo $value['issuedate']; ?></td>
          <td><?php echo $value['submission']; ?></td>
          <td>
          <a href="edit_issue.php?tid=<?php echo $value['tid'];?>"><button>Edit</button></a>

          <input id="txt_delete<?php echo $value['tid']; ?>" type="hidden" value="<?php echo $value['tid']; ?>">
          <button id="btn_delete<?php echo $value['tid']; ?>" value="<?php echo $value['tid']; ?>">Delete</button>
          <script>
  //on the click of the submit button
$("#btn_delete<?php echo $value['tid']; ?>").click(function(){

if (confirm("Do want to Delete Issued by <?php echo $value['fname']; ?>?") == true) {
 var delIssue = $('#txt_delete<?php echo $value['tid']; ?>').val();
 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"delIssue":delIssue};
 //call your .php script in the background,
 //when it returns it will call the success function if the request was successful or
 //the error one if there was an issue (like a 404, 500 or any other error status)
 $.ajax({
    url : "issues.php",
    type: "GET",
    data : myData,
    success: function(data,status,xhr)
     {
        //if success then just output the text to the status div then clear the form inputs to prepare for new data
        $("#status_text").html(data);
        location.reload();
         }

});


} else {
    x = "You pressed Cancel!";
}
document.getElementById("demo").innerHTML = x;

});
</script>
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
