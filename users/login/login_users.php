<?php
require('../../db/db.php');

if(isset($_POST['__username']) && isset($_POST['__password']))
{
    $__username = $_POST['__username'];
    $__password = $_POST['__password'];

    $query = $connection->prepare(
        "SELECT * FROM users WHERE username=:_userName");
    
    $query->bindParam("_userName", $__username);

    $query->execute();
    $row = $query->fetch();

    $user = $row['username'];
    $pass = $row['password'];
    $aktif= $row['status_aktif'];
    
    if(password_verify($__password, $pass)==$__password && $__username==$user && $aktif==1) {
      if(isset($_POST['rememberme'])){
        setcookie('username', $__username, time() + (30 *  24 * 60 * 60 * 1000));
        setcookie('password', $__password, time() + (30 *  24 * 60 * 60 * 1000));
      }
      session_start();
      $_SESSION['__username'] = $__username;
      header('location: ../../');

    }
    else
    {
      if (password_verify($__password, $pass)==$__password && $__username==$user && $aktif==0)
      {
        header('location: login.php?__status=Akun belum diverifikasi!');
      }
      else 
      {
        header('location: login.php?__status=Username atau Password salah!');
      }
      
    }
    
}
?>
