<?php
include('db_goodies.php');
include('function_goodies.php');
if(isset($_POST["id_goodies"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM goodies
		WHERE goodies_id = '".$_POST["id_goodies"]."'
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["goodies_name"] = $row["goodies_name"];
		$output["goodies_description"] = $row["goodies_description"];
		$output["goodies_in_stock"] = $row["goodies_in_stock"];
	  $output["goodies_category"] = $row["goodies_category"];
	  $output["order_number"] = $row["order_number"];
	  $output["goodies_cost"] = $row["goodies_cost"];
		if($row["goodies_photo"] != '')
		{
			$output['goodies_photo'] = '<img src="upload/'.$row["goodies_photo"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_goodies_photo" value="'.$row["goodies_photo"].'" />';
		}
		else
		{
			$output['goodies_photo'] = '<input type="hidden" name="hidden_goodies_photo" value="" />';
		}
	}
	echo json_encode($output);
}
?>
