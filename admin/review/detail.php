<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
    if(isset($_POST["id"]))
    {
        $result = '';
        $id     = $_POST["id"];
        
        $tampilData = $connection->prepare(
            "SELECT * FROM review LEFT JOIN transaksi_pembelian USING(id_transaksi_pembelian) 
            JOIN users ON id_users=id WHERE id_review=:_idReview");
            
            $tampilData->bindParam('id', $id);
            $tampilData->execute();
            $result   = $tampilData->fetchAll(PDO::FETCH_OBJ);
            
        foreach ($detailData as $data)
        {
            $result .= '    
                <div class="row">
                    <div class="col-md-4">
                        <h6>Dari</h6>
                    </div>
                    <div class="col-md-8">
                        <p>'.$data->username.'</p>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-md-4">
                        <h6>Tanggal</h6>
                    </div>
                    <div class="col-md-8">
                        <p>'.$data->tanggal_transaksi.'</p>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-md-4">
                        <h6>Review</h6>
                    </div>
                    <div class="col-md-8">
                        <p class="text-justify">'.$data->review.'</p>
                    </div>
                </div>
            ';
        }

        echo $result;   
    }
}
?>