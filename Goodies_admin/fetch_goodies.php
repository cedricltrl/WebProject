<?php
include('db_goodies.php');
include('function_goodies.php');
$query = '';
$output = array();
$query .= "SELECT * FROM goodies ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE goodies_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR goodies_description LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR goodies_in_stock LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR goodies_category LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR order_number LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR goodies_cost LIKE "%'.$_POST["search"]["value"].'%" ';

}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY goodies_id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$image = '';
	if($row["goodies_photo"] != '')
	{
		$image = '<img src="upload/'.$row["goodies_photo"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$image = '';
	}
	$sub_array = array();
	$sub_array[] = $image;
	$sub_array[] = $row["goodies_name"];
	$sub_array[] = $row["goodies_description"];
	$sub_array[] = $row["goodies_in_stock"];
  $sub_array[] = $row["goodies_category"];
  $sub_array[] = $row["order_number"];
  $sub_array[] = $row["goodies_cost"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["goodies_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["goodies_id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>
