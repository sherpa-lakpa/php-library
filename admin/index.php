<?php
  include_once('session.php');
  include_once('header.php');
  include_once('class/class.admin.php');
  $init = new ManageDashbord();
?>
<div class="main_content"><center>
	   <div class="dash"><center>
        <div class="container1">
          <Section><?php echo $init->countStu(); ?></section>
          Total Students
            <a href="students.php"><div class="inner_container">
              See the full list
            </div></a>
        </div>
        <div class="container1">
          <section><?php echo $init->countBooks(); ?></section>
          Total Books
            <a href="books.php"><div class="inner_container">
              See the full list
            </div></a>
        </div>
        <div class="container1">
          <section><?php echo $init->countEbooks(); ?></section>
          Total Ebooks
            <a href="ebooks.php"><div class="inner_container">
              See the full list
            </div></a>
        </div>
        <div class="container1">
          <section><?php echo $init->countNotes(); ?></section>
          Total Notes
            <a href="notes.php"><div class="inner_container">
              See the full list
            </div></a>
        </div>
        <div class="container1">
          <section><?php echo $init->countIssues(); ?></section>
          Total Issued
            <a href="issues.php"><div class="inner_container">
              See the full list
            </div></a>
        </div>
          <div class="display_container">



          </div>
        </div>

    </div>

</div>
</body>
</html>
