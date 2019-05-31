<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    if(isset($_POST['email'])){
        require_once('../database/db.php');
        $email  = $_POST['email'];
        $token  = crypt($email, "LainLain.co.id");

        $validasi = $connection->prepare(
            "SELECT *, COUNT(email) as counts FROM users WHERE email=:email"
        );

        $validasi->bindParam("email", $email);
        $validasi->execute();
        $row = $validasi->fetch();

        $id             = $row['id'];
        $counts         = $row['counts'];

        $forgotPassword = $connection->prepare(
            "UPDATE users SET random_token=:token WHERE id=:id"
        );

        $forgotPassword->bindParam("token", $token);
        $forgotPassword->bindParam("id", $id);
        $forgotPassword->execute();

        if($forgotPassword) { 
            echo 'forgot_password?status=Sukses! Silahkan cek email anda untuk pemulihan akun!';
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
                            <a href="http://localhost/lainlain.co.id/users/recovery?q='.$token.'&token='.$random.'" class="btn btn-primary">Reset Password</a>
                        </div>
                        <div class="contents-body col-md-12">
                            Kalau anda merasa tidak melakukan hal ini, jangan klik tombol di atas!
                        </div>
                        <div class="col-md-12">
                            Terimakasih,
                        </div>
                        <div class="col-md-12">
                            LainLain CS.
                        </div>
                    </div>
                </div>
            </div>
            ';
    
            if($counts == 1) { 
                require_once('../phpmailer/vendor/autoload.php');
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPDebug = 0;
                $mail->Host = 'mail.lainlain.co.id';
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->SMTPAuth = true;
                $mail->Username = "info@lainlain.co.id";
                $mail->Password = "LainLain123";
                $mail->setFrom('info@lainlain.co.id', 'LainLain CS');
                $mail->addAddress($email, $username);
                $mail->Subject = 'Verifikasi Akun';
                $mail->msgHTML($body);
                $mail->send();
            }
            else{
                echo 'forgot_password?status=Email tidak terdaftar!';
            }
        }
    }

}
        
?>