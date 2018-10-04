<?php
include('../table_barang/db.php');
include('functionData.php');

$lihatReview  = '';
$hasilReview  = array();
$lihatReview .= "SELECT * FROM review LEFT JOIN transaksi_pembelian USING(id_transaksi_pembelian) JOIN users ON id_users=id ";

if(isset($_POST["search"]["value"]))
{
	$lihatReview .= 'WHERE username LIKE "%'.$_POST["search"]["value"].'%" ';
	$lihatReview .= 'OR review LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$lihatReview .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$lihatReview .= 'ORDER BY id_review ASC ';
}
if($_POST["length"] != -1)
{
	$lihatReview .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connection->prepare($lihatReview);
$statement->execute();
$result    = $statement->fetchAll();
$data      = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["id_review"];
    $sub_array[] = $row["username"];
    $tanggal     = $row["tanggal_transaksi"];
    $tanggalBaru = date("jS M Y", strtotime("$tanggal"));
    $sub_array[] = $tanggalBaru;
    if($row["rating"]==5){
        $sub_array[] = '<i class="icofont icofont-star rating"></i><i class="icofont icofont-star rating"></i><i class="icofont icofont-star rating"></i><i class="icofont icofont-star rating"></i><i class="icofont icofont-star rating"></i>';
	}
	else if($row["rating"]==4){
        $sub_array[] = '<i class="icofont icofont-star rating"></i><i class="icofont icofont-star rating"></i><i class="icofont icofont-star rating"></i><i class="icofont icofont-star rating"></i><i class="icofont icofont-star"></i>';
	}
	else if($row["rating"]==3){
        $sub_array[] = '<i class="icofont icofont-star rating"></i><i class="icofont icofont-star rating"></i><i class="icofont icofont-star rating"></i><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i>';
	}
	else if($row["rating"]==2){
        $sub_array[] = '<i class="icofont icofont-star rating"></i><i class="icofont icofont-star rating"></i><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i>';
	}
	else if($row["rating"]==1){
        $sub_array[] = '<i class="icofont icofont-star rating"></i><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i>';
	}
	else{
        $sub_array[] = '<i class="icofont icofont-star"></i><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i>';
	}
    $sub_array[] = '<button type="button" name="view" 	id="'.$row["id_review"].'" class="btn btn-info view"><i class="ti-comments"></i> Detail Review</button>';
    $data[] = $sub_array;
}
$hasilReview = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($hasilReview);
?>


