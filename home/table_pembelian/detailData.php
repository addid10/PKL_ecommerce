<?php
require('../table_barang/db.php');

if(isset($_POST["id"]))
{
    $detailHasil= '';
    $id_Trans   = $_POST["id"];
    
    $tampilData = $connection->prepare(
        "SELECT * FROM detail_transaksi_pembelian 
         JOIN transaksi_pembelian USING(id_transaksi_pembelian) 
         JOIN barang USING(id_barang) JOIN users on id_users=id 
         JOIN users_profile USING(id_users)
         WHERE id_transaksi_pembelian=:_idTrans");
        
        $tampilData->bindParam('_idTrans', $id_Trans);
        $tampilData->execute();

        $detailData   = $tampilData->fetchAll(PDO::FETCH_OBJ);
        $detailHasil .= '
        <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Pembeli</th>
                <th>Barang</th>
                <th>Merk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total (Harga*Jumlah)</th>
            </tr>
        </thead>';
        
    foreach ($detailData as $data)
    {
        $detailHasil .= '
        <tbody>
            <tr>
                <td>'.$data->nama_users.'</th>
                <td>'.$data->nama_barang.'</th>
                <td>'.$data->merk_barang.'</th>
                <td>'.$data->harga.'</th>
                <td>'.$data->jumlah.'</th>
                <td>'.($data->jumlah)*($data->harga).'</th>
            </tr>
        </tbody>
        ';
    }
       $detailHasil   .= '
       </table></div>';

       echo $detailHasil;   
}
?>