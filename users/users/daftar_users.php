<?php
require('../database/db.php');

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))
{

    $_username    = $_POST['username']; 
    $_password    = $_POST['password']; 
    $_email       = $_POST['email'];  

    $_passwordBaru = password_hash($_password, PASSWORD_DEFAULT);
    $length        = 6; 
    $randomString  = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    $_idrole       = 2;
    $date          = date("y-m-d");
    $statusAktif   = 0;

    $statement1 = $connection->prepare("SELECT COUNT('username') from users where username =  :userName");
    $statement1->bindParam("userName", $_username);
    $statement1->execute();
    $count = $statement1 -> fetchColumn();

    if($count == "1"){
        header('location: daftar.php?_status=Username sudah digunakan!');
    }
    else {
    $statement2 = $connection->prepare(
        "INSERT INTO users (id_role, username, email, password, remember_token, tgl_dibuat, status_aktif) 
        VALUES (:_idRole, :_userName, :_eMail, :_password, :_rtoken, :_tgl_dibuat, :statusAktif)"
    );

    $statement2->bindParam("_idRole", $_idrole);
    $statement2->bindParam("_userName", $_username);
    $statement2->bindParam("_eMail", $_email);
    $statement2->bindParam("_password", $_passwordBaru);
    $statement2->bindParam("_rtoken", $randomString);
    $statement2->bindParam("_tgl_dibuat", $date);
    $statement2->bindParam("statusAktif", $statusAktif);

    $statement2->execute();

    $body = "Tes";

    if($statement2) {
        header('location: verifikasi.php?_status=Berhasil! Silahkan verifikasi akun anda. Kami telah mengirimkan kode konfirmasi pada email anda.');
    }
    else
    {
        header('location: daftar.php?_status=Gagal!');
    }

    }
}
$body = 
'<body>
	<div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="col-md-12">
                    <h3>Hello!</h3>
                </div>
                <div class="col-md-12">
                    Kode verifikasi akun FUFCA e-commerce anda adalah <b>'.$randomString.'</b> atau bisa dengan meng-klik link di bawah ini.
                </div>
                <div class="col-md-12">
                    <a href="localhost/PKL_ecommerce/users/users/verifikasi_users.php?kode='.$randomString.'" class="btn btn-primary">Verifikasi Akun</a>
                </div>
                <div class="contents-body col-md-12">
                    Terimakasih telah bergabung dengan e-commerce kami. Kami harap anda menikmati layanan yang ada di dalamnya.
                </div>
                <div class="col-md-12">
                    Penuh Hormat,
                </div>
                <div class="col-md-12">
                    FUFCA Admin.
                </div>
            </div>
        </div>
	</div>
</body>
';


use PHPMailer\PHPMailer\PHPMailer;
require_once '../../vendor/autoload.php';
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
$mail->addAddress($_email, $_username);
$mail->Subject = 'Verifikasi Akun';
$mail->msgHTML($body);
$mail->send();

?>