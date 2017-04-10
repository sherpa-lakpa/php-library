<?php
 include_once('class.ManageUsers.php');
 $init = new ManageUsers();
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
                $quantity = $value['quantity'];
            		$image = $value['image'];
                if ($image == "") {
                  $image ='4.jpg';
                }


            	if(isset($student_name)){
            	?>

                <input type="hidden" name="book_id" id="book_id" value="<?php echo $bid; ?>" />
                <input type="hidden" name="s_id" id="s_id" value="<?php echo $student_id; ?>" />
                  <button id="add_issues">Bookmark</button>
          <script>
  //on the click of the submit button 
$("#add_issues").click(function(){

 var s_id = $('#s_id').val();
 var book_id = $('#book_id').val();
 // make the postdata
 // var postData = '&ID='+ID+'&NAME='+NAME+'&PASSWORD='+PASSWORD+'&CREDITS'+CREDITS+'&EMAIL_ID'+EMAIL_ID+'&CREATED_ON'+CREATED_ON+'&MODIFIED_ON'+MODIFIED_ON;
 // alert(postData);
 var myData={"book_id":book_id,"s_id":s_id};
 //call your .php script in the background, 
 //when it returns it will call the success function if the request was successful or 
 //the error one if there was an issue (like a 404, 500 or any other error status)
 $.ajax({
    url : "manage.bookmark.php",
    type: "POST",
    data : myData,
    success: function(data,status,xhr)
     {
        //if success then just output the text to the status div then clear the form inputs to prepare for new data
        $("#status_text").html(data);
        if (data != "") {
          alert(data);
        }
        location.reload();
         }

}); 
 
}); 
</script>
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
        <?php 
        if ($category == "Course") { 
          ?>
          <tr>
          <td>Subject:</td>
          <td><?php echo $subject; ?></td>
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
        
          <td>Semester:</td>
          <td><?php echo $sem; ?></td>
        </tr>
        <?php 
        echo '<td>Category:</td>
          <td>'.$category.'</td>
        </tr>';
        }else{
          echo '<td>Category:</td>
          <td>'.$category.'</td>
        </tr>';
        }
        ?>
        <tr>
        
          <td>Quantity:</td>
          <td><?php echo $quantity; ?></td>
        </tr>
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
