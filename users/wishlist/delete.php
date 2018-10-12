<?php
require('../database/db.php');

if(isset($_POST["id"]))
{
    $wishlist = $_POST["id"];

	$statement = $connection->prepare(
		"DELETE FROM wishlist WHERE id_wishlist=:_id"
    );
    $statement->bindParam("_id", $wishlist);
    $result = $statement->execute();
    
    if($result){
        header('location: ../wishlist');
    }
}



?>