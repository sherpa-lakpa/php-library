<?php
  include_once('session.php');
  include_once('header.php');
  include_once('manage/manage.students.php');
?>

<div class="main_content">
<div class="displaycontainer"><Center>
  <!--<img src="../gallery/logo/file.png" style="height:45px;width:45px;" id="search_image" onClick="search()">
    <section id="search">
      <form method="get" action="#" class="searching" >
        <input type="text" name="sname" placeholder="Search by Name..">
        <input type="submit" id="search_s" value="Search">
      </form></Center>
    </section>-->
<table class="table table-striped">
  <thead>
    <tr >
      <section id="search">
      <form method="get" action="#" class="searching">
      <td colspan="12" style=""><input type="text" placeholder="Enter student's initial" id="admin_search" name="sname"/><input type="Submit" value="Search" id="search_s"></td>
    </form>
    </tr>
    <tr>
      <td>Sid</td>
      <td>fname</td>
      <td>Email</td>
      <td>Program</td>
      <td>Year</td>
      <td>Roll No</td>
      <td>Address</td>
      <td>Mobile</td>
      <td>Reg. Date</td>
      <td>Reg. Time</td>
      <td>Ip Address</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <?php

    if(!isset($_GET['sname'])){

    if($list_student !== 0)
    {
      foreach ($list_student as $key => $value) {
        ?>
         <tr>
        <td><?php echo $value['sid']; ?></td>
        <td><?php echo $value['fname']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td><?php echo $value['program']; ?></td>
        <td><?php echo $value['year']; ?></td>
        <td><?php echo $value['roll_no']; ?></td>
        <td><?php echo $value['address']; ?></td>
        <td><?php echo $value['mobile']; ?></td>
        <td><?php echo $value['reg_date']; ?></td>
        <td><?php echo $value['reg_time']; ?></td>
        <td><?php echo $value['ip_address']; ?></td>
        <!--<td>
          <div class="progress progress-striped active">
          <div class="bar" style="width:<?php echo $value['progress'];?>%"></div>
          </div>
        </td>-->
        <td>
          <input id="txt_delete<?php echo $value['sid']; ?>" type="hidden" value="<?php echo $value['sid']; ?>">
          <button id="btn_delete<?php echo $value['sid']; ?>" value="<?php echo $value['sid']; ?>">Delete</button>
          <script>
  //on the click of the submit button
$("#btn_delete<?php echo $value['sid']; ?>").click(function(){

if (confirm("Do want to Delete book <?php echo $value['fname']; ?>?") == true) {
 var deleteStu = $('#txt_delete<?php echo $value['sid']; ?>').val();
 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"deleteStu":deleteStu};
 //call your .php script in the background,
 //when it returns it will call the success function if the request was successful or
 //the error one if there was an issue (like a 404, 500 or any other error status)
 $.ajax({
    url : "students.php",
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
      echo '<td colspan="12">Sorry no more Student to show under this section/td>';
    }
    ?>
    </tr>
    <tr><td colspan="12"><?php echo $stu_pagination; ?></td></tr>
  <?php
    }else{
      echo $searched_s;
    }
  ?>
  </tbody>
  </table>
</div>


</div>
