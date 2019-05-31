<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
    if(isset($_POST["id"]))
    {
        $result = '';
        $id     = $_POST["id"];
        
        $tampilData = $connection->prepare(
            "SELECT * FROM review WHERE id_review=:id");
            
            $tampilData->bindParam('id', $id);
            $tampilData->execute();
            $detailData = $tampilData->fetchAll(PDO::FETCH_OBJ);
            
        foreach ($detailData as $data)
        {
            $result .= '       
                <div class="row">
                    <div class="col-12">
                        <p class="text-justify">'.$data->review.'</p>
                    </div>
                </div>
            ';
        }

        echo $result;   
    }
}
?>