<?php
	include_once('libs/get_marksheet.php');
?>
<html>
<head><title>Result | St.Lawrence College</title></head>
<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="shortcut icon" href="gallery/stlawrence.PNG"/>

<body>

<div class="result_wrapper">
  <a href="javascript:history.back()"><img src="gallery/logo/home1.png" style="height:50px;width:50px;position:absolute;top:50px;left:20px;"></a>
  <div class="resultsearch grid60">
    <form method="GET">
      <input type="text" placeholder="Enter your User-Id or your Symbol number" name="rsymnum" class="grid50">
      <input type="submit" value="Search" class="button grid20 back-trans text-white">
    </form>

  </div>
</div>
<div class='rfooter'>

<section onClick="feedback()" style="cursor:pointer" id="footer_feedback">Feedback</section>
<a href="index.php">Home</a>
<img src="gallery/logo/facebook.png" class="footer_image">
<img src="gallery/logo/instagram.png" class="footer_image">
<img src="gallery/logo/twitter.png" class="footer_image">
<img src="gallery/logo/google-plus.png" class="footer_image">

</div>
