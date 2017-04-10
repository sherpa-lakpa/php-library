<link rel="stylesheet" type="text/css" href="style.css">
	<div class="lcontainer" >
	<!-- BEGINING OF FEEDBACK -->
	<?php
		include_once('manage.feedbacks.php');
	?>
	<div  class="scontainer">
	<!--FEEDBACK-BEGINS-->
	<div id="feedback" class="grid60" >
		<center>
		<section style="font-size:30px;font-weight:bolder;text-align:center;" id="heading">FEEDBACK</section><br>
		<section id="text">Your comments can help make our site better for everyone. If you've found something incorrect,broken or frustrating on this site, let us know so that we can improve it.</section>

		<div class="fbdiv grid80" >
		<div >
		<ul class="tabs" >
			<li><a href="#idea"><img src="gallery/logo/bulb.png">Idea</a></li>
			<li><a href="#problem"><img src="gallery/logo/problem.png">Problem</a></li>
			<li><a href="#question"><img src="gallery/logo/question.png">Question</a></li>
			<li><a href="#praise"><img src="gallery/logo/praise.png">Praise</a></li>
		</ul>

		<div class="tabcontents" >
				<div id="idea">
				<form method="post" action="#">
					<input type="hidden" name="feed_type" value="idea">
					<textarea placeholder="Your feedback" name="feeds"></textarea>
					<input type="submit" value="Submit Feedback" name="feed" class="fsubmit">
				</form>
				</div>

				<div id="problem">
				<form method="post" action="#">
					<input type="hidden" name="feed_type" value="problem">
					<textarea placeholder="Your feedback" name="feeds"></textarea>
					<input type="submit" value="Submit Feedback" name="feed" class="fsubmit">
				</form>
				</div>
				<div id="question">
				<form method="post" action="#">
					<input type="hidden" name="feed_type" value="question">
					<textarea placeholder="Your feedback" name="feeds"></textarea>
					<input type="submit" value="Submit Feedback" name="feed" class="fsubmit">
				</form>
				</div>

				<div id="praise">
				<form method="post" action="#">
					<input type="hidden" name="feed_type" value="praise">
					<textarea placeholder="Your feedback" name="feeds"></textarea>
					<input type="submit" value="Submit Feedback" id="submit" name="feed" class="fsubmit">
				</form>
				</div>
		</div>
		</div>
		</div>
		</div>
	<!-- END OF FEEDBACK -->

<div style="position:absolute;left:185px;top:30px;">
<?php
if(isset($_SESSION['todo_name'])){

	echo '<div style="float:right;color:white;padding:10px;border-radius:5px;z-index:3;font-size:17px;text-transform:uppercase;" id="hello"> <b>'.$_SESSION['todo_name'].'&nbsp;&nbsp;<br><section style="font-size:15px;text-transform:capitalize;text-align:left;color:#231A11;">4th Semester</section></b></div>';}


 ?>




		</div>
<?php
	//echo 'hello! '.$student_name;
	include_once('class.student.php');

		$init =  new manageStu();

		if(isset($_SESSION['std_mob']))
			$student = $_SESSION['std_mob'];
		else
			$student = $_SESSION['std_id'];

		$list_stu = $init->listStu($student);

		foreach ($list_stu as $key => $value) {
          $sid = $value['sid'];
          $fname = $value['fname'];
          $program = $value['program'];
          $year = $value['year'];
          $roll_no = $value['roll_no'];
          $mobile = $value['mobile'];
          $image = $value['image'];
          if($image == '')
          {
            $image = 'gallery/blankprofile.jpg';
          }
      }

				?>
<!--START OF FULL INFO-->
				<table class="loggedin_table grid80" id="profile">
					<tr><img src="gallery/unchecked.png" onClick="cancel()" style="height:25px;width:25px;cursor:pointer;position:relative;top:-535px;right:-430px;z-index:9;" id="close">
						<td colspan="2" style="text-align:center;font-size:20px;border-radius:5px 5px 0px 0px;box-shadow:none;">STUDENT INFORMATION</td>
					</tr>
					<tr>
						<td colspan="2" style="padding:0px;border:0px;text-align:center;" ><?php echo '<img src="'.$image.'" class="studentpicture"><br><br>'; ?></td>
					</tr>
					<tr>
						<td>Student Id.:</td>
						<td><?php echo $sid; ?></td>

					</tr>
					<tr>
						<td>Name:</td>
						<td><?php echo $fname; ?></td>
					</tr>
					<tr>
							<td>Program:</td>
					<td><?php echo $program; ?></td>
				</tr>
				<tr>
					<td>Year:</td>
					<td><?php echo $year; ?></td>
				</tr>
				<tr>
					<td>Roll No.:</td>
					<td><?php echo $roll_no; ?></td>
				</tr>
				<tr>
					<td>Mobile No.:</td>
					<td><?php echo $mobile; ?></td>
				</tr>
<!--END OF FULL INFO.-->
			</table>

<!-- STARTING FOR EDITING OF PROFILE-->
<?php include_once('editStu.php'); ?>
<!--END OF EDITTING OF PROFILE-->

			<div id="top_display">
				<div class="first" style="width:100%;height:85px;float:left;border:5px solid #07602F;border-top:0px;border-left:0px;border-right:0px;border-radius:0px 0px 100px 100px ;">

				</div>
				<div style="width:100%;height:50px;float:left;margin-left:30px;" class="top_display1">


			</div>
			<?php echo '<img src="'.$image.'" class="studentpicture" id="student_picture" style="z-index:10;box-shadow:0px 0px 0px white;padding:5px;position:absolute;top:1px;
		left:5px;border-radius:100%;border:5px inset #07602F;background:rgba(255,255,255,0.3);"><br><br>'; ?>

			</div>
			<button onClick="hello()" id="top_button1">Full Info.</button>
			<a href="result.php"><button id="mbutton">Marksheet</button></a>
			<button onClick="edit_profile()" id="editbutton">Edit</button>

<!--LOGOUT BUTTON-->
			<?php
					if(isset($_SESSION['todo_name'])){
					  echo '<a href="libs/logout.php"><div style="float:left;color:red;margin-left:5px;background:rgba(0,0,0,0.7);font-size:12px;padding:5px;box-shadow:0px 2px 5px black;border-radius:5px;cursor:pointer;position:relative;top:-7px;right:-410px;" id="hello_logout">LogOut</div></a>';
					}
					?>

<div>

<?php
	include_once('class.student.php');

	$init =  new manageStu();

	$sid = $student_id;

	$totalStuIssue = $init->totalStuIssue($sid);

	$listStuIssue = $init->listStuIssue($sid);

?>
<div id="hide1">
			<table style="margin-top:110px;" class="issued_number" id="table1">
				<tr>
				<td>No. of books issued:</td>
				<td id="book_number"><?php echo $totalStuIssue; ?></td>
			</tr>
			</table>

			<?php
				if($listStuIssue == 0){
					?>
					<table class="issued_book" id="table2">

					<tr>
							<td rowspan="4" style="" ><img src="image/demo.jpg" id="book_image"></td>
					</tr>
					<tr>

						<td colspan="2"><span class="book_name">No Books isseued</span></td>
					</tr>
						
						<td>Issued Date:</td>
						<td>yyyy-mm-dd</td>
					</tr>
					<tr>
						<td>Return date:</td>
						<td>yyyy-mm-dd</td>
					</tr>
					<tr>
			</table>
					<?php
				}else
					foreach ($listStuIssue as $key => $listB) {
			?>

			<table class="issued_book" id="table3">

				<tr>
					<td rowspan="4" style="" ><img src="<?php echo $listB['image']; ?>" id="book_image"></td>
				</tr>
				<tr>

					<td colspan="2"><span class="book_name"><?php echo $listB['name']; ?></span>
					 <input type="hidden" name="book<?php echo $listB['bid']; ?>" id="book<?php echo $listB['bid']; ?>" value="<?php echo $listB['bid']; ?>" />

					 <input type="hidden" name="book_id<?php echo $listB['bid']; ?>" id="book_id<?php echo $listB['bid']; ?>" value="<?php echo $listB['tid']; ?>" />
						<button class="buttoning" id="del_issues<?php echo $listB['bid']; ?>" style="background: red;color: white; border-radius: 30%;"><h2 style="padding: 0px;margin: 0px;">X</h2>
						</button>
          <script>
  //on the click of the submit button 
$("#del_issues<?php echo $listB['bid']; ?>").click(function(){

 var del_book_id = $('#book_id<?php echo $listB['bid']; ?>').val();
 var bookmark_id = $('#book<?php echo $listB['bid']; ?>').val();
 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"del_book_id":del_book_id,"bookmark_id":bookmark_id};
 //call your .php script in the background, 
 //when it returns it will call the success function if the request was successful or 
 //the error one if there was an issue (like a 404, 500 or any other error status)
 $.ajax({
    url : "manage.bookmark.php",
    type: "POST",
    data : myData,
    success: function(data,status,xhr)
     {
        //if success then just output the text to the status div then clear the form inputs to prepare for new data
        $("#status_text").html(data);
        location.reload();
        
         }

}); 
 
}); 
</script>

						</td>
					</tr>
					<?php
					if($listB['issuedate'] == '0000-00-00'){
						$bookmarked = $listB['bookmarked'];

						$today = date("Y-m-d");

						/* Find yesterday */
						$day1 = substr($today, -2);
						$day2 = substr($bookmarked, -2);
						$day = $day1-$day2;

						$month1 = substr($today, 6, 2);
						$month2 = substr($bookmarked, 6, 2);

						if ($bookmarked == $today && $month1 == $month2) {
							$bookmark = 'Today';
						}elseif($day < 2 && $month1 == $month2){
							$bookmark = 'Yesterday';
						}elseif($day < 3 && $month1 == $month2){
							$bookmark = 'Day before yesterday';
						}else{
							$bookmark = $bookmarked;
						}

						echo "<tr>
								<td>Bookmark Date:</td>
								<td>$bookmark</td>
							</tr>";
					}else{ echo '<script>
					$( ".buttoning" ).hide();
					</script>'; ?>
					<tr>
						<td>Issued Date:</td>
						<td><?php echo $listB['issuedate']; ?></td>
					</tr>
					<tr>
						<td>Return date:</td>
						<td><?php echo $listB['submission']; ?></td>
					</tr>
					<?php } ?>
			</table>
			<?php
				}
			?>
			<!-- DESIGN 2 -for issued books-->
			

</div>
			</div><?php include_once('footer.php');?>
          </div>
  </div>
</div>

<script type="text/javascript">
function hello()
	{
		document.getElementById('hello_logout').style.display="none";
		document.getElementById('profile').style.display="inline-block";
		document.getElementById('top_display').style.display="none";
		document.getElementById('top_button1').style.display="none";
		document.getElementById('editbutton').style.display="none";
		document.getElementById('student_picture').style.display="none";
		document.getElementById('hello').style.display="none";
			//	document.getElementById('editbutton').style.display="inline";
		//document.getElementById('close').style.display="none";
		document.getElementById('hide1').style.display="none";
		document.getElementById('mbutton').style.display="none";


	};
	function cancel()
	{

		document.getElementById('hello_logout').style.display="inline-block";
		document.getElementById('profile').style.display="none";
		document.getElementById('top_display').style.display="block";
		document.getElementById('top_button1').style.display="inline";
		document.getElementById('editbutton').style.display="inline";
		document.getElementById('student_picture').style.display="block";
		document.getElementById('hello').style.display="block";
		document.getElementById('feedback').style.display="none";
		document.getElementById('edit_profile').style.display="none";
		document.getElementById('editclose').style.display="none";

		//document.getElementById('editbutton').style.display="none";
		document.getElementById('hide1').style.display="inline";
		document.getElementById('mbutton').style.display="inline";

	};
	function edit_profile()
	{
		//document.getElementById('hello_logout').style.display="none";
		document.getElementById('edit_profile').style.display="inline";
		document.getElementById('top_display').style.display="none";
		document.getElementById('top_button1').style.display="none";
		document.getElementById('editbutton').style.display="none";
		document.getElementById('student_picture').style.display="none";
		document.getElementById('hello').style.display="none";
		document.getElementById('editdiv').style.display="inline";
		document.getElementById('hello_logout').style.display="none";
		document.getElementById('mbutton').style.display="none";

		document.getElementById('profile').style.display="none";
		document.getElementById('hide1').style.display="none";
		document.getElementById('editclose').style.display="inline";

	}
	function feedback()
	{
		document.getElementById('feedback').style.display="inline";
		document.getElementById('top_display').style.display="none";
		document.getElementById('top_button1').style.display="none";
		document.getElementById('editbutton').style.display="none";
		document.getElementById('student_picture').style.display="none";
		document.getElementById('hello').style.display="none";
	}
</script>
