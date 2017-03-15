<?php
	include_once('libs/login_users.php');
?>
<html>
<head><title>Registration Page</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div class="registration_wrapper">
	<div class="login_bar">
		<a href="index.php"><img src="gallery/stlawrence.png"></a>

			<form class="login_info" method="post" action="#">
							<input type="text" placeholder="Id or Email" id="l_username" name="username" />
							<input type="password" placeholder="Password" id="l_password" name="password" />
							<input type="submit" id="submit" value="Login" name="logStu">
			</form>

	</div>
	<div class="body_container">

		<div class="r_container grid40 right"><center>
			<Section>Create Account</section><br>

					<div id="form_vaildation">

						<?php
				            if(isset($error)){
				                echo $error;
				            }
				        ?>
					</div>
			<br>
			<form class="reg_form" method="post" action="#" enctype="multipart/form-data">
			<table class="reg_table">
				<tr><td><input type="text" placeholder="FirstName(Required)" id="firstname" class="" name="firstname"></td>
					<td><input type="text" placeholder="LastName(Required)" id="lastname" class="" name="lastname"></td></tr>
				<tr><td colspan="2"><input type="email" placeholder="Email(required)" id="email" class="" name="email"></td></tr>
				<tr><td><input type="Password" placeholder="Password" id="password" class="" name="password"></td>
						<td><input type="Password" placeholder="Re-Password" id="repassword" class="" name="repassword"></td></tr>
				<tr><td><select name="year" id="year"><option value="blank">Select your batch</option><option>2068</option><option>2069</option><option>2070</option><option>2071</option><option>2072</option> </td>
						<td><input type="text" placeholder="Roll No.(Required)" id="roll" class="" name="roll_no"></td></tr>
						
						<tr><td><select name="semester" id="semester"><option value="blank">Select your semester</option><option>First</option><option>Second</option><option>Third</option><option>Fourth</option><option>Fifth</option><option>Sixth</option><option>Seventh</option>	<option>Eight</option></td>
						<td><input type="text" placeholder="Registration number(Required)" id="regn" class="" name="rrgn"></td></tr>


				<tr><td><input type="text" placeholder="Mobile(Required)" id="contact" class="" name="mobile"></td><td ><select name="program" id="program"><option value="blank">Select your Program</option><option>BSc. CSIT</option><option>BBS</option><option>BSW</option><option>BCA</option></select></td></tr>
				<tr><td colspan="2"><input type="text" placeholder="Address" id="address" class="" name="address"></td></tr>
				<tr><td colspan="2" id="upload" onClick=photo()		>Upload Photo</td></td></tr>
				<div id="pic_upload"><center>
				<img src="gallery/blankprofile.jpg" id="output"><br>
				<input type="file" accept="image/*" onchange="loadFile(event)" name="file" />
			<script>
			  var loadFile = function(event) {
			    var output = document.getElementById('output');
			    output.src = URL.createObjectURL(event.target.files[0]);
			  };
			</script>
			<span id="cancel" onClick=cancel()>Cancel</span>
				</div>
				<tr><td colspan="2" style="text-align:center;"><input type="checkbox" id="checkbox" name="checkbox" value="check" style="position:relative;left:-250px;top:36px;" >I agree to accept all the terms and condition of the Library.Aswell as agree to follow all the rules and regulations.</td></tr>
				<tr><td colspan="2"><input type="submit" name="regStu" value="Create Account" id="submit" onClick=validation()></td></tr>
				<div id="display" style="color:red;align:left;"></div>
		</table>

			</form>
		</div>
	</div>
</div>

<script>
function validation()
 {

	if(firstname.value=="")
	{
			document.getElementById("display").innerHTML="Please enter your First name";
	}
	else if(lastname.value=="")
	{
	document.getElementById("display").innerHTML="Please enter your Last name";
	}
	else if(email.value=="")
	{
		document.getElementById("display").innerHTML="Please enter your Email Address";
	}
	else if(password.value=="")
	{
		document.getElementById("display").innerHTML="Please enter your Password";
	}
	else if(repassword.value=="")
	{
		document.getElementById("display").innerHTML="Please enter your password again";
	}
	else if(password.value!=repassword.value)
	{
		document.getElementById("display").innerHTML="Please check the password again,It seems like it doesnt match the previously entered password!";
	}
	else if(year.value=="blank")
	{
		document.getElementById("display").innerHTML="Please select which batch you were enrolled in";
	}
	else if(roll.value=="")
	{
		document.getElementById("display").innerHTML="Please enter your Roll number";
	}
	else if(contact.value=="")
	{
		document.getElementById("display").innerHTML="Please enter your mobile number";
	}
	else if(program.value=="blank")
	{
		document.getElementById("display").innerHTML="Please select your program/faculty";
	}
	else if(checkbox.checked==false)
	{
		document.getElementById("display").innerHTML="You cannot register until you accept all the terms and conditions.";
	}
	}

</script>
<script>
function photo()
{
	document.getElementById("pic_upload").style.display="block";
};
function cancel()
{
	document.getElementById('pic_upload').style.display="none";
}
</script>

</body>
</html>
