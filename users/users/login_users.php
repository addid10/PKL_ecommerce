<?php
require('../database/db.php');

if(isset($_POST['username']) && isset($_POST['password']))
{
    $_username = $_POST['username'];
    $_password = $_POST['password'];
    $_role     = 2;

    $query = $connection->prepare(
        "SELECT * FROM users WHERE username=:_userName AND id_role=:_role");
    
    $query->bindParam("_userName", $_username);
    $query->bindParam("_role", $_role);

    $query->execute();
    $row = $query->fetch();

    $user = $row['username'];
    $pass = $row['password'];
    $aktif= $row['status_aktif'];
    
    if(password_verify($_password, $pass)==$_password && $_username==$user && $aktif==1) {
      session_start();
      $_SESSION['_username'] = $_username;
      header('location:../');

    }
    else
    {
      if (password_verify($_password, $pass)==$_password && $_username==$user && $aktif==0)
      {
        header('location: login.php?_status=Akun belum diverifikasi!');
      }
      else 
      {
        header('location: login.php?_status=Username atau password salah!');
      }
      
    }
    
}
?>
