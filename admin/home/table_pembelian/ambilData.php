<?php
include('../table_barang/db.php');
include('functionData.php');

$lihatPembelian  = '';
$pembelian  = array();
$lihatPembelian .= "SELECT * FROM transaksi_pembelian WHERE status_barang IN('Proses','Selesai') ";

if(isset($_POST["search"]["value"]))
{
	$lihatPembelian .= 'OR tanggal_transaksi LIKE "%'.$_POST["search"]["value"].'%" ';
	$lihatPembelian .= 'OR status_beli LIKE "%'.$_POST["search"]["value"].'%" ';
	$lihatPembelian .= 'OR status_barang LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$lihatPembelian .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$lihatPembelian .= 'ORDER BY tanggal_transaksi DESC ';
}
if($_POST["length"] != -1)
{
	$lihatPembelian .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connection->prepare($lihatPembelian);
$statement->execute();
$result    = $statement->fetchAll();
$data      = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["tanggal_transaksi"];
	$sub_array[] = $row["total_barang"];
	$sub_array[] = '<label class="label label-primary">'.$row["status_barang"].'</label>';
	$sub_array[] = '<label class="label label-primary">'.$row["status_kirim"].'</label>';
	$sub_array[] = $row["total_harga"];
	$sub_array[] = '<label class="label label-primary">'.$row["status_beli"].'</label>';
	$sub_array[] = '<button type="button" name="update" id="'.$row["id_transaksi_pembelian"].'" class="btn btn-warning update"><i class="icofont icofont-check-circled"></i> Update</button>';
	$sub_array[] = '<button type="button" name="view" 	id="'.$row["id_transaksi_pembelian"].'" class="btn btn-info view"><i class="icofont icofont-eye-alt"></i> Detail</button>';
	$sub_array[] = '<button type="button" name="bukti" 	id="'.$row["id_transaksi_pembelian"].'" class="btn btn-primary viewBukti"><i class="icofont icofont-engineer"></i> Bukti</button>';
    $data[] = $sub_array;
}
$pembelian = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($pembelian);
?>


