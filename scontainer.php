<link rel="stylesheet" type="text/css" href="style.css">
	<div class="lcontainer" >
				<!-- BEGINING OF FEEDBACK -->
				<?php
					include_once('manage.feedbacks.php');
				?>
				<div  class="scontainer">
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
		  echo '<div style="float:right;color:white;padding:10px;border-radius:5px;z-index:3;font-size:17px;text-transform:uppercase;" id="hello"> <b>'.$_SESSION['todo_name'].'&nbsp;&nbsp;<br><section style="font-size:15px;text-transform:capitalize;text-align:left;color:#231A11;">4th Semester</section></b></div><a href="libs/logout.php"><div style="float:right;color:red;margin-left:5px;background:rgba(0,0,0,0.7);font-size:12px;position:absolute;top:40px;right:0px;padding:5px;box-shadow:0px 2px 5px black;border-radius:5px;cursor:pointer;display:none;" id="hello_logout">LogOut</div></a>';
		}
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
					<tr><img src="gallery/unchecked.png" onClick="cancel()" style="height:25px;width:25px;cursor:pointer;position:relative;top:-435px;right:-388px;" id="close">
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
	<!-- STARTING FOR EDITING OF PROFILE-->
			</table>
			<table class="loggedin_table grid80" id="edit_profile">
				<tr><img src="gallery/unchecked.png" onClick="cancel()" style="height:25px;width:25px;cursor:pointer;position:relative;top:-435px;right:-388px;" id="close">
					<td colspan="2" style="text-align:center;font-size:20px;border-radius:5px 5px 0px 0px;box-shadow:none;">STUDENT INFORMATION(edit)</td>
				</tr>
				<tr>
					<td colspan="2" style="padding:0px;border:0px;text-align:center;" ><?php echo '<img src="'.$image.'" class="studentpicture"><br><br>'; ?></td>
				</tr>
				<tr>
					<td>Student Id.:</td>
					<td><input type="text"><?php echo $sid; ?></td>

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
		</table>
<!--END OF EDITTING OF PROFILE-->

			<div id="top_display">
				<div class="first" style="width:100%;height:85px;float:left;border:5px solid #07602F;border-top:0px;border-left:0px;border-right:0px;">

				</div>
				<div style="width:100%;height:50px;float:left;margin-left:30px;">


			</div>
			<?php echo '<img src="'.$image.'" class="studentpicture" id="student_picture" style="z-index:10;box-shadow:0px 0px 0px white;padding:5px;position:absolute;top:1px;
		left:5px;border-radius:100%;border:5px inset #07602F;background:rgba(255,255,255,0.3);"><br><br>'; ?>

			</div>
			<button onClick="hello()" id="top_button1">Full Info.</button>
			<button onClick="edit_profile()" id="top_button2">Edit</button>


<div >
<?php
		include_once('class.student.php');

		$init =  new manageStu();
		$sid = $student_id;
		$totalStuIssue = $init->totalStuIssue($sid);

		$listStuIssue = $init->listStuIssue($sid);

?>

			<table style="margin-top:110px;" class="issued_number">
				<tr>
				<td>No. of books issued:</td>
				<td id="book_number"><?php echo $totalStuIssue; ?></td>
			</tr>
			</table>

			<?php
				if($listStuIssue == 0){
					?>
					<table class="issued_book">

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

			<table class="issued_book">

					<tr>
							<td rowspan="4" style="" ><img src="<?php echo $listB['image']; ?>" id="book_image"></td>
					</tr>
					<tr>

						<td colspan="2"><span class="book_name"><?php echo $listB['name']; ?></span></td>
					</tr>

						<td>Issued Date:</td>
						<td><?php echo $listB['issuedate']; ?></td>
					</tr>
					<tr>
						<td>Return date:</td>
						<td><?php echo $listB['submission']; ?></td>
					</tr>
					<tr>
			</table>
			<?php
				}
			?>

			</div><?php include_once('footer.php');?>
          </div>
  </div>
</div>

<script type="text/javascript">
function hello()
	{
		document.getElementById('hello_logout').style.display="block";
		document.getElementById('profile').style.display="inline-block";
		document.getElementById('top_display').style.display="none";
			document.getElementById('top_button1').style.display="none";
			document.getElementById('top_button2').style.display="none";
	document.getElementById('student_picture').style.display="none";
		document.getElementById('hello').style.display="none";
		//document.getElementById('close').style.display="none";

	};
	function cancel()
	{

		document.getElementById('hello_logout').style.display="none";
			document.getElementById('profile').style.display="none";
			document.getElementById('top_display').style.display="block";
		document.getElementById('top_button1').style.display="block";
		document.getElementById('top_button2').style.display="block";
		document.getElementById('student_picture').style.display="block";
document.getElementById('hello').style.display="block";
document.getElementById('feedback').style.display="none";
document.getElementById('edit_profile').style.display="none";

	};
	function edit_profile()
	{
		document.getElementById('hello_logout').style.display="none";
		document.getElementById('edit_profile').style.display="inline-block";
		document.getElementById('top_display').style.display="none";
			document.getElementById('top_button1').style.display="none";
			document.getElementById('top_button2').style.display="none";
	document.getElementById('student_picture').style.display="none";
		document.getElementById('hello').style.display="none";
	}
	function feedback()
	{
		document.getElementById('feedback').style.display="inline";
		document.getElementById('top_display').style.display="none";
			document.getElementById('top_button1').style.display="none";
			document.getElementById('top_button2').style.display="none";
	document.getElementById('student_picture').style.display="none";
		document.getElementById('hello').style.display="none";
	}
</script>
