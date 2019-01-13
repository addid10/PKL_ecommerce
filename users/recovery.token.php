<?php 
if(isset($_SESSION['csrf_token'])) {
    if(isset($_GET['q']) && $_GET['q']!==1){
        require_once('../database/db.php');

        $token = addslashes($_GET['q']);
        $recovery = $connection->prepare(
            "SELECT *, COUNT(*) as counts FROM users WHERE random_token=:token"
        );
        $recovery->bindParam("token", $token);
        $recovery->execute();
        $row = $recovery->fetch();
        
        $id       = $row['id'];
        $counts   = $row['counts'];
        $newToken = '';
        
        if($counts == 1) {
            $delete = $connection->prepare(
                "UPDATE users SET random_token=:new_token WHERE id=:id"
            );
            $delete->bindParam("new_token", $newToken);
            $delete->bindParam("id", $id);
            $delete->execute();

            echo '<input type="hidden" name="id" value="'.$id.'" >';
        }
    }
    else if(isset($_GET['status'])) {
        $status = $_GET['status'];
        
        echo '
        <div class="alert alert-danger">
            <strong>'.$status.'</strong>
        </div>';
    }
}
?>