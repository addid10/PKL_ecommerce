<?php
    session_start();
    require('../../db/db.php');

    $__username    = $_POST['__username']; 
    $__password    = $_POST['__password']; 
    $__email       = $_POST['__email'];  
    $__passwordBaru= password_hash($__password, PASSWORD_DEFAULT);
    $length        = 6; 
    $randomString  = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    $__idrole      = 1;
    $date          = date("y-m-d");
    $statusAktif   = 0;

    $statement1 = $connection->prepare("SELECT COUNT('username') from users where username =  :userName");
    $statement1->bindParam("userName", $__username);
    $statement1->execute();
    $count = $statement1 -> fetchColumn();

    if($count == "1"){
        header('location: register.php?__status=Username sudah digunakan!');
    }
    else {
    $statement2 = $connection->prepare(
        "INSERT INTO users (id_role, username, email, password, remember_token, tgl_dibuat, status_aktif) 
        VALUES (:_idRole, :_userName, :_eMail, :_password, :_rtoken, :_tgl_dibuat, :statusAktif)"
    );

    $statement2->bindParam("_idRole", $__idrole);
    $statement2->bindParam("_userName", $__username);
    $statement2->bindParam("_eMail", $__email);
    $statement2->bindParam("_password", $__passwordBaru);
    $statement2->bindParam("_rtoken", $randomString);
    $statement2->bindParam("_tgl_dibuat", $date);
    $statement2->bindParam("statusAktif", $statusAktif);

    $statement2->execute();

    if($statement2) {
        header('location: login.php');
    }
    else
    {
        header('location: register.php?__status=Gagal!');
    }

    }