<?php
include('../table_barang/db.php');
include('functionData.php');

$lihatPesan  = '';
$hasilPesan  = array();
$lihatPesan .= "SELECT * FROM pesan LEFT JOIN users ON id_users=id ";

if(isset($_POST["search"]["value"]))
{
	$lihatPesan .= 'WHERE username LIKE "%'.$_POST["search"]["value"].'%" ';
	$lihatPesan .= 'OR pesan LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$lihatPesan .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$lihatPesan .= 'ORDER BY id_pesan ASC ';
}
if($_POST["length"] != -1)
{
	$lihatPesan .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connection->prepare($lihatPesan);
$statement->execute();
$result    = $statement->fetchAll();
$data      = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["id_pesan"];
	$sub_array[] = $row["username"];
	$sub_array[] = $row["pesan"];
    $data[] = $sub_array;
}
$hasilPesan = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($hasilPesan);
?>


