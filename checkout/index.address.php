<?php
if(isset($_SESSION['user_id'])) {
    $idUser  = $_SESSION['user_id'];

    $address = $connection->prepare("SELECT alamat, kode_pos FROM users_profile WHERE id=:id");
    $address->bindParam("id", $idUser);
    $address->execute();
    $rowAddress = $address->fetch();

    $alamat  = $rowAddress['alamat'];
    $kodePos = $rowAddress['kode_pos'];
}
?>