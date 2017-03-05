<?php
  include_once('libs/session.php');
  include_once('libs/login_users.php');
  include_once('pagination.php');
   include_once('header.php');
?>

<div class="wrapper">
<center>
<?php
	if(isset($student_name)){
		include_once('scontainer.php');
	}else{
    echo '<div class="lcontainer">';

    if(!isset($_GET['sid'])){
  	   include_once('searchp.php');
    }else{
      include_once('loged.php');
      include_once('footer.php');
    }

    echo '</div>';
	}
?>

<?php
	if(isset($_GET['bid'])){
        include_once('bcontainer.php');
      }else{
  		include_once('rcontainer.php');
  	}
?>

</body>
</html>
