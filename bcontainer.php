<?php
 include_once('class.ManageUsers.php');
 $init = new ManageUsers();

  if(isset($_POST['add_issues'])){
    $issuedate = date("Y-m-d");
    $submission = $_POST['submission'];
    if($submission == ""){
      $submission = date("Y-m-d"); // Increase date ????
    }
    $s_id = $_POST['s_id'];
    $b_id = $_POST['b_id'];


    $addIssue = $init->addIssue($issuedate,$submission,$b_id,$s_id);
      if($addIssue == 1){
        $success = 'success!';
      }
      else{
          $error = 'Failed to add Issue';
      }
    }
?>
 <div class="rcontainer grid50"><center><br><br><br><br><br>
<div class="bcontainer">

        <div class="bookmark">
              <?php

              	echo '<script>
            		// document.getElementById("rcontainer").   Some java to hide rcontainer searcher
            		</script>';

            	$bid = $_GET['bid'];
            	$get_book = $init->getBook($bid);
            	if(isset($_GET['bid'])){
            	foreach ($get_book as $key => $value) {
            		$bid = $value['bid'];
            		$name = $value['name'];
            		$author = $value['author'];
            		$category = $value['category'];
                $publisher = $value['publisher'];
                $edition = $value['edition'];
                $subject = $value['subject'];
                $sem = $value['semester'];
            		$image = $value['image'];
                if ($image == "") {
                  $image ='4.jpg';
                }


            	if(isset($student_name)){
            	?>
                    <form method="post" action="#">
                    <input type="hidden" name="b_id" id="b_id" value="'.<?php echo $bid; ?>.'" />
                    <input type="hidden" name="s_id" id="s_id" value="'.<?php echo $student_id; ?>.'" />
                    <input type="hidden" name="submission" value="" />
                    <?php
                    echo '<button name="add_issues">Bookmark</button>
                    ';?>
                    </form>
                    <?php
            	}
             }
            }
            ?>
      </div>
    <?php echo '<img src="'.$image.'" class="display_picture"   />'; ?>

  <table class="description">
        <tr>
            <td colspan="2" style="font-size:19px;border-radius:5px 5px 0px 0px;text-align:center;background:rgba(0,0,0,0.7);">ABOUT THE BOOK</td>
        </tr>
        <tr>
          <td>Book Id:</td>
          <td><?php echo $bid; ?></td>
        </tr>
        <tr>
          <td>Book:</td>
          <td><?php echo $name; ?></td>
        </tr>

        <tr>
          <td>Author:</td>
          <td><?php echo $author; ?></td>
        </tr>
        <tr>
          <td>Subject:</td>
          <td><?php	echo $subject; ?></td>
        </tr>
        <tr>
          <td>Publisher:</td>
          <td><?php echo $publisher; ?></td>
        </tr>

        <tr>
          <td>Edition:</td>
          <td><?php echo $edition; ?></td>
        </tr>
        <tr>
        <?php
        if($sem == ""){
          echo '<td>Category:</td>
          <td>'.$category.'</td>
        </tr>';
        }else{
          echo '<td>Semester:</td>
          <td>'.$sem.'</td>
        </tr>';
        } ?>
      </table>
  </div>
      <div class="suggestion">
        <Section>New books in library</section>

      <table>
        <tr>
        <?php

          $new_books = $init->getNewBooks();
          foreach ($new_books as $key => $value) {
        ?>
          <td>
          <a href="index.php?bid=<?php echo $value['bid']; ?>">
          <img src="<?php echo $value['image'] ?>"></a></td>

        <?php } ?>
        </tr>

      </table>

    </center></div>
</div>
