<?php 

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
$mail->addAddress($email, "Pengguna");
$mail->Subject = 'Forgot Password';
$mail->msgHTML($body);
$mail->send();

?>