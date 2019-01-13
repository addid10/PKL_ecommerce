<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    if(isset($_POST['id'])) {
        require_once('../database/db.php');
        $id = $_POST['id'];
        $antar = $_POST['antar'];

        $update = $connection->prepare(
            "UPDATE cart SET biaya_antar=:antar WHERE id_cart=:id"
        );
        $update->bindParam("id", $id);
        $update->bindParam("antar", $antar);
        $update->execute();

    }
}
?>