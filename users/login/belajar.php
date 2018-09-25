<form method="POST" action="#">
    <input type="text" name="__username">
    <input type="password" name="__password">
    <button type="submit">BELAJAR!</button>
</form>


<?php
session_start();
require('../../db/db.php');


    if(isset($_POST['__username']) && isset($_POST['__password']))
    {
    
        $__username = $_POST['__username'];
        $__password = $_POST['__password'];
    $query = $connection->prepare(
        'SELECT * FROM users WHERE username=?');
    
    $query->bindParam(1, $__username);
    $query->execute();
    $row = $query->fetch();

    $user = $row['username'];
    $pass = $row['password'];
    $aktif= $row['status_aktif'];
    
    echo $user;
    echo $pass;

    if(password_verify($__password, $pass)==$__password && $__username==$user && $aktif==1){
        echo "SUKSES!";
    }
    else
    {
      if ($pass==$__password && $__username==$user && $aktif==0)
      {
        echo "HAMPIR SUKSES!";
      }
      else 
      {
        echo "gagal!";
      }
      
    }
}
?>
