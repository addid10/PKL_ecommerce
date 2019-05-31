<?php 
require('db.php');

if (isset($_SESSION['__username'])){
    $__username = $_SESSION['__username']; 

    $query = $connection->prepare(
        'SELECT * FROM users u JOIN users_profile p on u.id=p.id WHERE username=:_userName'
    ); 

    $query->bindParam("_userName",$__username); 
    $query->execute(); 
    $profile = $query->fetch(PDO::FETCH_OBJ); 
}
?>

