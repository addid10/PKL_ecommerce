<?php
try {
    $username = 'root';
    $password = '';
    // first connect to database with the PDO object. 
    $connection = new \PDO('mysql:host=localhost;dbname=pkl_ecommerce;', $username, $password, [
      PDO::ATTR_EMULATE_PREPARES => false, 
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]); 
} 
catch(\PDOException $e){
    echo "Error connecting to mysql: " . $e->getMessage();
}
?>