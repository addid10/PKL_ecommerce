<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    require_once('../database/db.php');
    if(isset($_POST['kode'])){
        $kode   = $_POST['kode'];

        $validasi = $connection->prepare(
            "SELECT *, COUNT(*) as valid FROM users WHERE remember_token=:kode"
        );

        $validasi->bindParam("kode",$kode);
        $validasi->execute();
        $row = $validasi->fetch();

        $id       = $row['id'];
        $username = $row['username'];
        $count    = $row['valid'];

        if($count == 1) {
            $token     = '';
            $statement = $connection->prepare(
                "UPDATE users SET status_aktif=1, remember_token=:token  WHERE id=:id"
            );
            
            $statement->bindParam("id", $id);
            $statement->bindParam("token", $token);

            $result = $statement->execute();

            if($result) {
                $_SESSION['username_member'] = $username;
                $_SESSION['user_id']         = $id;
                echo '../home';
                exit;
            }
        } else{
            echo 'verifikasi?q=Kode Verifikasi Salah!';
            exit;
        }
    }
}        
?>