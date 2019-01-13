<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {

        if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])) {
            require_once('../database/db.php');

            $username     = strtolower($_POST['username']); 
            $password     = $_POST['password']; 
            $email        = $_POST['email'];  

            $passwordBaru = password_hash($password, PASSWORD_DEFAULT);
            $token        = crypt($username, "LainLain.co.id");
            $date         = date("y-m-d");
            $aktif        = 0;
            $role         = 2;

            $statement = $connection->prepare(
                "SELECT COUNT(username) from users where username=:username"
            );
            $statement->bindParam("username", $username);
            $statement->execute();
            $validation = $statement->fetchColumn();

            if($validation == "1") {
                echo 'daftar?status=Username sudah digunakan!';
                exit;

            } else {
                $add = $connection->prepare(
                    "INSERT INTO users (id_role, username, email, password, remember_token, tgl_dibuat, status_aktif) 
                    VALUES (:role, :username, :email, :password, :token, :date, :aktif)"
                );

                $add->bindParam("role", $role);
                $add->bindParam("username", $username);
                $add->bindParam("email", $email);
                $add->bindParam("password", $passwordBaru);
                $add->bindParam("token", $token);
                $add->bindParam("date", $date);
                $add->bindParam("aktif", $aktif);
                $add->execute();

                if($add) {
                    echo 'verifikasi?status=Berhasil! Silahkan verifikasi akun anda. 
                    Kami telah mengirimkan kode konfirmasi pada email anda.';

                    exit;
                }
                else {
                    echo 'daftar?status=Gagal!';
                    exit;
                }

            }
        } else {
            echo 'daftar?status=Format penulisan username salah!';
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
                            Kode verifikasi akun LainLain anda adalah <b>'.$token.'</b>.
                        </div>
                        <div class="contents-body col-md-12">
                            Terimakasih telah bergabung dengan e-commerce kami. Kami harap anda menikmati layanan yang ada di dalamnya.
                        </div>
                        <div class="col-md-12">
                            Penuh Hormat,
                        </div>
                        <div class="col-md-12">
                            LainLain CS.
                        </div>
                    </div>
                </div>
            </div>
        </body>
        ';

        require_once '../phpmailer/vendor/autoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "csgoservicecom@gmail.com";
        $mail->Password = "tinteen2016";
        $mail->setFrom('fufcadays@windows.com', 'LainLain CS');
        $mail->addAddress($email, $username);
        $mail->Subject = 'Verifikasi Akun';
        $mail->msgHTML($body);
        $mail->send();
}
?>