<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    if(isset($_POST['password']) && isset($_POST['id'])){
        require_once('../database/db.php');
        $password    = $_POST['password'];
        $id          = $_POST['id'];
        $newPassword = password_hash($password, PASSWORD_DEFAULT);

        $statement = $connection->prepare(
            "UPDATE users SET password=:new_password WHERE id=:id"
        );
        
        $statement->bindParam("id", $id);
        $statement->bindParam("new_password", $newPassword);
        $result = $statement->execute();

        echo 'login?s=Sukses! Password anda telah diubah!';

    } else {
        echo 'recovery?status=Gagal!';
    }
}        
?>