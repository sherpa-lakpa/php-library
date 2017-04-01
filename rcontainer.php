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
                <input type="text" placeholder="Enter Book Id or Name" name="sbook" onkeyup="sbooks()" id="Book-search"><input type="submit" value="Search" class="search"></form>
            </div>

            <div id="view2">
            <form name="fnote" action="" method="post">
                <input type="text" placeholder="Enter Subject Initials" name="note" onkeyup="notes()" id="Note-search"><input type="submit" value="Search" class="search"></form>
            </div>
            <div id="view3">
            <form name="febook" action="" method="post">
                <input type="text" placeholder="Enter Subject Initials" name="ebook" onkeyup="ebooks()" id="Ebook-search"><input type="submit" value="Search" class="search"></form>
            </div>
        </div>
  </div>
  </div>
  <div id="blist" class="grid80">    <?php echo $output; ?>
  <?php echo $pagination; ?></div>
  <!-- Search functions -->
  <script type="text/javascript">
  var Initial = document.getElementById('blist').innerHTML
function sbooks()
{
  var x = document.getElementById('Book-search').value;

  if (x == '') {
    document.getElementById("blist").innerHTML= Initial;
  }else{

        xmlhttp=new XMLHttpRequest();
      xmlhttp.open("GET","sea.php?nm="+document.fbook.sbook.value,false);
      xmlhttp.send(null);
      var data = xmlhttp.responseText;
      //alert(data);
      if(data != "<table></table>"){
         document.getElementById("blist").innerHTML=xmlhttp.responseText;
      }else{
         document.getElementById("blist").innerHTML= MyDiv.innerHTML;
      }
  }
  // This is usefull for store response

}
function notes()
{
  var x = document.getElementById('Note-search').value;

  if (x == '') {
    document.getElementById("blist").innerHTML= Initial;
  }else{

    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","note.php?nm="+document.fnote.note.value,false);
    xmlhttp.send(null);
      var data = xmlhttp.responseText;
      //alert(data);
      if(data != "<table></table>"){
         document.getElementById("blist").innerHTML=xmlhttp.responseText;
      }else{
         document.getElementById("blist").innerHTML= Initial;
      }
  }
}
function ebooks()
{
  var x = document.getElementById('Ebook-search').value;
  if (x == '') {
    document.getElementById("blist").innerHTML= Initial;
  }else{
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","ebook.php?nm="+document.febook.ebook.value,false);
    xmlhttp.send(null);
    var data = xmlhttp.responseText;
      if(data != "<table></table>"){
         document.getElementById("blist").innerHTML=xmlhttp.responseText;
      }else{
         document.getElementById("blist").innerHTML= Initial;
      }
  }
}

</script>

<!--END OF TABS-->
    </div>
  </div>
