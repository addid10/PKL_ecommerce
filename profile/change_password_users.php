<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    if(isset($_POST["password_lama"]) && isset($_POST["password_baru"])) {
        require_once('../database/db.php');

        $id          = $_SESSION['user_id'];
        $oldPass     = $_POST['password_lama'];
        $newPass     = $_POST['password_baru'];
        $newPassHash = password_hash($newPass, PASSWORD_DEFAULT);

        $validasi  = $connection->prepare(
            "SELECT password FROM users WHERE id=:id"
        );

        $validasi->bindParam("id", $id);
        $validasi->execute();
        $row          = $validasi->fetch();
        $oldPassHash  = $row['password'];

        if(password_verify($oldPass, $oldPassHash)==$oldPass) {            
            $statement = $connection->prepare(
                "UPDATE users SET 
                password  = :password
                WHERE id  = :id"
            );

            $statement->bindParam("password", $newPassHash);
            $statement->bindParam("id", $id);
            $result = $statement->execute();

            if(!empty($result)) {
                echo 1;
            }
        }
        else {
            echo 0;
        }
    }
}

?>