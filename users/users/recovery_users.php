<?php
require('../database/db.php');

if(isset($_POST['password']) && isset($_POST['id'])){
    $pass     = $_POST['password'];
    $id       = $_POST['id'];
    $passBaru = password_hash($pass, PASSWORD_DEFAULT);

    $statement = $connection->prepare(
        "UPDATE users SET 
        password = :_pass
        WHERE id = :_idUsers"
    );
        
        $statement->bindParam("_idUsers", $id);
        $statement->bindParam("_pass", $passBaru);

        $result = $statement->execute();

        header('location: login.php?_verify=Sukses! Password anda telah diubah!');
    }
    else{
        header('location: recovery.php?_status=Gagal!');
    }
        
?>