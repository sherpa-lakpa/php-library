
<html>
<head>
<title>St.Lawrence College Library(web version)</title>
<link rel="stylesheet" type="text/css" href="admin_style.css">
<link rel="stylesheet" href="js/jquery-ui.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script src="search.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
    var CurrentValue = $('#progress_value').val();
    $("#due_date").datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
    $("#due_date1").datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
    $("#seekbar").slider({
      range: "max",
      min: 0,
      max: 100,
      value: CurrentValue,
      slide: function( event, ui ) {
        $( "#progress" ).html( ui.value + '%' );
        $( "#progress_value" ).val( ui.value );

      }
    });
    // $("#progress_value").val($( "#seekbar" ).slider( "value" ));
  });
</script>
<script type="text/javascript">
/* When the user clicks on the butoon, toggle between hiding and showing the dropdown content */
function dropdown()
{
  document.getElementById("myDropdown").classList.toggle("show");
}
// close the dropdown menu if the user clicks outside of it //
window.onclick=function(event)
{
  if(!event.target.matches('.dropbtn'))
{
  var dropdowns = document.getElementsByClassName("dropdown-content");
  var i;
  for(i=0;i<dropdowns.length;i++)
  {
    var openDropdown=dropdowns[i];
    if(openDropdown.classList.contains('show'))
    {
      openDropdown.classList.remove('show');
    }
  }
}
}

</script>

</head>
<body>
  <?php
    include_once('session.php');

    include_once('class/class.admin.php');
    $init = new ManageDashbord();
  ?>
<div class="wrapper">

<div class="nav_bar">


  <a href="index.php"><section style="float:left;margin:20px 0px 2px 30px;font-size:35px;color:teal;font-weight:bolder;">ADMIN PANEL</section></a>
  <div class="dropdown" onclick="dropdown()">
    <button  class="dropbtn" ><img src="../gallery/avatar-3.png" id="logout" style="height:40px;width:40px;float:left;border-radius:100%;border:2px solid white;" ><section style="font-size:14px;color:white;float:left;margin :15px 0px 0px 3px;"><u><?php echo $_SESSION['todo_name']; ?></section></u> <section style="margin-top:15px;">&#9660;</section></button>
    <div id="myDropdown" class="dropdown-content">
    <a href="index.php">Admin<img src="../gallery/avatar-3.png" style="border:2px solid teal;border-radius:10px;" ></a>
    <a href="../libs/logout.php">Logout<img src="../gallery/logo/poweroff.png"></a>
    </div>
  </div>
  <section id="issues" style="color:white;float:right;"> <a href="issues.php"><img src="../gallery/logo/databasee.png"><section style="color:white;background:red;border-radius:100%;float:right;margin-top:15px;font-size:15px;padding:5px;text-align:center;margin-right:5px; "><b><?php echo $init->countIssues(); ?></b>
</section></a></section>
 <section id="issues" style="color:white;float:right;"> <a href="category.php"><img src="../gallery/logo/database.png"><section style="margin: 10px;"></section></a></section>
</div>
  <div class="sidebar">
    <ul>
       <li class="profile"><a href="#">PROFILE<br>
           <img src="../<?php echo $_SESSION['userImage']; ?>"><br>
           <span class="text-red">ADMIN</span>
           <section><?php echo $_SESSION['todo_name']; ?></section>
       </li></a>

     <a href="students.php">  <li><img src="../gallery/logo/user-list.png">STUDENTS</li></a>
       <a href="books.php"><li><img src="../gallery/logo/notebook1.png">BOOKS </li></a>
       <a href="ebooks.php"><li><img src="../gallery/logo/studiess.png">EBOOKS</li></a>
       <a href="notes.php"><li><img src="../gallery/logo/copy.png">NOTES</li></a>

   </ul>
  </div>
<script>
function logout()
{
  	document.getElementById('logout').style.display="block";
};
</script>
