<?php
session_start();
  if($_SESSION['todo_name'] != 'admin' && $_SESSION['std_id'] != 1 && $_SESSION['std_id'] != 2){
    header('Location: ../index.php');
  }