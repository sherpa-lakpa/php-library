<?php
  include_once('session.php');
  include_once('header.php');
   include_once('class.admin.php');
  $init = new ManageDashbord();

  $feeds_display = $init->getFeedbacks();
?>

<div class="main_content"><center>
  <?php
  	foreach ($feeds_display as $key => $value) {
  		echo '<div style="margin:20px;padding:10px;background:gold;"> " '.$value['feed_type'].' "<br> By ';
  		echo $value['feedby'].'<br>';
  		echo $value['feeds'].'</div>';
  	}
  ?>
</div>

</body>
</html>
