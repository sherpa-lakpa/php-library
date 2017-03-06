
    <div class="lcontainer">
     <div class="searchpage">
      <img src="gallery/stlawrence.png" class="collegelogo">

      <section class="collegename font-sansation">
          St.Lawrence College <br>
        <span>  Library</span>
      </section>

      <section class="searchbox">
      <form method="get">

          <input type="text" placeholder="Enter your Student ID or Phone here..." name="sid">
          <button id="<?php if(isset($_GET['sid'])){ echo 'hide'; } ?>">Login</button>
      </form>
      </section>

              <script type="text/javascript">
                $(document).ready(function(){

                  $('#hide').click(function(){
                    $('.searchpage').hide(200);
                    $('.stdlogIn').hide(200);
                    $('.loggedin').show(200);
                    return false;
                  });
                  $('.rtabs').tabs();

                });

              </script>

      <?php
      if(!isset($_SESSION['todo_name'])){
      echo '<div class="newaccount">
          <a href="registration.php"><button class="new" style="cursor:pointer;">Create a new account</button></a>
      </div>';
    }
    ?>
</div>

    <div class="loggedin">

      <Section class="title grid60">
        STUDENT INFORMATION
      </section>

      <?php
      // My hashed
      if(isset($_GET['sid']))
        if($list_stu ==  0){
          header('Location: index.php');
        }
        foreach ($list_stu as $key => $value) {
          $sid = $value['sid'];
          $fname = $value['fname'];
          $program = $value['program'];
          $year = $value['year'];
          $roll_no = $value['roll_no'];
          $mobile = $value['mobile'];
          $image = $value['image'];
          // My hashed
          if($image == '')
          {
            $image = 'gallery/blankprofile.jpg';
          }
        }
      ?>
       <!--  Login with Your Student id -->
        <script type="text/javascript">
                $(document).ready(function(){

                  $('#hider').click(function(){
                    $('.searchpage').hide(200);
                    $('.loggedin').hide(200);
                    $('.stdlogIn').show(200);
                    return false;
                  });
                  $('#unhider').click(function(){
                    $('.searchpage').hide(200);
                    $('.loggedin').show(200);
                    $('.stdlogIn').hide(200);
                    return false;
                  });
                  $('.rtabs').tabs();

                });

              </script>

        <img src="<?php echo $image; ?>" class="studentpicture">
<?php
       if(!isset($_SESSION['todo_name']))
            echo '<div id="loginId">
                  <button id="hider">Enter Password</button>
				  </div>';
        ?>

	   <table>
          <tr><td>Student Id:</td>
              <td><?php echo $sid; ?></td>
          </tr>
          <tr><td>Name:</td>
            <td><?php echo $fname; ?></td>
          </tr>
          <tr><td>Program:</td>
            <td><?php echo $program; ?></td>
          </tr>
          <tr><td>Year:</td>
            <td><?php echo $year; ?></td>
          </tr>
          <tr><td>Roll No.</td>
            <td><?php echo $roll_no; ?></td>
          </tr>
          <tr><td>Mobile No.</d>
            <td><?php echo $mobile; ?></td>
          </tr>
        </table>
    </div>
   <!--FOR LOGGING IN BY ENTERING PASSWORD-->
      <div class="stdlogIn"><center>

        <h4>Enter your PASSWORD inorder to use the library features!</h4><img src="gallery/unchecked.png" id="unhider">
        <img src="<?php echo $image; ?>" class="propic">
        <form action="#" method="post">

          <input type="hidden" name="username" value="<?php echo $sid; ?>">
          <input type="password" name="password" placeholder="password"><br>
          <button class="btnlog" name="logStu">Login</button>
        </form>
      </div>

      <div class="footer">
            <section>Library &copy 2016</section>
            <a href="library1/index.php">Home</a>
            <img src="gallery/logo/facebook.png">
            <img src="gallery/logo/instagram.png">
            <img src="gallery/logo/twitter.png">
            <img src="gallery/logo/google-plus.png">
      </div>
    </div>
    </div>
