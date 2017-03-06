<html>
<head>
<title>St.Lawrence College Library(Beta version)</title>
<link rel="shortcut icon" href="gallery/stlawrence.PNG" />
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="admin_style.css">
<script src="jquery/loginpopup.js" type="text/javascript"></script>
<script src="jquery/jquery.js" type="text/javascript"></script>
<script src="tabcontent.js" type="text/javascript"></script>
</head>

<body>

    <div class="home_navbar">
    <a href="index.php"><img src="gallery/stlawrence.png"></a>
    <?php
    if(isset($_SESSION['todo_name'])){
      echo '<font style="float:right;color:white;"> Hello <b>'.$_SESSION['todo_name'].'&nbsp;!&nbsp;</b></font>'.'<form class="login_info" action="libs/logout.php">
              <input type="submit" id="submit" value="LogOut">
    </form>';
  }else{
    echo '<form class="login_info" method="post" action="#">
            <input type="text" placeholder="Username or Email" id="l_username" name="username" />
              <input type="password" placeholder="Password" id="l_password" name="password" />
              <input type="submit" id="submit" value="Login" name="logStu">
    </form>';
  }
  ?>


    </div>
  
