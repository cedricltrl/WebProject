<?php

include('db_activity.php');
include('function_activity.php');
$query = '';
$output = array();
$query .= "SELECT * FROM activity ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE activity_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR activity_dated LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR activity_description LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR activity_category LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR activity_cost LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR recurring LIKE "%'.$_POST["search"]["value"].'%" ';

}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY activity_id DESC ';
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
	$sub_array = array();
	$sub_array[] = $image;
	$sub_array[] = $row["activity_name"];
	$sub_array[] = $row["activity_dated"];
	$sub_array[] = $row["activity_description"];
  $sub_array[] = $row["activity_category"];
  $sub_array[] = $row["activity_cost"];
  $sub_array[] = $row["recurring"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["activity_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["activity_id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
