<form method="POST" action="#">
  <input type="text" name="pass">
  <input type="text" name="pass_baru">
  <button type="submit">Submit</button>
</form>
<?php
if(isset($_POST['pass']) && isset($_POST['pass_baru'])){
  $pass      = $_POST['pass'];
  $pass_baru = $_POST['pass_baru'];

  $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
  $pass_baru_hash = password_hash($pass_baru, PASSWORD_DEFAULT);

  echo $pass_baru;
  echo "<br>";
  echo $pass_baru_hash;
}

?>