<?php
use PHPMailer\PHPMailer\PHPMailer;
$token = "konyo";
$random = "bahkasks";


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
    
                require_once('../phpmailer/vendor/autoload.php');
                $mail = new PHPMailer;
                $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'mail.lainlain.co.id';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "info@lainlain.co.id";
        $mail->Password = "LainLain123";
        $mail->setFrom('info@lainlain.co.id', 'LainLain CS');
        $mail->addAddress("keroro2103@gmail.com", "An");
        $mail->Subject = 'Verifikasi Akun';
                $mail->msgHTML($body);
                $mail->send();
                
                ?>