<?php

include('db_activity.php');
include("function_activity.php");

if(isset($_POST["id_activity"]))
{
	$statement = $connection->prepare(
		"DELETE FROM activity WHERE activity_id = :activity_id"
	);
	$result = $statement->execute(
		array(
			':activity_id'	=>	$_POST["id_activity"]
		)
	);

	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>
