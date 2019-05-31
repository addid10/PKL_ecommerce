<?php 
    if(isset($_SESSION['username_member'])){
        require_once('../database/db.php');
        $username = $_SESSION['username_member'];
    
        $statement = $connection->prepare(
            "SELECT * FROM users LEFT JOIN users_profile USING(id) WHERE username=:username"
        );
        $statement->bindParam("username",$username);
        $statement->execute();
        $profile = $statement->fetch(PDO::FETCH_OBJ);

    }

?>