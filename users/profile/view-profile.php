<?php 
    require('../database/db.php');
    if(isset($_SESSION['_username'])){
        $username = $_SESSION['_username'];
    
        $statement = $connection->prepare(
            "SELECT * FROM users LEFT JOIN users_profile USING(id) WHERE username=:_userName"
        );
        $statement->bindParam("_userName",$username);
        $statement->execute();
        $profile = $statement->fetch(PDO::FETCH_OBJ);

    }

?>