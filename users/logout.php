<?php
    session_start();
    if(isset($_SESSION['username_member'])){
        unset($_SESSION['username_member']);
    
        header('location: https://lainlain.co.id/users/login'); 
        exit; 
    }
    else{
        header('location: https://lainlain.co.id/'); 
    }
?>