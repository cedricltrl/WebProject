<?php

include('db_picture.php');
include("function_picture.php");

if(isset($_POST["id_picture"]))
{
	$statement = $connection->prepare(
		"DELETE FROM picture WHERE picture_id = :picture_id"
	);
	$result = $statement->execute(
		array(
			':picture_id'	=>	$_POST["id_picture"]
		)
	);

	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>
