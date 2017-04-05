
<div id="editdiv">
	<table class="loggedin_table grid80" id="edit_profile" >
		<tr>
			<img src="gallery/unchecked.png" onClick="cancel()" style="height:25px;width:25px;cursor:pointer;position:relative;top:20;left:460px;display:none;" id="editclose">
			<td colspan="2" style="text-align:center;font-size:20px;border-radius:5px 5px 0px 0px;box-shadow:none;">STUDENT INFORMATION(edit)</td>
		</tr>
		<tr>
			<td colspan="2" style="padding:0px;border:0px;text-align:center;" ><?php echo '<img src="'.$image.'" class="studentpicture"><br><br>'; ?></td>
		</tr>
		<tr>
			<td>Student Id.:</td>
			<td><?php echo $sid;?></td>

		</tr>
		<tr>
			<td>Name:</td>
			<td contenteditable="true" onBlur="saveToDatabase(this,'fname','<?php echo $sid; ?>')" onClick="showEdit(this);"><?php echo $fname; ?></td>
		</tr>
		<tr>
			<td>Program:</td>
			<td contenteditable="true" onBlur="saveToDatabase(this,'program','<?php echo $sid; ?>')" onClick="showEdit(this);"><?php echo $program; ?></td>
		</tr>
		<tr>
			<td>Year:</td>
			<td contenteditable="true" onBlur="saveToDatabase(this,'year','<?php echo $sid; ?>')" onClick="showEdit(this);"><?php echo $year; ?></td>
		</tr>
		<tr>
			<td>Roll No.:</td>
			<td contenteditable="true" onBlur="saveToDatabase(this,'roll_no','<?php echo $sid; ?>')" onClick="showEdit(this);"><?php echo $roll_no; ?></td>
		</tr>
		<tr>
			<td>Mobile No.:</td>
			<td contenteditable="true" onBlur="saveToDatabase(this,'mobile','<?php echo $sid; ?>')" onClick="showEdit(this);"><?php echo $mobile; ?></td>
		</tr>
	</table>

</div>
<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","rgba(0,0,0,0.7)");
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","rgba(0,0,0,0.4) url(pp/loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "manage.students.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&sid='+id,
				success: function(data){
					$(editableObj).css("background","rgba(0,0,0,0.2)");
				}        
		   });
		}
		</script>