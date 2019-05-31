<?php 
require('../database/db.php');

if (isset($_SESSION['_username'])){
    $_username = $_SESSION['_username']; 

    $query = $connection->prepare(
        'SELECT * FROM users u JOIN users_profile p on u.id=p.id WHERE username=:_userName'
    ); 

    $query->bindParam("_userName",$_username); 
    $query->execute(); 
    $profile = $query->fetch(PDO::FETCH_OBJ); 
}
?>

