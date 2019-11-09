<?php
include('db_picture.php');
include('function_picture.php');
if(isset($_POST["id_picture"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM picture
		WHERE picture_id = '".$_POST["id_picture"]."'
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["picture_name"] = $row["picture_name"];
		$output["picture_description"] = $row["picture_description"];
		$output["likes"] = $row["likes"];
	}
	echo json_encode($output);
}
?>
