<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
    if(isset($_POST["id"])) {
        $result = '';
        $id     = $_POST["id"];
        
        $detail = $connection->prepare(
            "SELECT * FROM barang RIGHT JOIN sub_kategori USING(id_sub_kategori) 
            RIGHT JOIN kategori USING(id_kategori) LEFT JOIN supplier USING(id_supplier) 
            WHERE id_barang=:id");
            
            $detail->bindParam('id', $id);
            $detail->execute();

            $detailData   = $detail->fetchAll(PDO::FETCH_OBJ);
            $result .= '
            <div class="table-responsive">
            <table class="table table-hover">';
            
        foreach ($detailData as $data) {
            if($data->foto==0){
                $foto = "noimage.png";
            }
            else{
                $foto = $data->foto;
            }


            $result .= '
            <thead>
                <tr>
                    <th>Supplier</th>
                    <th>'.$data->nama.'</th>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <th>'.$data->kategori.'</th>
                </tr>
                <tr>
                    <th>Sub Kategori</th>
                    <th>'.$data->sub_kategori.'</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2"><img width="100%" src="../../assets/images/product/'.$foto.'"></th>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>'.$data->nama_barang.'</th>
                </tr>
                <tr>
                    <td>Merk</td>
                    <td>'.$data->merk_barang.'</th>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>'.$data->harga.'</th>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>'.$data->keterangan.'</th>
                </tr>
            </tbody>
            ';
        }
        $result   .= '</table></div>';

        echo $result;   
    }
}
?>