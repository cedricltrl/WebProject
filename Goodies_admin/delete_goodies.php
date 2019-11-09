<?php

include('db_goodies.php');
include("function_goodies.php");

if(isset($_POST["id_goodies"]))
{
	$image = get_image_name($_POST["id_goodies"]);
	if($image != '')
	{
		unlink("upload/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM goodies WHERE goodies_id = :goodies_id"
	);

	$statement = $connection->prepare(
		"DELETE FROM goodies WHERE goodies_id = :goodies_id"
	);
	$result = $statement->execute(
		array(
			':goodies_id'	=>	$_POST["id_goodies"]
		)
	);

	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>
