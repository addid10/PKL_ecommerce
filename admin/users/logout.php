<?php
    session_start();
    if(isset($_SESSION['username_admin'])){
        unset($_SESSION['username_admin']);
    
        header('location: http://localhost/lainlain.co.id/admin/users/login'); 
        exit; 
    }
    else{
        header('location: http://localhost/lainlain.co.id/admin'); 
    }
?>