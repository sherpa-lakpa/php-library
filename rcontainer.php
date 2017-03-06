 <div class="rcontainer grid50">
<!--<?php
if(isset($_SESSION['todo_name'])){
  echo '<div style="float:right;color:white;background:rgba(0,0,0,0.7);padding:10px;box-shadow:0px 2px 5px black;border-radius:5px;">Hello <b>'.$_SESSION['todo_name'].'&nbsp;!&nbsp;</b></div><a href="libs/logout.php"><div style="float:right;color:red;margin-left:5px;background:rgba(0,0,0,0.7);font-size:12px;position:absolute;top:40px;right:0px;padding:5px;box-shadow:0px 2px 5px black;border-radius:5px;cursor:pointer;">LogOut</div></a>';
}
?>-->


<!--BEGINING OF TAB ON THE RIGHT CONTAINER-->
       <Center>
       <div>
        <div class="desc1 grid80" >
  <div >
        <ul class="tabs" >
            <li><a href="#view1">Books</a></li>
            <li><a href="#view2">Notes</a></li>
            <li><a href="#view3">Ebooks</a></li>
        </ul>

 <div class="tabcontents" >
            <div id="view1">
            <form name="fbook" action="" method="post">
                <input type="text" placeholder="Enter Book Id or Name" name="sbook" onkeyup="sbooks()"><input type="submit" value="Search" class="search"></form>
            </div>

            <div id="view2">
            <form name="fnote" action="" method="post">
                <input type="text" placeholder="Enter Subject Initials" name="note" onkeyup="notes()"><input type="submit" value="Search" class="search"></form>
            </div>
            <div id="view3">
            <form name="febook" action="" method="post">
                <input type="text" placeholder="Enter Subject Initials" name="ebook" onkeyup="ebooks()"><input type="submit" value="Search" class="search"></form>
            </div>
        </div>
  </div>
  </div>
  <div id="blist" class="grid80">    <?php echo $output; ?>
  <?php echo $pagination; ?></div>
  <!-- Search functions -->
  <script type="text/javascript">
function sbooks()
{
  xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","sea.php?nm="+document.fbook.sbook.value,false);
  xmlhttp.send(null);

  // This is usefull for store response
  document.getElementById("blist").innerHTML=xmlhttp.responseText;
}
function notes()
{
  xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","note.php?nm="+document.fnote.note.value,false);
  xmlhttp.send(null);

  // This is usefull for store response
  document.getElementById("blist").innerHTML=xmlhttp.responseText;
}
function ebooks()
{
  xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","ebook.php?nm="+document.febook.ebook.value,false);
  xmlhttp.send(null);

  // This is usefull for store response
  document.getElementById("blist").innerHTML=xmlhttp.responseText;
}
</script>

<!--END OF TABS-->
    </div>
  </div>
