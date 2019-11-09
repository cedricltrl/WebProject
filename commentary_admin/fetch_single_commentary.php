<?php
include('db_commentary.php');
include('function_commentary.php');
if(isset($_POST["id_commentary"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM commentary
		WHERE commentary_id = '".$_POST["id_commentary"]."'
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["comment"] = $row["comment"];
	}
	echo json_encode($output);
}
?>
