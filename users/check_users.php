<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    require_once('../database/db.php');

    if(isset($_POST['username'])) {
        $username    = $_POST['username'];
        $statement = $connection->prepare("SELECT COUNT(username) from users where username =  :userName");
        $statement->bindParam("userName", $username);
        $statement->execute();
        $count = $statement->fetchColumn();

        if($count == "1"){
            echo "<div class='alert alert-danger'><i class='fa fa-times-circle'></i> Username tidak tersedia</div>";
        }
        else{
            echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> Username tersedia</div>";
        }
    }
}

