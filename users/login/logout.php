<?php
if (isset($_POST['__logout'])) {
  session_start();
  session_destroy();
  header('Location: login.php');
  }
 ?>