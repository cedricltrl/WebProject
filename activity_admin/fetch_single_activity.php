<?php
include('db_activity.php');
include('function_activity.php');
if(isset($_POST["id_activity"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM activity
		WHERE activity_id = '".$_POST["id_activity"]."'
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["activity_name"] = $row["activity_name"];
		$output["activity_dated"] = $row["activity_dated"];
		$output["activity_description"] = $row["activity_description"];
	  $output["activity_time"] = $row["activity_time"];
	  $output["activity_cost"] = $row["activity_cost"];
	  $output["recurring"] = $row["recurring"];
	}
	echo json_encode($output);
}
?>
