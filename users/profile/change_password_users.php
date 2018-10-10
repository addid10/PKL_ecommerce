<?php
session_start();
require_once('../database/db.php');

if(isset($_POST["password_lama"]) && isset($_POST["password_baru"]))
{
    $username       = $_SESSION['_username'];
    $pass_lama      = $_POST['password_lama'];
    $pass_baru      = $_POST['password_baru'];
    $pass_baru_hash = password_hash($pass_baru, PASSWORD_DEFAULT);

    $validasi  = $connection->prepare(
        "SELECT * FROM users WHERE username=:_userName"
    );
    $validasi->bindParam("_userName", $username);
    $validasi->execute();
    $row            = $validasi->fetch();
    $id             = $row['id'];
    $password_lama  = $row['password'];

    if(password_verify($pass_lama, $password_lama)==$pass_lama){
        $statement = $connection->prepare(
            "UPDATE users SET 
            password  = :_passBaru
            WHERE id  = :_id"
        );

        $statement->bindParam("_passBaru", $pass_baru_hash);
        $statement->bindParam("_id", $id);
        $result = $statement->execute();
        if(!empty($result))
		{
			header('location: change_password.php?status=Password berhasil diperbaharui!');
		}
    }
    else {
        header('location: change_password.php?_status=Password lama anda salah!');
    }
}

?>