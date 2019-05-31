<?php
use PHPMailer\PHPMailer\PHPMailer;
session_start();
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
            $status       = array();
            $statement = $connection->prepare(
                "SELECT COUNT(username) from users where username=:username"
            );
            $statement->bindParam("username", $username);
            $statement->execute();
            $validation = $statement->fetchColumn();

            if($validation == "1") {
                $status['status'] = 'daftar?status=Username sudah digunakan!';
                echo json_encode($status);
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
                    $status['status'] = 'verifikasi?status=Berhasil! Silahkan verifikasi akun anda. 
                    Kami telah mengirimkan kode konfirmasi pada email anda.';
                    echo json_encode($status);
                        
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
    
                        exit;
                }
                else {
                    $status['status'] = 'daftar?status=Gagal!';
                    echo json_encode($status);
                    exit;
                }

            }
        } else {
            $status['status'] = 'daftar?status=Format penulisan username salah!';
            echo json_encode($status);
        }
    }
}
?>