<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    require_once('../database/db.php');

    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = strtolower($_POST['username']);
        $password = $_POST['password'];

        $statement = $connection->prepare(
            "SELECT id, password, status_aktif, COUNT(*) as jumlah FROM users 
            WHERE username=:username AND id_role=1"
        );
        
        $statement->bindParam("username", $username);
        $statement->execute();
        $row = $statement->fetch();
        
        $id    = $row['id'];
        $pass  = $row['password'];
        $aktif = $row['status_aktif'];
        $count = $row['jumlah'];
        
        if($count == 1 ) {
          if($aktif == 1) {
            if(password_verify($password, $pass)==$password) {
              $_SESSION['username_admin'] = $username;
              $_SESSION['admin_id']         = $id;
                if(isset($_POST["rememberme"])){
                  $remember = $_POST["rememberme"];
                    
                  if ($remember == 1){
                    setcookie ("admin_login", $username, time()+ (10 * 365 * 24 * 60 * 60));
                    setcookie ("admin_pwd", $password, time()+ (10 * 365 * 24 * 60 * 60));
                  }
                }
                else {
                  if(isset($_COOKIE["admin_login"])) {
                    setcookie ("admin_login", "");
                  }
                  if(isset($_COOKIE["admin_pwd"])) {
                    setcookie ("admin_pwd", "");
                  }
                }

                echo '../home';
                exit;
            }
            echo 'login?status=Username atau password salah!';
            exit;
          }
          echo 'login?status=Akun kamu telah diblokir!';
          exit;
        }
        echo 'login?status=Username atau password salah!';
        exit;
      }
    }
?>
