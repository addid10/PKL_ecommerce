<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    require_once('../database/db.php');
    if(isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['subjek'])) {
        $nama    = $_POST['nama'];
        $email   = $_POST['email'];
        $pesan   = $_POST['message'];
        $subject = $_POST['subjek'];

        $statement = $connection->prepare(
        "INSERT INTO pesan (pesan, subjek, nama, email) 
        VALUES (:pesan, :subject, :name, :email)
        ");

        $statement->bindParam("pesan", $pesan);
        $statement->bindParam("subject", $subject);
        $statement->bindParam("name", $nama);
        $statement->bindParam("email", $email);

        $statement->execute();
    }
}
?>