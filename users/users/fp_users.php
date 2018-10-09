<?php
use PHPMailer\PHPMailer\PHPMailer;
require('../database/db.php');
require_once ('../../vendor/autoload.php');


if(isset($_POST['email'])){
    $email         = $_POST['email'];
    $length        = 12; 
    $randomString  = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

    $validasi = $connection->prepare(
        "SELECT * FROM users WHERE email=:_email"
    );

    $validasi->bindParam("_email",$email);
    $validasi->execute();
    $row = $validasi->fetch();

    $emailAsli = $row['email'];
    $id        = $row['id'];
    $randomToken = $connection->prepare(
        "UPDATE users SET 
        random_token=:_randomToken
        WHERE id=:_id"
    );

    $randomToken->bindParam("_randomToken", $randomString);
    $randomToken->bindParam("_id", $id);
    $randomToken->execute();

    
    $body = 
    '<div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="col-md-12">
                    <h3>Hello!</h3>
                </div>
                <div class="col-md-12">
                    Anda mendapatkan email ini karena kita menerima pemberitahuan bahwa anda ingin mereset password kamu.
                </div>
                <div class="col-md-12">
                    <a href="http://localhost/PKL_ecommerce/users/users/recovery.php?id='.$randomString.'" class="btn btn-primary">Reset Password</a>
                </div>
                <div class="contents-body col-md-12">
                    Kalau anda merasa tidak melakukan hal ini, jangan klik tombol di atas!
                </div>
                <div class="col-md-12">
                    Terimakasih,
                </div>
                <div class="col-md-12">
                    FUFCA.
                </div>
            </div>
        </div>
    </div>
    ';

    if($emailAsli==$email){ 
        header('location: forgot-password.php?_status=<div class="alert alert-success">Sukses! Silahkan cek email anda untuk pemulihan akun.</div>');
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "csgoservicecom@gmail.com";
        $mail->Password = "tinteen2016";
        $mail->setFrom('fufcadays@windows.com', 'FUFCA Days');
        $mail->addAddress($email, "Pengguna");
        $mail->Subject = 'Forgot Password';
        $mail->msgHTML($body);
        $mail->send();
    }
    else{
        header('location: forgot-password.php?_status=<div class="alert alert-danger">Email tidak terdaftar!</div>');
    }
}


        
?>