<?php
if (isset($_POST['__logout'])) {
  session_start();
  session_destroy();

  if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
  {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
  }
  $days = 30;
  setcookie ("username", $username, time() - ($days *  24 * 60 * 60 * 1000) );
  setcookie ("password", $password, time() - ($days *  24 * 60 * 60 * 1000) );

  header('Location: login.php');
  }
 ?>