<?php
include('db.php');
include('functionData.php');

$lihatBarang  = '';
$hasilBarang  = array();
$lihatBarang .= "SELECT * FROM barang WHERE status_barang=1 ";

if(isset($_POST["search"]["value"]))
{
	$lihatBarang .= 'AND (nama_barang LIKE "%'.$_POST["search"]["value"].'%" ';
	$lihatBarang .= 'OR harga LIKE "%'.$_POST["search"]["value"].'%") ';
}
if(isset($_POST["order"]))
{
	$lihatBarang .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$lihatBarang .= 'ORDER BY id_barang ASC ';
}
if($_POST["length"] != -1)
{
	$lihatBarang .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connection->prepare($lihatBarang);
$statement->execute();
$result    = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["id_barang"];
	$sub_array[] = $row["nama_barang"];
	$sub_array[] = $row["harga"];
	$sub_array[] = '<button type="button" name="view" 	id="'.$row["id_barang"].'" class="btn btn-info view">View</button>';	
	$sub_array[] = '<button type="button" name="update" id="'.$row["id_barang"].'" class="btn btn-warning update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id_barang"].'" class="btn btn-danger delete">Delete</button>';
	$data[] = $sub_array;
}
$hasilBarang = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($hasilBarang);
?>


