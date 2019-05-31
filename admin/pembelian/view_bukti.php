<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
    if(isset($_POST["id"])) {
        $result     = '';
        $id         = $_POST["id"];
        
        $tampilData = $connection->prepare(
            "SELECT * FROM transaksi_pembelian 
            WHERE id_transaksi_pembelian=:id");
            
            $tampilData->bindParam('id', $id);
            $tampilData->execute();

            $detailData   = $tampilData->fetchAll(PDO::FETCH_OBJ);
            $result .= '
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Bukti Pembayaran</th>
                        </tr>
                    </thead>';
            
        foreach ($detailData as $data) {
            $result .= '
            <tbody>
                <tr>
                    <td><img src="../../assets/images/bukti/'.$data->bukti_pembayaran.'" width="100%"></td>
                </tr>
            </tbody>';
        }

        $result   .= '
        </table></div>';

        echo $result;   
    }
}
?>